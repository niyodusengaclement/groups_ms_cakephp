<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Groups Model
 *
 * @method \App\Model\Entity\Group get($primaryKey, $options = [])
 * @method \App\Model\Entity\Group newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Group[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Group|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Group saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Group patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Group[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Group findOrCreate($search, callable $callback = null, $options = [])
 */
class GroupsTable extends Table
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

        $this->setTable('groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->maxLength('name', 60)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->date('meeting_day')
            ->requirePresence('meeting_day', 'create')
            ->notEmptyDate('meeting_day');

        $validator
            ->time('meeting_time')
            ->requirePresence('meeting_time', 'create')
            ->notEmptyTime('meeting_time');

        $validator
            ->integer('share_value')
            ->requirePresence('share_value', 'create')
            ->notEmptyString('share_value');

        $validator
            ->integer('max_share')
            ->requirePresence('max_share', 'create')
            ->notEmptyString('max_share');

        $validator
            ->integer('saving_ratio')
            ->requirePresence('saving_ratio', 'create')
            ->notEmptyString('saving_ratio');

        $validator
            ->integer('interest_rate')
            ->requirePresence('interest_rate', 'create')
            ->notEmptyString('interest_rate');

        $validator
            ->integer('max_loan')
            ->requirePresence('max_loan', 'create')
            ->notEmptyString('max_loan');

        $validator
            ->integer('contribution_amount')
            ->requirePresence('contribution_amount', 'create')
            ->notEmptyString('contribution_amount');

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
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
