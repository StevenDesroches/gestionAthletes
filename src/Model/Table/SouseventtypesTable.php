<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Souseventtypes Model
 *
 * @property \App\Model\Table\EventtypesTable|\Cake\ORM\Association\BelongsTo $Eventtypes
 *
 * @method \App\Model\Entity\Souseventtype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Souseventtype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Souseventtype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Souseventtype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Souseventtype|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Souseventtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Souseventtype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Souseventtype findOrCreate($search, callable $callback = null, $options = [])
 */
class SouseventtypesTable extends Table
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

        $this->setTable('souseventtypes');
        $this->setDisplayField('description');
        $this->setPrimaryKey('id');

        $this->belongsTo('Eventtypes', [
            'foreignKey' => 'eventtypes_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Events', [
            'foreignKey' => 'souseventtypes_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

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
        $rules->add($rules->existsIn(['eventtypes_id'], 'Eventtypes'));

        return $rules;
    }
}
