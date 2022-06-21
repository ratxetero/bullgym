<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

 
?>
<style>
.formulario{
    color: white;
}
</style>
    <!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section" style="background-image:url(<?php echo $this->Url->image('breadcrumb-bg.jpg') ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Añadir usuario</h2>
 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad formulario">
        <div class="container">
            <div class="row">
                



                <div class="col-lg-6">
                    <div class="leave-comment">
                    <?= $this->Form->create($user,['type' => 'file']); ?>
                    <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellidos');
                    echo $this->Form->control('fecha_nac');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('abonado');
                    echo $this->Form->control('fecha_registro');
                    echo $this->Form->control('fecha_fin_abono', ['empty' => true]);
                    echo $this->Form->control('image_file', ['type' => 'file', 'label'=>'Foto de perfil']);
                    echo $this->Form->control('rol');
                    ?>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="section-title contact-title">
                        <h2>SI TIENES ALGUNA DUDA</h2>
                        <span>No dudes en contactarnos</span>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-text">
                            <i class="fa fa-map-marker"></i>
                            <p>333 Middle Winchendon Rd, Rindge,<br/> NH 03461</p>
                        </div>
                        <div class="cw-text">
                            <i class="fa fa-mobile"></i>
                            <ul>
                                <li>125-711-811</li>
                                <li>125-668-886</li>
                            </ul>
                        </div>
                        <div class="cw-text email">
                            <i class="fa fa-envelope"></i>
                            <p>Support.gymcenter@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Contact Section End -->


