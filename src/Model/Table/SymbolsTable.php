<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Symbols Model
 *
 * @property \App\Model\Table\ExchangesTable&\Cake\ORM\Association\BelongsTo $Exchanges
 *
 * @method \App\Model\Entity\Symbol newEmptyEntity()
 * @method \App\Model\Entity\Symbol newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Symbol> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Symbol get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Symbol findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Symbol patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Symbol> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Symbol|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Symbol saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Symbol>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Symbol>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Symbol>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Symbol> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Symbol>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Symbol>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Symbol>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Symbol> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SymbolsTable extends Table
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

        $this->setTable('symbols');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Exchanges', [
            'foreignKey' => 'exchange_id',
            'joinType' => 'INNER',
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
            ->integer('exchange_id')
            ->notEmptyString('exchange_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->maxLength('ticker', 25)
            ->requirePresence('ticker', 'create')
            ->notEmptyString('ticker');


        $validator
            ->decimal('min_size')
            ->requirePresence('min_size', 'create')
            ->notEmptyString('min_size');


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
        $rules->add($rules->existsIn(['exchange_id'], 'Exchanges'), ['errorField' => 'exchange_id']);

        return $rules;
    }
}
