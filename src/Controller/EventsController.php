<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 *
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clubs', 'Souseventtypes', 'Eventtypes']
        ];
        $events = $this->paginate($this->Events);

        $this->set(compact('events'));
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Clubs', 'Souseventtypes', 'Eventtypes', 'Athletes']
        ]);

        $this->set('event', $event);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        $clubs = $this->Events->Clubs->find('list', ['limit' => 200]);
        //$souseventtypes = $this->Events->Souseventtypes->find('list', ['limit' => 200]);
        //$this->loadModel('Eventtypes');
        $eventtypes = $this->Events->Eventtypes->find('list', ['limit' => 200]);

        //$categories = $this->Categories->find('list', ['limit' => 200]);

        // Extraire le id de la première catégorie
        $eventtypes = $eventtypes->toArray();
        reset($eventtypes);
        $eventtypes_id = key($eventtypes);

        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $souseventtypes = $this->Events->Souseventtypes->find('list', [
            'conditions' => ['souseventtypes.eventtypes_id' => $eventtypes_id],
        ]);



        $this->set(compact('event', 'clubs', 'souseventtypes', 'eventtypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        $clubs = $this->Events->Clubs->find('list', ['limit' => 200]);
        $eventtypes = $this->Events->Eventtypes->find('list', ['limit' => 200]);

        $eventtypes = $eventtypes->toArray();
        reset($eventtypes);
        $eventtypes_id = key($eventtypes);

        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $souseventtypes = $this->Events->Souseventtypes->find('list', [
            'conditions' => ['souseventtypes.eventtypes_id' => $eventtypes_id],
        ]);

        $this->set(compact('event', 'clubs', 'souseventtypes', 'eventtypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
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
    }

}
