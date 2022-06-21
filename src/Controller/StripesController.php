<?php

namespace App\Controller;

use Stripe;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\ORM\Locator\TableLocator;


class StripesController extends AppController
{



    public function suscripcionanual()
    {
        $this->Authorization->skipAuthorization();
        $this->set("title", "Stripe Payment Gateway Integration");
    }

    public function anual()
    {
        $this->Authorization->skipAuthorization();
        require_once VENDOR_PATH . '/stripe/stripe-php/init.php';


        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $stripe = Stripe\Charge::create([
            "amount" => 240 * 100,
            "currency" => "eur",
            "source" => $_REQUEST["stripeToken"],
            "description" => "Suscripción anual a bull gym"
        ]);




        // after successfull payment, you can store payment related information into your database


        $usuarios = $this->getTableLocator()->get('Users');
        $usuario = $usuarios->get($this->request->getSession()->read('Auth.id_usuario'));
        $abonado = $usuario->abonado;
        if ($abonado == 0) {
            // //Poner abonado a 1
            $usuario->abonado = 1;

            // obtener fecha de hoy y sumarle un ano
            $future_timestamp = strtotime("+12 month");
            $data = date('Y-m-d', $future_timestamp);
            //hacemos el update en la bdd
            $usuario->fecha_fin_abono = $data;
            $usuario->rol = 'abonado';

            // guardamos los upadtes hechos previamente
            $usuarios->save($usuario);
        } else {

            $fechacaducidad = $usuario->fecha_fin_abono;
            //  $future_timestamp = strtotime("+12 month");
            $data = date("Y-m-d", strtotime($fechacaducidad . "+ 12 month"));
            $usuario->fecha_fin_abono = $data;
            $usuario->rol = 'abonado';
            $usuarios->save($usuario);
        }




        //debugear por si acaso
        // debug($usuario);



        $this->Flash->success(__('Pago realizado correctamente'));

        //Enviar mail

        TransportFactory::setConfig('gmail', [
            'host' => 'ssl://smtp.gmail.com',
            'port' => 465,
            'username' => 'smr01.2018@gmail.com', // swap with your credentials
            'password' => 'jcgtoiwicsclrglu', // swap with your credentials
            'className' => 'Smtp'
        ]);



        //Obtener el correo del usuario para enviarselo


        $correo = $usuario->email;



        $mailer = new Mailer('default');
        $mailer->setTransport('gmail');
        $mailer->setEmailFormat('html');
        $mailer->setFrom('bullgym@gmail.com', 'Bull Gym');
        $mailer->setSubject('Suscripciones Bullgym');
        $mailer->setTo($correo); $mailer->viewBuilder()
        ->setTemplate('default')
        ->setLayout('default');
        $mailer->deliver();
        return $this->redirect(['controller' => 'pages', 'action' => 'index']);
    }




    public function suscripciontrimestral()
    {
        $this->Authorization->skipAuthorization();
        $this->set("title", "Stripe Payment Gateway Integration");
    }

    public function trimestral()
    {
        $this->Authorization->skipAuthorization();
        require_once VENDOR_PATH . '/stripe/stripe-php/init.php';


        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $stripe = Stripe\Charge::create([
            "amount" => 90 * 100,
            "currency" => "eur",
            "source" => $_REQUEST["stripeToken"],
            "description" => "Suscripción trimestral a bull gym"
        ]);
        // after successfull payment, you can store payment related information into your database


        $usuarios = $this->getTableLocator()->get('Users');
        $usuario = $usuarios->get($this->request->getSession()->read('Auth.id_usuario'));
        $abonado = $usuario->abonado;
        if ($abonado == 0) {
            // //Poner abonado a 1
            $usuario->abonado = 1;

            // obtener fecha de hoy y sumarle un ano
            $future_timestamp = strtotime("+3 month");
            $data = date('Y-m-d', $future_timestamp);
            //hacemos el update en la bdd
            $usuario->fecha_fin_abono = $data;
            $usuario->rol = 'abonado';
            // guardamos los upadtes hechos previamente
            $usuarios->save($usuario);
        } else {

            $fechacaducidad = $usuario->fecha_fin_abono;
            //  $future_timestamp = strtotime("+12 month");
            $data = date("Y-m-d", strtotime($fechacaducidad . "+ 3 month"));
            $usuario->fecha_fin_abono = $data;
            $usuario->rol = 'abonado';
            $usuarios->save($usuario);
        }




        //debugear por si acaso
        // debug($usuario);



        $this->Flash->success(__('Pago realizado correctamente'));

        //Enviar mail

        TransportFactory::setConfig('gmail', [
            'host' => 'ssl://smtp.gmail.com',
            'port' => 465,
            'username' => 'smr01.2018@gmail.com', // swap with your credentials
            'password' => 'jcgtoiwicsclrglu', // swap with your credentials
            'className' => 'Smtp'
        ]);



        //Obtener el correo del usuario para enviarselo
    


        $correo = $usuario->email;

        $mailer = new Mailer('default');
        $mailer->setTransport('gmail');
        $mailer->setEmailFormat('html');
        $mailer->setFrom('bullgym@gmail.com', 'Bull Gym');
        $mailer->setSubject('Suscripciones Bullgym');
        $mailer->setTo($correo);
        $mailer->viewBuilder()
        ->setTemplate('default')
        ->setLayout('default');
        $mailer->deliver();
       
        return $this->redirect(['controller' => 'pages', 'action' => 'index']);
    }



