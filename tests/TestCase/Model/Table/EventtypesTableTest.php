<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventtypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventtypesTable Test Case
 */
class EventtypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EventtypesTable
     */
    public $Eventtypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.eventtypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Eventtypes') ? [] : ['className' => EventtypesTable::class];
        $this->Eventtypes = TableRegistry::getTableLocator()->get('Eventtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Eventtypes);

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
