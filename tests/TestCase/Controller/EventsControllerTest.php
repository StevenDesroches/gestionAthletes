<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EventsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\EventsController Test Case
 */
class EventsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.events',
        'app.athletes',
        'app.clubs',
        'app.souseventtypes',
        'app.eventtypes'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testAddUnauthenticatedFails()
    {
        // Pas de données de session définies.
        $this->get('/Events/add');

        $this->assertRedirect('/users/login?redirect=%2FEvents%2Fadd');
    }

    public function testAddAuthenticated()
    {
        // Définit des données de session
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 3,
                    'email' => 'admin@admin.admin',
                    'password' => 'admin',
                    'type' => 3,
                    // autres clés.
                ]
            ]
        ]);
        $this->get('/Events/add');

        $this->assertResponseOk();
        // Autres assertions.
    }

    public function testDeleteAuthenticated()
    {
        // Définit des données de session
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 3,
                    'email' => 'admin@admin.admin',
                    'password' => 'admin',
                    'type' => 3,
                    // autres clés.
                ]
            ]
        ]);
        $this->get('/Events/add');


        $this->assertResponseOk();
        // Autres assertions.
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
