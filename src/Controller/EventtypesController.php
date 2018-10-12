<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Eventtypes Controller
 *
 * @property \App\Model\Table\EventtypesTable $Eventtypes
 *
 * @method \App\Model\Entity\Eventtype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventtypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $eventtypes = $this->paginate($this->Eventtypes);

        $this->set(compact('eventtypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Eventtype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventtype = $this->Eventtypes->get($id, [
            'contain' => []
        ]);

        $this->set('eventtype', $eventtype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventtype = $this->Eventtypes->newEntity();
        if ($this->request->is('post')) {
            $eventtype = $this->Eventtypes->patchEntity($eventtype, $this->request->getData());
            if ($this->Eventtypes->save($eventtype)) {
                $this->Flash->success(__('The eventtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The eventtype could not be saved. Please, try again.'));
        }
        $this->set(compact('eventtype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Eventtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventtype = $this->Eventtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventtype = $this->Eventtypes->patchEntity($eventtype, $this->request->getData());
            if ($this->Eventtypes->save($eventtype)) {
                $this->Flash->success(__('The eventtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The eventtype could not be saved. Please, try again.'));
        }
        $this->set(compact('eventtype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Eventtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventtype = $this->Eventtypes->get($id);
        if ($this->Eventtypes->delete($eventtype)) {
            $this->Flash->success(__('The eventtype has been deleted.'));
        } else {
            $this->Flash->error(__('The eventtype could not be deleted. Please, try again.'));
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
