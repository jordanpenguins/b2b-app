<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Projects->find()
            ->contain(['Organisations', 'Contractors']);

        if ($this->request->is('get')) {
            $name = $this->request->getQuery('name');
            $status = $this->request->getQuery('status');
            $skills = $this->request->getQuery('skills');
            $start_date = $this->request->getQuery('start_date');
            $end_date = $this->request->getQuery('end_date');

            // Search project name

            if (!empty($name)) {
                $query->where(['project_name LIKE' => '%' . $name . '%']);
            }

            // Filter by whether it is completed or not

            if ($status !== '' && $status !== null) {
                $query->where(['complete' => filter_var($status, FILTER_VALIDATE_BOOLEAN)]);
            }

            // Filter by selected skills

            if (!empty($skills)) {
                $query->matching('Skills', function ($q) use ($skills) {
                    return $q->where(['Skills.id IN' => $skills]);
                });
            }

            // Filter due date that falls within the start date and the end date

            if (!empty ($start_date)) {
                $query->where(['project_due_date >=' => $start_date]);
            }

            if (!empty ($end_date)) {
                $query->where(['project_due_date <=' => $end_date]);
            }
        }

        $skills = $this->Projects->Skills->find('list', limit: 200)->all();
        $projects = $this->paginate($query);
        $this->set(compact('projects', 'skills'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, contain: ['Organisations', 'Contractors', 'Skills']);
        $this->set(compact('project'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEmptyEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $organisations = $this->Projects->Organisations->find('list', limit: 200)->all();
        $contractors = $this->Projects->Contractors->find('list', ['contain' => ['Skills']], limit: 200)->all();
        $skills = $this->Projects->Skills->find('list', limit: 200)->all();
        $this->set(compact('project', 'organisations', 'contractors', 'skills'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, contain: ['Skills']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $organisations = $this->Projects->Organisations->find('list', limit: 200)->all();
        $contractors = $this->Projects->Contractors->find('list', ['contain' => ['Skills']], limit: 200)->all();
        $skills = $this->Projects->Skills->find('list', limit: 200)->all();
        $this->set(compact('project', 'organisations', 'contractors', 'skills'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Update Last Checked method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects on successful update, renders view otherwise.
     */
    public function updateLastChecked($id)
    {
        $this->request->allowMethod(['post']);
        try {
            $project = $this->Projects->get($id);
            $project->last_checked = date("Y-m-d H:i:s");
            if ($this->Projects->save($project)) {
                $this->set('response', ['status' => 'success']);
            } else {
                $this->set('response', ['status' => 'error']);
            }
        } catch (\Exception $e) {
            $this->set('response', ['status' => 'error', 'message' => $e->getMessage()]);
        }

        $this->viewBuilder()->setOption('serialize', 'response');
    }

    /**
     * Toggle the complete status of a project
     *
     * @param $id
     * @return \Cake\Http\Response|null
     */
    public function toggleComplete ($id) {
        $project = $this->Projects->get($id);
        $project->complete = !$project->complete;
        if ($this->Projects->save($project)) {
            $this->Flash->success(__('The project status has been updated.'));
        } else {
            $this->Flash->error(__('The project status could not be updated. Please, try again.'));
        }

        return $this -> redirect($this ->referer());
    }

}
