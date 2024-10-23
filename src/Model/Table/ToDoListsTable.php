<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ToDoList Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ToDoList get($primaryKey, $options = [])
 * @method \App\Model\Entity\ToDoList newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ToDoList[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ToDoList|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ToDoList saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ToDoList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ToDoList[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ToDoList findOrCreate($search, callable $callback = null, $options = [])
 */
class ToDoListsTable extends Table
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

        $this->setTable('to_do_list');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
            ->dateTime('moment')
            ->requirePresence('moment', 'create')
            ->notEmptyDateTime('moment');

        $validator
            ->scalar('event_name')
            ->maxLength('event_name', 255)
            ->requirePresence('event_name', 'create')
            ->notEmptyString('event_name');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
