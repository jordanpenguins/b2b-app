<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Industries Controller
 *
 * @property \App\Model\Table\IndustriesTable $Industries
 */
class IndustriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Industries->find();
        $industries = $this->paginate($query);

        $this->set(compact('industries'));
    }

    /**
     * View method
     *
     * @param string|null $id Industry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $industry = $this->Industries->get($id, contain: ['Organisations']);
        $this->set(compact('industry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $industry = $this->Industries->newEmptyEntity();
        if ($this->request->is('post')) {
            $industry = $this->Industries->patchEntity($industry, $this->request->getData());
            if ($this->Industries->save($industry)) {
                $this->Flash->success(__('The industry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The industry could not be saved. Please, try again.'));
        }
        $this->set(compact('industry'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Industry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $industry = $this->Industries->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $industry = $this->Industries->patchEntity($industry, $this->request->getData());
            if ($this->Industries->save($industry)) {
                $this->Flash->success(__('The industry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The industry could not be saved. Please, try again.'));
        }
        $this->set(compact('industry'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Industry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $industry = $this->Industries->get($id);
        if ($this->Industries->delete($industry)) {
            $this->Flash->success(__('The industry has been deleted.'));
        } else {
            $this->Flash->error(__('The industry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
