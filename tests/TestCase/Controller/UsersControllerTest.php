<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.athletes'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/users');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/users/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            'id' => 9,
            'email' => 'test@test.test',
            'password' => 'test',
            'type' => 1,
            'created' => '2014-07-17 18:46:47',
            'modified' => '2015-07-17 18:46:47'
        ];


        $this->post('/users/add', $data);

        $this->assertRedirectContains('/users', 'The user has been saved.');
    }

    public function testAddValidatorEmailFail()
    {
        $data = [
            'id' => 9,
            'email' => 't',
            'password' => 'test',
            'type' => 1,
            'created' => '2014-07-17 18:46:47',
            'modified' => '2015-07-17 18:46:47'
        ];

        $this->post('/users/add', $data);
        $this->assertNoRedirect();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 3,
                    'email' => 'admin@admin.admin',
                    'password' => 'admin',
                    'type' => 3,
                    'active' => 1,
                    // autres clés.
                ]
            ]
        ]);

        $data = [
            'id' => 1,
            'email' => 'test@test.test',
            'password' => 'test',
            'type' => 2,
            'created' => '2014-07-17 18:46:47',
            'modified' => '2015-07-17 18:46:47'
        ];
        $this->post('/users/edit/1', $data);
        $this->assertRedirectContains('/users', 'The user has been saved.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $data = [
            'id' => 1,
            'email' => 'test@test.test',
            'password' => 'test',
            'type' => 2,
            'created' => '2014-07-17 18:46:47',
            'modified' => '2015-07-17 18:46:47'
        ];
        $this->post(['controller' => 'Users', 'action' => 'delete'], $data);
        $this->assertRedirectContains('/users', 'The user has been deleted.');


    }
}
