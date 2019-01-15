<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 40, 'Full Name is so long!')
            ->minLength('full_name', 5, 'Full Name is so short!')
            ->notEmpty('full_name', 'Full Name can not be empty!');
            // ->allowEmptyString('full_name');

        $validator
            ->email('email')
            ->maxLength('email', 40, 'Email is so long!')
            ->minLength('email', 5, 'Email is so short!')
            ->notEmpty('email', 'Email can not be empty!');
            // ->requirePresence('email', 'create', 'Please, create email!')
            // ->allowEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255, 'Password is so long!')
            ->minLength('password', 5, 'Password is so short!')
            ->notEmpty('password', 'Password can not be empty!');
            // ->requirePresence('password', 'create', 'Please, create password!')
            // ->allowEmptyString('password');

        $validator
            ->boolean('is_deleted')
            // ->requirePresence('is_deleted', 'create')
            ->allowEmptyString('is_deleted', false);

        $validator
            ->boolean('is_banned')
            // ->requirePresence('is_banned', 'create')
            ->allowEmptyString('is_banned', false);

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