    public function suscripcionmensual()
    {
        $this->Authorization->skipAuthorization();
        $this->set("title", "Stripe Payment Gateway Integration");
    }

    public function mensual()
    {
        $this->Authorization->skipAuthorization();
        require_once VENDOR_PATH . '/stripe/stripe-php/init.php';


        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $stripe = Stripe\Charge::create([
            "amount" => 40 * 100,
            "currency" => "eur",
            "source" => $_REQUEST["stripeToken"],
            "description" => "Suscripción mensual a bull gym"
        ]);
        // after successfull payment, you can store payment related information into your database


        $usuarios = $this->getTableLocator()->get('Users');
        $usuario = $usuarios->get($this->request->getSession()->read('Auth.id_usuario'));
        $abonado = $usuario->abonado;
        if ($abonado == 0) {
            // //Poner abonado a 1
            $usuario->abonado = 1;

            // obtener fecha de hoy y sumarle un ano
            $future_timestamp = strtotime("+1 month");
            $data = date('Y-m-d', $future_timestamp);
            //hacemos el update en la bdd
            $usuario->fecha_fin_abono = $data;
            $usuario->rol = 'abonado';
            // guardamos los upadtes hechos previamente
            $usuarios->save($usuario);
        } else {

            $fechacaducidad = $usuario->fecha_fin_abono;
            //  $future_timestamp = strtotime("+12 month");
            $data = date("Y-m-d", strtotime($fechacaducidad . "+ 1 month"));
            $usuario->fecha_fin_abono = $data;
            $usuario->rol = 'abonado';
            $usuarios->save($usuario);
        }




        //debugear por si acaso
        // debug($usuario);


        $this->Flash->success(__('Pago realizado correctamente'));

        //Enviar mail

        TransportFactory::setConfig('gmail', [
            'host' => 'ssl://smtp.gmail.com',
            'port' => 465,
            'username' => 'smr01.2018@gmail.com', // swap with your credentials
            'password' => 'jcgtoiwicsclrglu', // swap with your credentials
            'className' => 'Smtp'
        ]);



        //Obtener el correo del usuario para enviarselo
       


        $correo = $usuario->email;



        $mailer = new Mailer('default');
        $mailer->setTransport('gmail');
        $mailer->setEmailFormat('html');
        $mailer->setFrom('bullgym@gmail.com', 'Bull Gym');
        $mailer->setSubject('Suscripciones Bullgym');
        $mailer->setTo($correo);
        $mailer->viewBuilder()
        ->setTemplate('default')
        ->setLayout('default');
        $mailer->deliver();

        return $this->redirect(['controller' => 'pages', 'action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {

        error_reporting(0);
        $rol = $this->Authentication->getResult()->getData()->rol;
        if ($rol == 'admin') {
            $this->viewBuilder()->setLayout('layoutAdmin');
        } elseif ($rol == 'monitor') {
            $this->viewBuilder()->setLayout('layoutMonitor');
        } else {
            $this->viewBuilder()->setLayout('default');
        }
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        // $this->Authorization->skipAuthorization(['login', 'register']);
        // $this->Authentication->addUnauthenticatedActions(['login', 'register']);

    }
}
