<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\UsersTable;
use App\Model\Entity\User;
use Cake\Auth\DefaultPasswordHasher; // Importe o hasher

class UsersController extends AppController
{
    public function index() 
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    public function add()
    {
        $this->loadModel('Users'); // Carrega a model Users

        $user = new User(); // Cria uma nova instância da entidade User

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $hasher = new DefaultPasswordHasher();
            $user->password = $hasher->hash($user->password);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $hasher = new DefaultPasswordHasher();
            $user->password = $hasher->hash($user->password);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
