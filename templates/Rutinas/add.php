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
                        <h2>Añadir Rutina</h2>

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
            <?php echo $this->Form->create($rutina, ['type' => 'file']); ?>
            <fieldset>
                <legend><?= __('Anadir Rutina') ?></legend>
                <?php
                $usuarios = \Cake\ORM\TableRegistry::getTableLocator()->get('Users');
                $usuario = $usuarios->get($this->request->getSession()->read('Auth.id_usuario'));
                $usuario = $usuario->id_usuario;

                echo $this->Form->hidden('id_usuario', ['value' => $usuario]);
                echo $this->Form->control('descripcion');
                echo $this->Form->control('rutina', ['type' => 'file']);
                echo $this->Form->hidden('fecha_creacion');
                echo $this->Form->hidden('fecha_modificacion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
    </div>
    </div>
        </div>
    </div>
