<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ToDoListTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ToDoListTable Test Case
 */
class ToDoListTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ToDoListTable
     */
    public $ToDoList;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ToDoList',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ToDoList') ? [] : ['className' => ToDoListTable::class];
        $this->ToDoList = TableRegistry::getTableLocator()->get('ToDoList', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ToDoList);

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
