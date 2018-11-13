<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Souseventtypes Controller
 *
 * @property \App\Model\Table\SouseventtypesTable $Souseventtypes
 *
 * @method \App\Model\Entity\Souseventtype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SouseventtypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function isAuthorized($user) {
        // All actions are allowed to logged in users for subcategories.
        return true;
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Eventtypes']
        ];
        $souseventtypes = $this->paginate($this->Souseventtypes);

        $this->set(compact('souseventtypes'));
    }

    public function getByEventType() {
        $eventtypes_id = $this->request->query('eventtypes_id');

        $souseventtypes = $this->Souseventtypes->find('all', [
            'conditions' => ['souseventtypes.eventtypes_id' => $eventtypes_id],
        ]);
        $this->set('souseventtypes', $souseventtypes);
        $this->set('_serialize', ['souseventtypes']);
    }


    /**
     * View method
     *
     * @param string|null $id Souseventtype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $souseventtype = $this->Souseventtypes->get($id, [
            'contain' => ['Eventtypes']
        ]);

        $this->set('souseventtype', $souseventtype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $souseventtype = $this->Souseventtypes->newEntity();
        if ($this->request->is('post')) {
            $souseventtype = $this->Souseventtypes->patchEntity($souseventtype, $this->request->getData());
            if ($this->Souseventtypes->save($souseventtype)) {
                $this->Flash->success(__('The souseventtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The souseventtype could not be saved. Please, try again.'));
        }
        $eventtypes = $this->Souseventtypes->Eventtypes->find('list', ['limit' => 200]);
        $this->set(compact('souseventtype', 'eventtypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Souseventtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $souseventtype = $this->Souseventtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $souseventtype = $this->Souseventtypes->patchEntity($souseventtype, $this->request->getData());
            if ($this->Souseventtypes->save($souseventtype)) {
                $this->Flash->success(__('The souseventtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The souseventtype could not be saved. Please, try again.'));
        }
        $eventtypes = $this->Souseventtypes->Eventtypes->find('list', ['limit' => 200]);
        $this->set(compact('souseventtype', 'eventtypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Souseventtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $souseventtype = $this->Souseventtypes->get($id);
        if ($this->Souseventtypes->delete($souseventtype)) {
            $this->Flash->success(__('The souseventtype has been deleted.'));
        } else {
            $this->Flash->error(__('The souseventtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
