<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppointmentTypes Model
 *
 * @property \App\Model\Table\AppointmentsTable&\Cake\ORM\Association\HasMany $Appointments
 *
 * @method \App\Model\Entity\AppointmentType get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppointmentType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppointmentType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppointmentType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppointmentType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppointmentType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppointmentType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppointmentType findOrCreate($search, callable $callback = null, $options = [])
 */
class AppointmentTypesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('appointment_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Appointments', [
            'foreignKey' => 'appointment_type_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
