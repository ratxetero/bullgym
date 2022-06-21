<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rutina $rutina
 */
?>
<style>

body{
    color: white;
}
</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section" style="background-image:url(<?php echo $this->Url->image('breadcrumb-bg.jpg') ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Editar actividad</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <section class="contact-section spad formulario">
        <div class="container">
            <div class="row">
    <div class="col-lg-6">
    <div class="leave-comment">
            <?php echo $this->Form->create($actividade) ?>
            <fieldset>
                <legend><?= __('Editar Actividad') ?></legend>
                <?php
                $usuarios = \Cake\ORM\TableRegistry::getTableLocator()->get('Users');
                $usuario = $usuarios->get($this->request->getSession()->read('Auth.id_usuario'));
                $usuario = $usuario->id_usuario;

                echo $this->Form->hidden('user_id', ['value' => $usuario]);
                echo $this->Form->control('nombre');
                echo $this->Form->control('fecha');
                echo $this->Form->control('hora_inicio');
                echo $this->Form->control('hora_fin');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
    </div>
    </div>
        </div>
    </div>
    </section>