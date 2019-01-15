<?php
namespace Admin\Test\TestCase\Model\Table;

use Admin\Model\Table\AdminUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Admin\Model\Table\AdminUsersTable Test Case
 */
class AdminUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Admin\Model\Table\AdminUsersTable
     */
    public $AdminUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Admin.AdminUsers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AdminUsers') ? [] : ['className' => AdminUsersTable::class];
        $this->AdminUsers = TableRegistry::getTableLocator()->get('AdminUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdminUsers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
