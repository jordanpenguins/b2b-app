<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contractors Controller
 *
 * @property \App\Model\Table\ContractorsTable $Contractors
 */
class ContractorsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this-> Authentication -> addUnauthenticatedActions(['register']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $query = $this->Contractors->find()
        -> select([
            'full_name' => 'CONCAT(first_name, " ", last_name)', // create a new field
            'project_count' => $this->Contractors->Projects -> find()  // create a new field
                -> select(['count' => 'COUNT(Projects.id)'])
                -> where(['Projects.contractor_id = Contractors.id'])
        ])
        -> enableAutoFields(true); // to include all fields in the query


        if ($this->request->is('get')) {
            $name = $this->request->getQuery('name'); // full name
            $email = $this->request->getQuery('emailKeyword');
            $skills = $this->request->getQuery('skills'); // should be a list of skills
            $sort_projects = $this->request->getQuery('sort_projects');

            if (!empty($name)) {
                $query->where(['CONCAT(first_name, " ", last_name) LIKE' => '%' . $name . '%']);
            }

            if (!empty($email)) {
                $query->where(['email LIKE' => '%' . $email . '%']);
            }

            if (!empty($skills)){
                $query -> matching('Skills', function ($q) use ($skills) {
                    return $q -> where(['Skills.id IN' => $skills]);
                });
            }

            if ($sort_projects === 'asc') {
                $query->order(['project_count' => 'ASC']);
            } elseif ($sort_projects === 'desc') {
                $query->order(['project_count' => 'DESC']);
            }

        }


        $skills = $this->Contractors->Skills->find('list', limit: 200)->all();
        $contractors = $this->paginate($query);
        $this->set(compact('contractors', 'skills'));
    }

    /**
     * View method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contractor = $this->Contractors->get($id, contain: ['Skills', 'Contacts', 'Projects']);
        $this->set(compact('contractor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contractor = $this->Contractors->newEmptyEntity();
        if ($this->request->is('post')) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->getData());
            if ($this->Contractors->save($contractor)) {
                $this->Flash->success(__('The contractor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
        }
        $skills = $this->Contractors->Skills->find('list', limit: 200)->all();
        $this->set(compact('contractor', 'skills'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contractor = $this->Contractors->get($id, contain: ['Skills']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->getData());
            if ($this->Contractors->save($contractor)) {
                $this->Flash->success(__('The contractor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
        }
        $skills = $this->Contractors->Skills->find('list', limit: 200)->all();
        $this->set(compact('contractor', 'skills'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contractor = $this->Contractors->get($id);
        if ($this->Contractors->delete($contractor)) {
            $this->Flash->success(__('The contractor has been deleted.'));
        } else {
            $this->Flash->error(__('The contractor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     *
     * Register method from the front end
     *
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function register() {
        $contractor = $this->Contractors->newEmptyEntity();
        if ($this->request->is('post')) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->getData());
            if ($this->Contractors->save($contractor)) {
                $this->Flash->success(__('The contractor has been saved.'));
            } else {
                $this->Flash->error(__('The contractor could not be saved. Please, try again.'));

            }
        }
        return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'register_contractor']);
    }

    /**
     * This method is to remove the image from the contractor
     *
     * @param null $id
     * @return \Cake\Http\Response|null
     */
    public function removeImage($id = null) {
        // Get the contractor
        $contractor = $this->Contractors->get($id);
        // Get the file path
        $filePath = 'webroot/files/Contractors/photo/' . $contractor->photo;

        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file manually
        }

        $contractor->photo = '';
        if ($this->Contractors->save($contractor)) {
            $this->Flash->success(__('The photo has been removed.'));
        } else {
            $this->Flash->error(__('The photo could not be removed. Please, try again.'));
        }

        return $this->redirect(['action' => 'edit', $id]);
    }




}
