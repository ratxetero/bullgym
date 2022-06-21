<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rutina $rutina
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rutina->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rutina->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Rutinas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rutinas form content">
            <?= $this->Form->create($rutina) ?>
            <fieldset>
                <legend><?= __('Edit Rutina') ?></legend>
                <?php
                    echo $this->Form->control('id_usuario');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('rutina');
                    echo $this->Form->control('fecha_creacion');
                    echo $this->Form->control('fecha_modificacion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
