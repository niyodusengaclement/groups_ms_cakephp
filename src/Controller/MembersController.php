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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups'],
        ];
        $members = $this->paginate($this->Members);

        $this->set(compact('members'));
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

        $this->set('member', $member);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        try {
            $member = $this->Members->newEntity();
            if ($this->request->is('post')) {
                $member = $this->Members->patchEntity($member, $this->request->getData());
                if ($this->Members->save($member)) {
                    $this->Flash->success(__('The member has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }
               $this->Flash->error(__('The member could not be saved. Please, try again.'));
            }
            $groups = $this->Members->Groups->find('list', ['limit' => 200]);
            $this->set(compact('member', 'groups'));
        } catch (\Throwable $th) {
            $this->Flash->error(__('The member could not be saved. Please, check your input and try again.'));
            return $this->redirect(['action' => 'add']);
        }
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
        try {
            $member = $this->Members->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $member = $this->Members->patchEntity($member, $this->request->getData());
                if ($this->Members->save($member)) {
                    $this->Flash->success(__('The member has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The member could not be saved. Please, try again.'));
            }
            $groups = $this->Members->Groups->find('list', ['limit' => 200]);
            $this->set(compact('member', 'groups'));

        } catch (\Throwable $th) {
            $this->Flash->error(__('Something went wrong. Please, try again.'));
            return $this->redirect(['action' => 'index']);
        }

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
        $this->request->allowMethod(['post', 'delete']);
        $member = $this->Members->get($id);
        if ($this->Members->delete($member)) {
            $this->Flash->success(__('The member has been deleted.'));
        } else {
            $this->Flash->error(__('The member could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}