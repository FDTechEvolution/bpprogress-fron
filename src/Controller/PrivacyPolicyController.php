<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PrivacyPolicy Controller
 *
 *
 * @method \App\Model\Entity\PrivacyPolicy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrivacyPolicyController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        
    }

    /**
     * View method
     *
     * @param string|null $id Privacy Policy id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $privacyPolicy = $this->PrivacyPolicy->get($id, [
            'contain' => [],
        ]);

        $this->set('privacyPolicy', $privacyPolicy);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $privacyPolicy = $this->PrivacyPolicy->newEntity();
        if ($this->request->is('post')) {
            $privacyPolicy = $this->PrivacyPolicy->patchEntity($privacyPolicy, $this->request->getData());
            if ($this->PrivacyPolicy->save($privacyPolicy)) {
                $this->Flash->success(__('The privacy policy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The privacy policy could not be saved. Please, try again.'));
        }
        $this->set(compact('privacyPolicy'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Privacy Policy id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $privacyPolicy = $this->PrivacyPolicy->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $privacyPolicy = $this->PrivacyPolicy->patchEntity($privacyPolicy, $this->request->getData());
            if ($this->PrivacyPolicy->save($privacyPolicy)) {
                $this->Flash->success(__('The privacy policy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The privacy policy could not be saved. Please, try again.'));
        }
        $this->set(compact('privacyPolicy'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Privacy Policy id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $privacyPolicy = $this->PrivacyPolicy->get($id);
        if ($this->PrivacyPolicy->delete($privacyPolicy)) {
            $this->Flash->success(__('The privacy policy has been deleted.'));
        } else {
            $this->Flash->error(__('The privacy policy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
