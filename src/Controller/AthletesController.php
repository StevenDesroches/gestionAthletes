<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Athletes Controller
 *
 * @property \App\Model\Table\AthletesTable $Athletes
 *
 * @method \App\Model\Entity\Athlete[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AthletesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clubs', 'Users', 'Genres', 'Events']
        ];
        $athletes = $this->paginate($this->Athletes);

        $this->set(compact('athletes'));
    }

    /**
     * View method
     *
     * @param string|null $id Athlete id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $athlete = $this->Athletes->get($id, [
            'contain' => ['Clubs', 'Users', 'Genres', 'Events']
        ]);

        $this->set('athlete', $athlete);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $athlete = $this->Athletes->newEntity();
        if ($this->request->is('post')) {
            $athlete = $this->Athletes->patchEntity($athlete, $this->request->getData());
            $athlete->user_id = $this->Auth->user('id');
            if ($this->Athletes->save($athlete)) {
                $this->Flash->success(__('The athlete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The athlete could not be saved. Please, try again.'));
        }
        $clubs = $this->Athletes->Clubs->find('list', ['limit' => 200]);
        //$users = $this->Athletes->Users->find('list', ['limit' => 200]);
        $genres = $this->Athletes->Genres->find('list', ['limit' => 200]);
        $events = $this->Athletes->Events->find('list', ['limit' => 200]);
        $this->set(compact('athlete', 'clubs', 'users', 'genres', 'events'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Athlete id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $athlete = $this->Athletes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $athlete = $this->Athletes->patchEntity($athlete, $this->request->getData());
            if ($this->Athletes->save($athlete)) {
                $this->Flash->success(__('The athlete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The athlete could not be saved. Please, try again.'));
        }
        $clubs = $this->Athletes->Clubs->find('list', ['limit' => 200]);
        $users = $this->Athletes->Users->find('list', ['limit' => 200]);
        $genres = $this->Athletes->Genres->find('list', ['limit' => 200]);
        $events = $this->Athletes->Events->find('list', ['limit' => 200]);
        $this->set(compact('athlete', 'clubs', 'users', 'genres', 'events'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Athlete id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $athlete = $this->Athletes->get($id);
        if ($this->Athletes->delete($athlete)) {
            $this->Flash->success(__('The athlete has been deleted.'));
        } else {
            $this->Flash->error(__('The athlete could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $type = $user['type'];


        if (in_array($action, ['view'])) {
            return true;
        }

        if ($type==3){
            return true;
        }
        // The add and tags actions are always allowed to logged in users.

        if ($type==2){
            if (in_array($action, ['add'])) {
                return true;
            }
        }

        // All other actions require a slug.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the article belongs to the current user.
        $athlete = $this->Athletes->get($id);
        return $athlete->user_id === $user['id'];
    }

}
