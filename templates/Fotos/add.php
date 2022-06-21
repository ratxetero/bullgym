
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
                        <h2>Añadir Imagen</h2>

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
    <?php echo $this->Form->create($foto, ['type' => 'file']);?>
            <fieldset>
                <legend><?= __('Añadir imagen') ?></legend>
                <?php


        
                echo $this->Form->control('nombre');
                echo $this->Form->control('image_file', ['label' => 'Imagen' , 'type' => 'file']);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
    </div>
    </div>
        </div>
    </div>
