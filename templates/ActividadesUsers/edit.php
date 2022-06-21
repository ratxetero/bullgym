<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActividadesUser $actividadesUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $actividadesUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $actividadesUser->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Actividades Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividadesUsers form content">
            <?= $this->Form->create($actividadesUser) ?>
            <fieldset>
                <legend><?= __('Edit Actividades User') ?></legend>
                <?php
                    echo $this->Form->control('id_actividad');
                    echo $this->Form->control('id_usuario');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
