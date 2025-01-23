<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Organisations Model
 *
 * @property \App\Model\Table\IndustriesTable&\Cake\ORM\Association\BelongsTo $Industries
 * @property \App\Model\Table\ContactsTable&\Cake\ORM\Association\HasMany $Contacts
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\HasMany $Projects
 *
 * @method \App\Model\Entity\Organisation newEmptyEntity()
 * @method \App\Model\Entity\Organisation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Organisation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Organisation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Organisation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Organisation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Organisation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Organisation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Organisation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Organisation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Organisation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Organisation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Organisation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Organisation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Organisation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Organisation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Organisation> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OrganisationsTable extends Table
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

        $this->setTable('organisations');
        $this->setDisplayField('details');
        $this->setPrimaryKey('id');

        $this->belongsTo('Industries', [
            'foreignKey' => 'industry_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Contacts', [
            'foreignKey' => 'organisation_id',
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'organisation_id',
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
            ->scalar('business_name')
            ->maxLength('business_name', 255)
            ->requirePresence('business_name', 'create')
            ->notEmptyString('business_name');

        $validator
            ->scalar('contact_first_name')
            ->maxLength('contact_first_name', 255)
            ->requirePresence('contact_first_name', 'create')
            ->notEmptyString('contact_first_name');

        $validator
            ->scalar('contact_last_name')
            ->maxLength('contact_last_name', 255)
            ->requirePresence('contact_last_name', 'create')
            ->notEmptyString('contact_last_name');

        $validator
            ->scalar('contact_email')
            ->maxLength('contact_email', 255)
            ->requirePresence('contact_email', 'create')
            ->notEmptyString('contact_email');

        $validator
            ->scalar('current_website')
            ->maxLength('current_website', 255)
            ->requirePresence('current_website', 'create')
            ->notEmptyString('current_website');

        $validator
            ->integer('industry_id')
            ->notEmptyString('industry_id');

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
        $rules->add($rules->existsIn(['industry_id'], 'Industries'), ['errorField' => 'industry_id']);

        return $rules;
    }
}
