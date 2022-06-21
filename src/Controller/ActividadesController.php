<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Actividades Controller
 *
 * @property \App\Model\Table\ActividadesTable $Actividades
 * @method \App\Model\Entity\Actividade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActividadesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        

        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            
        $actividades = $this->paginate($this->Actividades);
       

        $this->set(compact('actividades'));
        }else{
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
            exit;
        }
    }

    /**
     * View method
     *
     * @param string|null $id Actividade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $actividade = $this->Actividades->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('actividade'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // $this->Authorization->skipAuthorization();
        $actividade = $this->Actividades->newEmptyEntity();
        $this->Authorization->authorize($actividade);
        if ($this->request->is('post')) {
            $actividade = $this->Actividades->patchEntity($actividade, $this->request->getData());
            if ($this->Actividades->save($actividade)) {
                $this->Flash->success(__('The actividade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividade could not be saved. Please, try again.'));
        }
        $users = $this->Actividades->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('actividade', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Actividade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $actividade = $this->Actividades->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actividade = $this->Actividades->patchEntity($actividade, $this->request->getData());
            if ($this->Actividades->save($actividade)) {
                $this->Flash->success(__('The actividade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividade could not be saved. Please, try again.'));
        }
        $users = $this->Actividades->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('actividade', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Actividade id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $actividade = $this->Actividades->get($id);
        if ($this->Actividades->delete($actividade)) {
            $this->Flash->success(__('The actividade has been deleted.'));
        } else {
            $this->Flash->error(__('The actividade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function reservar($id = null)
    {

        $actividad = $this->Actividades->get($id);
        $usuarios = $this->getTableLocator()->get('Users');
        $reservante = $usuarios->get($this->request->getSession()->read('Auth.id_usuario'));
        $this->Authorization->skipAuthorization();
        $actividade = $this->Actividades->get($id, [
            'contain' => ['Users'],
        ]);
        // if ($actividade->estado !== 'aceptada') {

            // $actividade->estado = 'aceptada';
            $this->Actividades->save($actividade);
        // }
        if ($this->Actividades->Users->link($actividad, [$reservante])) {

            return $this->redirect(['action' => 'index']);
        }
    }



    public function misreservas()
    {
      
        $id = $this->request->getSession()->read('Auth.id_usuario');
        $actividades = $this->Actividades->find();
        $actividades->matching('Users', function ($q) use ($id) {
            return $q
                ->where(['Users.id_usuario' => $id]);
        });
       
        $actividades = $this->paginate($actividades);
        
        $this->set(compact('actividades'));
      
    }


//?

    public function eliminacion($id = null)
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


    
   

    public function misactividades(){
        $this->Authorization->skipAuthorization();
        $id = $this->Authentication->getResult()->getData()->id_usuario;
        
   
 
         $actividades = $this->paginate($this->Actividades->find()->where(['user_id'=>$id]));
        
        
         $this->set(compact('actividades'));

    }

    public function admin()
    {
        $this->Authorization->skipAuthorization();
        $actividades = $this->paginate($this->Actividades);

        $this->set(compact('actividades'));
    }



    public function beforeFilter(\Cake\Event\EventInterface $event)
    {

        error_reporting(0);
        $rol = $this->Authentication->getResult()->getData()->rol;
        if ($rol =='admin') {
            $this->viewBuilder()->setLayout('layoutAdmin');
        }elseif ($rol =='monitor'){
            $this->viewBuilder()->setLayout('layoutMonitor');
        }else{
            $this->viewBuilder()->setLayout('default'); 
        }
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
      $this->Authorization->skipAuthorization(['prueba']);
         $this->Authentication->addUnauthenticatedActions(['prueba']);

    }
    public function prueba(){

    }




    

    }

