<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Genres Controller
 *
 * @property \App\Model\Table\GenresTable $Genres
 *
 * @method \App\Model\Entity\Genre[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GenresController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'fields' => [
            'id', 'description'
        ],
        'sortWhitelist' => [
            'id', 'description'
        ]
    ];
    public function isAuthorized($user)
    {
        return false;
    }
}
