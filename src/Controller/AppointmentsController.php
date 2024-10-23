<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Enum\Duration;
use App\Enum\Status;
use App\Helpers\Helper;
use App\Model\Entity\ToDoList;
use App\Model\Table\ToDoListTable;
use Cake\Cache\Cache;
use Cake\Http\Response;

/**
 * AppointmentsController Controller
 *
 *
 * @method \App\Model\Entity\AppointmentsController[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AppointmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $appointments = $this->Appointments->find()
            ->where([
                'Appointments.date >=' => date('Y-m-01'),
                'Appointments.date <=' => date('Y-m-t'),
                'Appointments.user_id =' => $this->Auth->user('id'),
            ])->contain(['AppointmentTypes']);

        $this->loadModel('ToDoLists');
        $toDoLists = $this->ToDoLists->find()
            ->where([
                'ToDoLists.moment >= ' => date('Y-m-01') . ' 00:00:00',
                'ToDoLists.moment <= ' => date('Y-m-t') . ' 23:59:59',
                'ToDoLists.user_id =' => $this->Auth->user('id'),
            ]);

            $this->set(compact('appointments'));
            $this->set(compact('toDoLists'));
    }

    public function indexDay($day)
    {
        $appointments = $this->Appointments->find()
            ->where([
                'Appointments.date =' => $day,
                'Appointments.user_id =' => $this->Auth->user('id'),
            ])->contain(['AppointmentTypes']);

        $this->loadModel('ToDoLists');
        $toDoLists = $this->ToDoLists->find()
            ->where([
                'ToDoLists.moment >= ' => $day . ' 00:00:00',
                'ToDoLists.moment <= ' => $day . ' 23:59:59',
                'ToDoLists.user_id =' => $this->Auth->user('id'),
            ]);


        $this->set('day', date("d/m/Y", strtotime($day)));
        $this->set(compact('appointments'));
        $this->set(compact('toDoLists'));
    }

    public function add($day)
    {
        $appointments = $this->Appointments->newEntity();
        if ($this->request->is('post')) {
            $appointments = $this->Appointments->patchEntity($appointments, $this->request->getData());
            $appointments->user_id = $this->Auth->user('id');
            if ($this->Appointments->save($appointments)) {
                $this->Flash->success(__('The appointments controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointments controller could not be saved. Please, try again.'));
        }
        $this->set(compact('appointments'));

        $this->loadModel('AppointmentTypes');
        $appointmentTypes = $this->AppointmentTypes->find('list')->all()->toArray();
        $durationList = Duration::getAsSelectOptions();
        $statusList = Status::getAsSelectOptions();

        $this->setOnCache();

        $this->set('day', date("d/m/Y", strtotime($day)));
        $this->set(compact('appointmentTypes'));
        $this->set(compact('durationList'));
        $this->set(compact('statusList'));
    }

    public function view($id = null)
    {
        $appointments = $this->Appointments->find()
            ->where([
                'Appointments.id =' => $id,
                'Appointments.user_id =' => $this->Auth->user('id'),
            ])->contain(['AppointmentTypes', 'Users'])->first();

        $this->set(compact('appointments'));
    }

    public function edit($id = null)
    {
        $appointments = $this->Appointments->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appointments = $this->Appointments->patchEntity($appointments, $this->request->getData());
            if ($this->Appointments->save($appointments)) {
                $this->Flash->success(__('The appointments controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointments controller could not be saved. Please, try again.'));
        }
        $this->set(compact('appointments'));

        $this->loadModel('AppointmentTypes');
        $appointmentTypes = $this->AppointmentTypes->find('list')->all()->toArray();
        $durationList = Duration::getAsSelectOptions();
        $statusList = Status::getAsSelectOptions();

        $this->setOnCache();

        $this->set(compact('appointmentTypes'));
        $this->set(compact('durationList'));
        $this->set(compact('statusList'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appointments = $this->Appointments->get($id);
        if ($this->Appointments->delete($appointments)) {
            $this->Flash->success(__('The appointments controller has been deleted.'));
        } else {
            $this->Flash->error(__('The appointments controller could not be deleted. Please, try again.'));
        }

        $this->setOnCache();

        return $this->redirect(['action' => 'index']);
    }

    public function getGenericData(): Response
    {
        $this->loadModel('AppointmentTypes');

        $jsonData = [
            'appointmentTypes' => $this->AppointmentTypes->find()->all(),
            'yearList' => Helper::getYearList(),
            'monthList' => Helper::getMonthList(),
            'dateList' => Helper::getDayList(),
            'durationList' => Duration::getAsSelectOptions(),
            'statusList' => Status::getAsSelectOptions(),
        ];

        return Helper::responseJson($this, $jsonData);
    }

    public function getByPeriod(): Response
    {
        $appointments = $this->Appointments->find()
            ->where([
                'Appointments.date >=' => $this->request->getData()['startDate'],
                'Appointments.date <=' => $this->request->getData()['endDate'],
                'Appointments.user_id =' => $this->Auth->user('id'),
            ])
            ->contain(['AppointmentTypes'])
            ->all();

        return Helper::responseJson($this, [
            'appointments' => $appointments
        ]);
    }

    public function verifyAppointments($firstLoad = false)
    {
        // if (! Cache::read('firstLoad:' . $this->Auth->user('id'))) {
        //     $this->setOnCache();
        // }

        // if (Cache::read('appointments:' . $this->Auth->user('id'))) {
        //     Cache::write('appointments:' . $this->Auth->user('id'), false);

        //     return Helper::responseJson($this, [
        //         'appointmentsList' => Cache::read('appointmentsList:' . $this->Auth->user('id'))
        //     ]);
        // }

        // return Helper::responseJson($this, []);
    }

    private function setOnCache()
    {
        // Cache::write('firstLoad:' . $this->Auth->user('id'), true);
        // $appointments = $this->Appointments->find()
        //     ->where([
        //         'Appointments.date =' => date('Y-m-d'),
        //         'Appointments.user_id =' => $this->Auth->user('id'),
        //     ])->contain(['AppointmentTypes', 'Users']);

        // if (count($appointments->toArray())) {
        //     Cache::write('appointments:' . $this->Auth->user('id'), true);

        //     $toBeCached = [];
        //     foreach($appointments as $appointment) {
        //         $toBeCached[] = [
        //             "name" => $appointment->name,
        //             "moment" => $appointment->startTime->format('H:i'),
        //         ];
        //     }

        //     Cache::write('appointmentsList:' . $this->Auth->user('id'), json_encode($toBeCached));
        // }
        
    }
}
