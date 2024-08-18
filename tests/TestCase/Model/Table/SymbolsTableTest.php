<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SymbolsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SymbolsTable Test Case
 */
class SymbolsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SymbolsTable
     */
    protected $Symbols;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Symbols',
        'app.Exchanges',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Symbols') ? [] : ['className' => SymbolsTable::class];
        $this->Symbols = $this->getTableLocator()->get('Symbols', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Symbols);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SymbolsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SymbolsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
