<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{





    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

               // SUBIDA FOTOS


               if (!$user->getErrors) {
                $image = $this->request->getData('image_file');


                $name  = $image->getClientFilename();

                if (
                    !is_dir(WWW_ROOT . 'img' . DS . 'user-img')
                )
                mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name;

                if ($name)
                $image->moveTo($targetPath);

                $user->image = 'user-img/' . $name;
            }


            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->Authentication->setIdentity($user);

    
                return $this->redirect(['controller' =>'users', 'action' => 'pagar']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'admin']);
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
        $this->Authorization->skipAuthorization(['login', 'register']);
        $this->Authentication->addUnauthenticatedActions(['login', 'register']);

    }
    public function login()
    {

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $rol = $this->Authentication->getResult()->getData()->rol;
            //SI NO HA PAGADO NO LE DEJA LOGEARSE
            if ($rol =='usuario'){
                return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
            }


            // redirect to profile
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'users',
                'action' => 'profile',
            ]);
            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }

        $this->Authorization->skipAuthorization();

    }


    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $this->Authorization->skipAuthorization();

    }

    public function admin(){
        $users = $this->Users;
        $this->Authorization->authorize($users);
        $users = $this->paginate($this->Users->find('all'));
        $this->set(compact('users'));
    }


    public function adminadd(){

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                //Mantener al admin logeado
                $usuarios = $this->getTableLocator()->get('users');
                $usuario = $usuarios->get($this->request->getSession()->read('Auth.id_usuario'));
                $this->Authentication->setIdentity($usuario);
                return $this->redirect(['action' => 'admin']);
                
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        
    }

    public function pagar(){
        $this->viewBuilder()->setLayout('layoutUser');
        error_reporting(0);
     

        }


    public function profile()
    {
        $this->Authorization->skipAuthorization();







        $id = $this->Authentication->getResult()->getData()->id_usuario;


        $users = $this->paginate($this->Users->find()->where(['id_usuario' => $id]));


        $this->set(compact('users'));



        //Si la fecha de abonado de un usuario es menor a la de hoy se el cancenlan los privilegios
        $usuarios = $this->getTableLocator()->get('Users');
        $usuario = $usuarios->get($this->request->getSession()->read('Auth.id_usuario'));

        $fechaSub = $usuario->fecha_fin_abono;
        $fechaActual = date('Y-m-d');
       
        if ($fechaSub < $fechaActual && $usuario->rol=='usuario') {
            $fechaSub = $fechaSub->i18nFormat('Y-MM-d');
            $usuario->abonado = 0;
            $usuario->rol = 'usuario';
            $usuarios->save($usuario);
            return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
    }
}
