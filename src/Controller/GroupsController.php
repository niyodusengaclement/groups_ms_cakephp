<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 *
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
    
        $this->viewBuilder()->setLayout(false);
        $groups = $this->Groups->find('all');
        $this->set(array(
            'groups' => $groups,
            '_serialize' => array('groups')
        ));

    }

    /**
     * View method
     *
     * @param string|null $id group id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id);
        // $members = $this->Groups->Members->get([
        //     'conditions' => [
        //         'group_id' => $id
        //     ]
        // ]);

        $this->set([
            'group' => $group,
            '_serialize' => ['group']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $group = $this->Groups->newEntity($this->request->getData());
        if ($this->Groups->save($group)) {
            $message = 'Successfully Saved';
        } else {
            $message = 'Error occured';
        }
        $this->set([
            'message' => $message,
            'group' => $group,
            '_serialize' => ['message', 'group']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $group = $this->Groups->get($id);
        $group = $this->Groups->patchEntity($group, $this->request->getData());
        if ($this->Groups->save($group)) {
            $message = 'Successfully Saved';
        } else {
            $message = 'Error Occured';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);

    }

    /**
     * Delete method
     *
     * @param string|null $id group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $group = $this->Groups->get($id);
        $message = 'Deleted';
        if (!$this->Groups->delete($group)) {
            $message = 'Error Occured';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
