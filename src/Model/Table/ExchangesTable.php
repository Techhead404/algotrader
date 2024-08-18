<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exchange Model
 *
 * @property \App\Model\Table\ExchangesTable&\Cake\ORM\Association\BelongsTo $Exchanges
 *
 * @method \App\Model\Entity\Exchange newEmptyEntity()
 * @method \App\Model\Entity\Exchange newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Exchange> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exchange get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Exchange findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Exchange patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Exchange> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exchange|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Exchange saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Exchange>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exchange>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Exchange>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exchange> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Exchange>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exchange>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Exchange>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exchange> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ExchangesTable extends Table
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

        $this->setTable('Exchanges');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

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
            ->notEmptyString('name')
            ->maxLength('name', 255)

            ->notEmptyString('domain')    
            ->maxLength('domain', 255)
            ->add('domain', [
                'validDomain' => [
                    'rule' => function ($value, $context) {
                        return (bool)preg_match('/^([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$/', $value);
                    },
                    'message' => 'Please provide a valid domain name.'
                ]
                ]);
            

            

        return $validator;
    }
}

?>