    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section" style="background-image:url(<?php echo $this->Url->image('breadcrumb-bg.jpg') ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2></h2>
                        <div class="bt-option">
                          
                           
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


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
                         <li style="color:red ;">SI DECIDE PAGAR EN EL GIMNASIO NO TENDRA ACCESO A SU CUENTA HASTA QUE SE EFECTUE EL PAGO</li>
                     </ul>
                     <?= $this->Html->link('Pagar ahora', ['controller' => 'stripes', 'action'=>'suscripcionmensual'], ['class' => 'primary-btn pricing-btn']);?><br>
                     <?= $this->Html->link('Pagar en el gimnasio', ['controller' => 'Users', 'action'=>'logout'], ['class' => 'primary-btn pricing-btn']);?><br>
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
                         <li style="color:red ;">SI DECIDE PAGAR EN EL GIMNASIO NO TENDRA ACCESO A SU CUENTA HASTA QUE SE EFECTUE EL PAGO</li>
                     </ul>
                     <?= $this->Html->link('Pagar ahora', ['controller' => 'stripes', 'action'=>'suscripciontrimestral'], ['class' => 'primary-btn pricing-btn']);?><br>
                     <?= $this->Html->link('Pagar en el gimnasio', ['controller' => 'Users', 'action'=>'logout'], ['class' => 'primary-btn pricing-btn']);?><br>
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
                         <li style="color:red ;">SI DECIDE PAGAR EN EL GIMNASIO NO TENDRA ACCESO A SU CUENTA HASTA QUE SE EFECTUE EL PAGO</li>
                     </ul>
                     <?= $this->Html->link('Pagar ahora', ['controller' => 'Stripes', 'action' => 'suscripcionanual'], ['class' => 'primary-btn pricing-btn']); ?><br>
                     <?= $this->Html->link('Pagar en el gimnasio', ['controller' => 'Users', 'action'=>'logout'], ['class' => 'primary-btn pricing-btn']);?><br>
                     

                     
                     
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Pricing Section End -->