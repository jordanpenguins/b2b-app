<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Organisations Controller
 *
 * @property \App\Model\Table\OrganisationsTable $Organisations
 */
class OrganisationsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->addUnauthenticatedActions(['register']);

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Add a new fields to the query
        $query = $this->Organisations->find()
            ->select([
                'project_count' => $this->Organisations->Projects->find()
                    ->select(['count' => 'COUNT(Projects.id)'])
                    ->where(['Projects.organisation_id = Organisations.id'])
            ])
            ->contain(['Industries'])
            // Enable autoFields so that the project_count field can be used in the view together with the other fields
            ->enableAutoFields(true);

        // perform search and filter if the request is a GET
        if ($this->request->is('get')) {
            $name = $this->request->getQuery('business_name');
            $sort_projects = $this->request->getQuery('sort_projects');

            if (!empty($name)) {
                $query->where(['business_name LIKE' => '%' . $name . '%']);
            }

            // Sort by number of projects
            if ($sort_projects === 'asc') {
                $query->order(['project_count' => 'ASC']);
            } elseif ($sort_projects === 'desc') {
                $query->order(['project_count' => 'DESC']);
            }

        }

        $organisations = $this->paginate($query);
        $this->set(compact('organisations'));
    }



    /**
     * View method
     *
     * @param string|null $id Organisation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $organisation = $this->Organisations->get($id, contain: ['Industries', 'Contacts', 'Projects']);
        $this->set(compact('organisation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $organisation = $this->Organisations->newEmptyEntity();
        if ($this->request->is('post')) {
            $organisation = $this->Organisations->patchEntity($organisation, $this->request->getData());
            if ($this->Organisations->save($organisation)) {
                $this->Flash->success(__('The organisation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The organisation could not be saved. Please, try again.'));
        }
        $industries = $this->Organisations->Industries->find('list', limit: 200)->all();
        $this->set(compact('organisation', 'industries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Organisation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $organisation = $this->Organisations->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $organisation = $this->Organisations->patchEntity($organisation, $this->request->getData());
            if ($this->Organisations->save($organisation)) {
                $this->Flash->success(__('The organisation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The organisation could not be saved. Please, try again.'));
        }
        $industries = $this->Organisations->Industries->find('list', limit: 200)->all();
        $this->set(compact('organisation', 'industries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Organisation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organisation = $this->Organisations->get($id);
        if ($this->Organisations->delete($organisation)) {
            $this->Flash->success(__('The organisation has been deleted.'));
        } else {
            $this->Flash->error(__('The organisation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Register a new organisation from the front end
     *
     *
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\MethodNotAllowedException
     */
    public function register(){
        $organisation = $this->Organisations->newEmptyEntity();
        if ($this->request->is('post')) {
            $organisation = $this->Organisations->patchEntity($organisation, $this->request->getData());
            if ($this->Organisations->save($organisation)) {
                $this->Flash->success(__('The organisation has been saved.'));
            } else {
                $this->Flash->error(__('The organisation could not be saved. Please, try again.'));
            }
        }

        return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'register_organisation']);
    }

}
