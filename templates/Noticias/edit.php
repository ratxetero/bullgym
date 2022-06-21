<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rutina $rutina
 */
?>
<style>
    body {
        color: white;
    }
</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section" style="background-image:url(<?php echo $this->Url->image('breadcrumb-bg.jpg') ?>)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb-text">
                    <h2>Noticias</h2>
                    <div class="bt-option">
                        <a href="./index.html">Home</a>
                        <a href="#">Pages</a>
                        <span>Noticias</span>
                    </div>
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
                    <?php echo $this->Form->create($noticia, ['type' => 'file']); ?>
                    <fieldset>
                        <legend><?= __('Anadir Noticia') ?></legend>
                        <?php
                        $usuarios = \Cake\ORM\TableRegistry::getTableLocator()->get('Users');
                        $usuario = $usuarios->get($this->request->getSession()->read('Auth.id_usuario'));
                        $usuario = $usuario->id_usuario;


                        echo $this->Form->control('titulo');
                        echo $this->Form->control('photo', ['type' => 'file']);
                        echo $this->Form->control('texto');

                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>