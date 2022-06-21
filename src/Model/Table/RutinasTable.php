<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rutinas Model
 *
 * @method \App\Model\Entity\Rutina newEmptyEntity()
 * @method \App\Model\Entity\Rutina newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Rutina[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rutina get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rutina findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Rutina patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rutina[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rutina|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rutina saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rutina[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rutina[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rutina[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rutina[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RutinasTable extends Table
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

        $this->setTable('rutinas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');


        $this->addBehavior('Proffer.Proffer', [
            'rutina' => [	// The name of your upload field
                'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or o		'dir' => 'avatar_dir',	// The name of the field to store the folder
                'dir' => 'rutina_dir',
                'thumbnailMethod' => 'gd'	// Options are Imagick or Gd
            ]
        ]);
    }

 
}
