<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Industries Model
 *
 * @property \App\Model\Table\OrganisationsTable&\Cake\ORM\Association\HasMany $Organisations
 *
 * @method \App\Model\Entity\Industry newEmptyEntity()
 * @method \App\Model\Entity\Industry newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Industry> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Industry get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Industry findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Industry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Industry> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Industry|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Industry saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Industry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Industry>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Industry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Industry> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Industry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Industry>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Industry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Industry> deleteManyOrFail(iterable $entities, array $options = [])
 */
class IndustriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('industries');
        $this->setDisplayField('industry_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Organisations', [
            'foreignKey' => 'industry_id',
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
            ->scalar('industry_name')
            ->maxLength('industry_name', 255)
            ->requirePresence('industry_name', 'create')
            ->notEmptyString('industry_name');

        return $validator;
    }
}
