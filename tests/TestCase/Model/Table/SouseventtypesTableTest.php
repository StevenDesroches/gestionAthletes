<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SouseventtypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SouseventtypesTable Test Case
 */
class SouseventtypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SouseventtypesTable
     */
    public $Souseventtypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.souseventtypes',
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
        $config = TableRegistry::getTableLocator()->exists('Souseventtypes') ? [] : ['className' => SouseventtypesTable::class];
        $this->Souseventtypes = TableRegistry::getTableLocator()->get('Souseventtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Souseventtypes);

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
