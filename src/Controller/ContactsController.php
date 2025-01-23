<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 */
class ContactsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->addUnauthenticatedActions(['sendContact']);

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Contacts->find()
            ->contain(['Organisations', 'Contractors']);
        $contacts = $this->paginate($query);

        $this->set(compact('contacts'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contacts->get($id, contain: ['Organisations', 'Contractors']);
        $this->set(compact('contact'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contact = $this->Contacts->newEmptyEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $organisations = $this->Contacts->Organisations->find('list', limit: 200)->all();
        $contractors = $this->Contacts->Contractors->find('list', ['contain' => ['Skills']], limit: 200)->all();
        $this->set(compact('contact', 'organisations', 'contractors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $organisations = $this->Contacts->Organisations->find('list', limit: 200)->all();
        $contractors = $this->Contacts->Contractors->find('list', ['contain' => ['Skills']], limit: 200)->all();
        $this->set(compact('contact', 'organisations', 'contractors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function sendContact() {
        $contact = $this->Contacts->newEmptyEntity();
        if ($this->request->is('post')) {
            $data  = $this->request->getData();
            // add replied and set to false
            $data['replied'] = 0;
            $contact = $this->Contacts->patchEntity($contact, $data);
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('Your message has been sent.'));
            } else {
                $this->Flash->error(__('The message cannot be sent.'));
            }
        }
        return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'contact']);
    }

    public function toggleReplied($id = null) {
        $contact = $this->Contacts->get($id);
        $contact->replied = !$contact->replied;
        if ($this->Contacts->save($contact)) {
            $this->Flash->success(__('The reply status has been updated.'));
        } else {
            $this->Flash->error(__('The reply status could not be updated. Please, try again.'));
        }
        return $this->redirect($this ->referer());
    }

}
