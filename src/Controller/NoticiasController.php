<?php

namespace App\Controller;
use App\Controller\AppController;


class NoticiasController extends AppController{


    public function initialize(): void {
    parent::initialize();
    $this->loadComponent('Paginator');
    $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index(){
    $this->Authorization->skipAuthorization();
    $noticias = $this->Paginator->paginate($this->Noticias->find());
    $this->set(compact('noticias'));
    }


    public function view($titulo){
        $this->Authorization->skipAuthorization();
    $noticia = $this->Noticias->findByTitulo($titulo)->firstOrFail();
    $this->set(compact('noticia'));
    }


    public function add(){
    $noticia = $this->Noticias->newEmptyEntity();
    $this->Authorization->authorize($noticia);
    if ($this->request->is('post')) {
    $noticia = $this->Noticias->patchEntity($noticia, $this->request->getData());



    // SUBIDA FOTOS


    if(!$noticia->getErrors){
        $image = $this->request->getData('image_file');
  

        $name  = $image->getClientFilename();

        if( !is_dir(WWW_ROOT.'img'.DS.'noticia-img') )
        mkdir(WWW_ROOT.'img'.DS.'noticia-img',0775);
        
        $targetPath = WWW_ROOT.'img'.DS.'noticia-img'.DS.$name;

        if($name)
        $image->moveTo($targetPath);
        
        $noticia->image = 'noticia-img/'.$name;
    }
    
    // Hardcoding the user_id is temporary, and will be removed later
    // when we build authentication out.
    $noticia->user_id = 1;
    if ($this->Noticias->save($noticia)) {
    $this->Flash->success(__('Su noticia se añadió correctamente.'));
    return $this->redirect(['action' => 'admin']);
    }
    $this->Flash->error(__('No se pudo añadir su noticia.'));
    }
    $this->set('noticia', $noticia);
    }


    public function edit($titulo){
        $noticia = $this->Noticias
            ->findByTitulo($titulo)
            ->firstOrFail();
            $this->Authorization->authorize($noticia);
        if ($this->request->is(['post', 'put'])) {
            $this->Noticias->patchEntity($noticia, $this->request->getData());
            if ($this->Noticias->save($noticia)) {
                $this->Flash->success(__('Su noticia se actualizó correctamente.'));
                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('No se pudo actualizar su noticia.'));
        }
        $this->set('noticia', $noticia);
    }


    public function delete($titulo){
        $this->request->allowMethod(['post', 'delete']);
        $noticia = $this->Noticias->findByTitulo($titulo)->firstOrFail();
        $this->Authorization->authorize($noticia);
        if ($this->Noticias->delete($noticia)) {
            $this->Flash->success(__('La noticia ha sido eliminada', $noticia->titulo));
            return $this->redirect(['action' => 'admin']);
        }
    }



    public function admin(){

        $noticias = $this->Noticias;
        $this->Authorization->authorize($noticias);
        $noticias = $this->paginate($this->Noticias->find('all'));
        $this->set(compact('noticias'));

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