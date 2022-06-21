<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActividadesUsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActividadesUsersTable Test Case
 */
class ActividadesUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ActividadesUsersTable
     */
    protected $ActividadesUsers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ActividadesUsers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ActividadesUsers') ? [] : ['className' => ActividadesUsersTable::class];
        $this->ActividadesUsers = $this->getTableLocator()->get('ActividadesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ActividadesUsers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ActividadesUsersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
