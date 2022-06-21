<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Actividades Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Actividade newEmptyEntity()
 * @method \App\Model\Entity\Actividade newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Actividade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Actividade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Actividade findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Actividade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Actividade[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Actividade|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actividade saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actividade[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividade[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividade[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividade[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ActividadesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('actividades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'id_usuario',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'id_actividad',
            'targetForeignKey' => 'id_usuario',
            'joinTable' => 'actividades_users',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
        ->scalar('nombre')
        ->maxLength('nombre', 255)
        ->requirePresence('nombre', 'create')
        ->notEmptyString('nombre');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

        $validator
            ->time('hora_inicio')
            ->requirePresence('hora_inicio', 'create')
            ->notEmptyTime('hora_inicio');

        $validator
            ->time('hora_fin')
            ->requirePresence('hora_fin', 'create')
            ->notEmptyTime('hora_fin');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('id_usuario', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
