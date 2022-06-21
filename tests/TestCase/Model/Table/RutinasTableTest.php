<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RutinasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RutinasTable Test Case
 */
class RutinasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RutinasTable
     */
    protected $Rutinas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Rutinas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Rutinas') ? [] : ['className' => RutinasTable::class];
        $this->Rutinas = $this->getTableLocator()->get('Rutinas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Rutinas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RutinasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
