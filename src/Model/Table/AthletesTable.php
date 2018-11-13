<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Athletes Model
 *
 * @property \App\Model\Table\ClubsTable|\Cake\ORM\Association\BelongsTo $Clubs
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\GenresTable|\Cake\ORM\Association\BelongsTo $Genres
 * @property \App\Model\Table\EventsTable|\Cake\ORM\Association\BelongsTo $Events
 *
 * @method \App\Model\Entity\Athlete get($primaryKey, $options = [])
 * @method \App\Model\Entity\Athlete newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Athlete[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Athlete|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Athlete|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Athlete patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Athlete[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Athlete findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AthletesTable extends Table
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

        $this->setTable('athletes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        //$this->addBehavior('Translate', ['fields' => ['other']]);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clubs', [
            'foreignKey' => 'clubs_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Genres', [
            'foreignKey' => 'genres_id'
        ]);
        $this->belongsTo('Events', [
            'foreignKey' => 'events_id'
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
            ->scalar('firstName')
            ->maxLength('firstName', 255)
            ->requirePresence('firstName', 'create')
            ->notEmpty('firstName');

        $validator
            ->scalar('lastName')
            ->maxLength('lastName', 255)
            ->requirePresence('lastName', 'create')
            ->notEmpty('lastName');

        $validator
            ->scalar('other')
            ->maxLength('other', 255)
            ->requirePresence('other', 'create')
            ->notEmpty('other');

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
        $rules->add($rules->existsIn(['clubs_id'], 'Clubs'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['genres_id'], 'Genres'));
        $rules->add($rules->existsIn(['events_id'], 'Events'));

        return $rules;
    }
}
