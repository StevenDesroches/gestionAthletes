<?php
namespace App\Controller;

use App\Controller\AppController;

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
        'limit' => 100,
        'maxLimit' => 150,
        /*        'fields' => [
                    'id', 'name', 'description'
                ],
        */        'sortWhitelist' => [
            'id', 'description'
        ]
    ];
}
