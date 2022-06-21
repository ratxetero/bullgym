<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Rutinas Controller
 *
 * @property \App\Model\Table\RutinasTable $Rutinas
 * @method \App\Model\Entity\Rutina[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RutinasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $rutinas = $this->paginate($this->Rutinas);

        $this->set(compact('rutinas'));
    }

    /**
     * View method
     *
     * @param string|null $id Rutina id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rutina = $this->Rutinas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('rutina'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rutina = $this->Rutinas->newEmptyEntity();
        if ($this->request->is('post')) {
            $rutina = $this->Rutinas->patchEntity($rutina, $this->request->getData());
            if ($this->Rutinas->save($rutina)) {
                $this->Flash->success(__('La rutina se añdió correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La rutina no pudo ser añadida.'));
        }
        $this->set(compact('rutina'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rutina id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rutina = $this->Rutinas->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($rutina);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rutina = $this->Rutinas->patchEntity($rutina, $this->request->getData());
            if ($this->Rutinas->save($rutina)) {
                $this->Flash->success(__('La rutina se guardó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La rutina no pudo ser guardada'));
        }
        $this->set(compact('rutina'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rutina id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rutina = $this->Rutinas->get($id);
        $this->Authorization->authorize($rutina);
        if ($this->Rutinas->delete($rutina)) {
            $this->Flash->success(__('The rutina has been deleted.'));
        } else {
            $this->Flash->error(__('The rutina could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



  public function admin(){
    $this->Authorization->skipAuthorization();
    $rol = $this->Authentication->getResult()->getData()->rol;

    if ($rol == 'monitor') {
        $id = $this->Authentication->getResult()->getData()->id_usuario;
    


        $rutinas = $this->paginate($this->Rutinas->find()->where(['id_usuario'=>$id]));
       
       
        $this->set(compact('rutinas'));
    }else{


        $rutinas = $this->paginate($this->Rutinas);

        $this->set(compact('rutinas'));
    }


  }



  public function misrutinas(){
    $this->Authorization->skipAuthorization();
    $id = $this->Authentication->getResult()->getData()->id_usuario;
    


     $rutinas = $this->paginate($this->Rutinas->find()->where(['id_usuario'=>$id]));
    
    
     $this->set(compact('rutinas'));

}



    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        error_reporting(0);
        $rol = $this->Authentication->getResult()->getData()->rol;
        if ($rol =='admin') {
            $this->viewBuilder()->setLayout('layoutAdmin');
        }elseif ($rol =='monitor'){
            $this->viewBuilder()->setLayout('layoutMonitor');
        }else{
            $this->viewBuilder()->setLayout('default'); 
        }
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authorization->skipAuthorization(['add', 'index']);
        $this->Authentication->addUnauthenticatedActions(['add', 'index']);

    }
}
