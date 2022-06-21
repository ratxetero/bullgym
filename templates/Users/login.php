<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */


?>
<style>
    .formulario {
        color: white;
    }
</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section" style="background-image:url(<?php echo $this->Url->image('breadcrumb-bg.jpg') ?>)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb-text">
                    <h2>Login</h2>

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
                    <?= $this->Flash->render() ?>
                    <?= $this->Form->create() ?>

                    <?= $this->Form->control('email', ['required' => true]) ?>
                    <?= $this->Form->control('password', ['required' => true]) ?>

                    <?= $this->Form->button(__('Login')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>

    </div>
</section>