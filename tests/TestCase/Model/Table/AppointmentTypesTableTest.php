<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppointmentTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppointmentTypesTable Test Case
 */
class AppointmentTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AppointmentTypesTable
     */
    public $AppointmentTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AppointmentTypes',
        'app.Appointments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppointmentTypes') ? [] : ['className' => AppointmentTypesTable::class];
        $this->AppointmentTypes = TableRegistry::getTableLocator()->get('AppointmentTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppointmentTypes);

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
}
