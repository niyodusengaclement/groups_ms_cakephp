<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 *
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MembersController extends AppController
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
        $members = $this->Members->find('all');
        $this->set(array(
            'members' => $members,
            '_serialize' => array('members')
        ));

    }

    /**
     * View method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => ['Groups'],
        ]);

        $this->set([
            'member' => $member,
            '_serialize' => ['member']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    $this->viewBuilder()->setLayout(false);
    $this->request->allowMethod(['post', 'put']);
    $member = $this->Members->newEntity($this->request->getData());
    if ($this->Members->save($member)) {
        $message = 'Successfully Saved';
    } else {
        $message = 'Error occured';
    }
    $this->set([
        'message' => $message,
        'member' => $member,
        '_serialize' => ['message', 'member']
    ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $member = $this->Members->get($id);
        $member = $this->Members->patchEntity($member, $this->request->getData());
        if ($this->Members->save($member)) {
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
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $member = $this->Members->get($id);
        $message = 'Deleted';
        if (!$this->Members->delete($member)) {
            $message = 'Error Occured';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
