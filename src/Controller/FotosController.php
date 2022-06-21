<?php

namespace App\Controller;
use App\Controller\AppController;


class FotosController extends AppController{


    public function initialize(): void {
    parent::initialize();
    $this->loadComponent('Paginator');
    $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index(){
    $this->Authorization->skipAuthorization();
    $fotos = $this->Paginator->paginate($this->Fotos->find());
    $this->set(compact('fotos'));
    }


    public function view($id_imagen){
    $foto = $this->Fotos->findByTitulo($id_imagen)->firstOrFail();
    $this->set(compact('foto'));
    }


    public function add(){
        
    $foto = $this->Fotos->newEmptyEntity();
    $this->Authorization->authorize($foto);
    if ($this->request->is('post')) {
    $foto = $this->Fotos->patchEntity($foto, $this->request->getData());



    
    // SUBIDA FOTOS


    if(!$foto->getErrors){
        $image = $this->request->getData('image_file');
  

        $name  = $image->getClientFilename();

        if( !is_dir(WWW_ROOT.'img'.DS.'foto-img') )
        mkdir(WWW_ROOT.'img'.DS.'foto-img',0775);
        
        $targetPath = WWW_ROOT.'img'.DS.'foto-img'.DS.$name;

        if($name)
        $image->moveTo($targetPath);
        
        $foto->image = 'foto-img/'.$name;
    }
    
    // Hardcoding the user_id is temporary, and will be removed later
    // when we build authentication out.
    $foto->user_id = 1;
    if ($this->Fotos->save($foto)) {
    $this->Flash->success(__('Su foto ha sido subida.'));
    return $this->redirect(['action' => 'admin']);
    }
    $this->Flash->error(__('No se pudo añadir su foto.'));
    }
    $this->set('foto', $foto);
    }


    public function edit($id_imagen){
        $foto = $this->Fotos
            ->findByTitulo($id_imagen)
            ->firstOrFail();
            $this->Authorization->authorize($foto);
        if ($this->request->is(['post', 'put'])) {
            $this->Fotos->patchEntity($foto, $this->request->getData());
            if ($this->Fotos->save($foto)) {
                $this->Flash->success(__('Your foto has been updated.'));
                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('Unable to update your foto.'));
        }
        $this->set('foto', $foto);
    }


    public function delete($id_imagen){
        $this->request->allowMethod(['post', 'delete']);
        $foto = $this->Fotos->findById_imagen($id_imagen)->firstOrFail();
        $this->Authorization->authorize($foto);
        if ($this->Fotos->delete($foto)) {
            $this->Flash->success(__('La {0} foto ha sido eliminada', $foto->id_imagen));
            return $this->redirect(['action' => 'admin']);
        }
    }

    public function admin(){

        $fotos = $this->Fotos;
        $this->Authorization->authorize($fotos);
        $fotos = $this->paginate($this->Fotos->find('all'));
        $this->set(compact('fotos'));
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
        // $this->Authorization->skipAuthorization(['login', 'register']);
        // $this->Authentication->addUnauthenticatedActions(['login', 'register']);

    }

}