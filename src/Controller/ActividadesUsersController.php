<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ActividadesUsers Controller
 *
 * @property \App\Model\Table\ActividadesUsersTable $ActividadesUsers
 * @method \App\Model\Entity\ActividadesUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActividadesUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $actividadesUsers = $this->paginate($this->ActividadesUsers);

        $this->set(compact('actividadesUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Actividades User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $actividadesUser = $this->ActividadesUsers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('actividadesUser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $actividadesUser = $this->ActividadesUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $actividadesUser = $this->ActividadesUsers->patchEntity($actividadesUser, $this->request->getData());
            if ($this->ActividadesUsers->save($actividadesUser)) {
                $this->Flash->success(__('The actividades user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividades user could not be saved. Please, try again.'));
        }
        $this->set(compact('actividadesUser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Actividades User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $actividadesUser = $this->ActividadesUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actividadesUser = $this->ActividadesUsers->patchEntity($actividadesUser, $this->request->getData());
            if ($this->ActividadesUsers->save($actividadesUser)) {
                $this->Flash->success(__('The actividades user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividades user could not be saved. Please, try again.'));
        }
        $this->set(compact('actividadesUser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Actividades User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $actividadesUser = $this->ActividadesUsers->get($id);
        if ($this->ActividadesUsers->delete($actividadesUser)) {
            $this->Flash->success(__('The actividades user has been deleted.'));
        } else {
            $this->Flash->error(__('The actividades user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
