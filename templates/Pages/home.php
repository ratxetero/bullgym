 <!-- Hero Section Begin -->

 <style>
     body {
         background-color: black;
     }
 </style>
 <section class="hero-section">
     <div class="hs-slider owl-carousel">
         <div class="hs-item set-bg" data-setbg="img/hero/portada.png" style="background-image: url(img/hero/portada.png);">

             <div class="container">
                 <div class="row">
                     <div class="col-lg-6 offset-lg-6">
                         <div class="hi-text">
                             <span>Shape your body</span>
                             <h1>Be <strong>strong</strong> traning hard</h1>
                             <a href="#" class="primary-btn">Get info</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6 offset-lg-6">
                         <div class="hi-text">
                             <span>Shape your body</span>
                             <h1>Be <strong>strong</strong> traning hard</h1>
                             <a href="#" class="primary-btn">Get info</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Hero Section End -->

 <br><br>
 <!-- Empieza a sentirte bn -->
 <section class="banner-section set-bg" data-setbg="img/banner-bg.jpg" style="background-image: url(img/banner-bg.jpg);">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 text-center">
                 <div class="bs-text">
                     <h2>EMPIEZA A SENTIRTE BIEN</h2>
                     <div class="bt-tips">En BullGym creemos en el ejercicio físico.
                         Está probado científicamente que la práctica deportiva libera endorfinas,
                         serotonina y reduce el estrés.

                         Es imprescindible tener un equilibrio entre una mente y un
                         cuerpo sano para sentirse bien y en Bullgym este es nuestro objetivo.</div>

                     <?php echo $this->Html->link('INSCRIBETE', ['controller' => 'Users', 'action' => 'register'], ['class' => 'primary-btn  btn-normal']) ?>

                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- bn -->

 <br><br>


 <!-- Pricing Section Begin -->
 <section class="pricing-section spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title">
                     <span>Nuestras tarifas</span>
                     <h2>Selecciona tu suscripción</h2>
                 </div>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col-lg-4 col-md-8">
                 <div class="ps-item">
                     <h3>Mensual</h3>
                     <div class="pi-price">
                         <h2>40€</h2>
                         <span>/MES</span>
                     </div>
                     <ul>
                         <li>Acceso ilimitado a todas las instalaciones</li>
                         <li>Acceso a todas las actividades</li>
                         <li>Rutinas personalizadas</li>
                         <li>Renueva siempre que quieras sin colas en el gimnasio</li>
                         <li>Atencion personalziada</li>

                     </ul>
                     <?= $this->Html->link('DATE DE ALTA', ['controller' => 'Users', 'action' => 'register'], ['class' => 'primary-btn pricing-btn']); ?><br>
                 </div>
             </div>
             <div class="col-lg-4 col-md-8">
                 <div class="ps-item">
                     <h3>TRIMESTRAL</h3>
                     <div class="pi-price">
                         <h2>30€</h2>
                         <span>/MES</span>
                     </div>
                     <ul>
                         <li>Acceso ilimitado a todas las instalaciones</li>
                         <li>Acceso a todas las actividades</li>
                         <li>Rutinas personalizadas</li>
                         <li>Renueva siempre que quieras sin colas en el gimnasio</li>
                         <li>Atencion personalziada</li>
                     </ul>
                     <?= $this->Html->link('DATE DE ALTA', ['controller' => 'Users', 'action' => 'register'], ['class' => 'primary-btn pricing-btn']); ?><br>

                 </div>
             </div>
             <div class="col-lg-4 col-md-8">
                 <div class="ps-item">
                     <h3>ANUAL</h3>
                     <div class="pi-price">
                         <h2>20€</h2>
                         <span>/MES</span>
                     </div>
                     <ul>
                         <li>Acceso ilimitado a todas las instalaciones</li>
                         <li>Acceso a todas las actividades</li>
                         <li>Rutinas personalizadas</li>
                         <li>Renueva siempre que quieras sin colas en el gimnasio</li>
                         <li>Atencion personalziada</li>
                     </ul>
                     <?= $this->Html->link('DATE DE ALTA', ['controller' => 'Users', 'action' => 'register'], ['class' => 'primary-btn pricing-btn']); ?><br>



                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Pricing Section End -->

 <br><br><br>

 <!-- Team Section Begin -->
 <section class="team-section spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="team-title">
                     <div class="section-title">
                         <span>Nuestro equipo</span>
                         <h2>Entrena con los mejores expertos</h2>
                     </div>

                 </div>
             </div>
         </div>
         <div class="row">
             <div class="ts-slider owl-carousel">
                 <div class="col-lg-4">
                     <div class="ts-item set-bg" data-setbg="img/team/team-1.jpg">
                         <div class="ts_text">
                             <h4>Raquel Hidalgo</h4>
                             <span>Nutricionista</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4">
                     <div class="ts-item set-bg" data-setbg="img/team/team-2.jpg">
                         <div class="ts_text">
                             <h4>Antonio Salas</h4>
                             <span>Entrenador</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4">
                     <div class="ts-item set-bg" data-setbg="img/team/team-3.jpg">
                         <div class="ts_text">
                             <h4>Pepe Sainz</h4>
                             <span>Culturista</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4">
                     <div class="ts-item set-bg" data-setbg="img/team/team-4.jpg">
                         <div class="ts_text">
                             <h4>Carlos Hidalgo</h4>
                             <span>Entrenador</span>
                         </div>
                     </div>
                 </div>


             </div>
         </div>
     </div>
 </section>
 <!-- Team Section End -->

 <!-- Get In Touch Section Begin -->
 <div class="gettouch-section">
     <div class="container">
         <div class="row">
             <div class="col-md-4">
                 <div class="gt-text">
                     <i class="fa fa-map-marker"></i>
                     <p>Av. de Lobete, número 3,<br> 26003 Logroño, La Rioja</p>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="gt-text">
                     <i class="fa fa-mobile"></i>
                     <ul>
                         <li>642110929</li>
                         <li>941696969</li>
                     </ul>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="gt-text email">
                     <i class="fa fa-envelope"></i>
                     <p>aagudelo@jig.es</p>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Get In Touch Section End -->