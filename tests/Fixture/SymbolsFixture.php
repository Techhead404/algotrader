<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SymbolsFixture
 */
class SymbolsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'exchange_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'min_size' => 1.5,
                'max_size' => 1.5,
            ],
        ];
        parent::init();
    }
}
