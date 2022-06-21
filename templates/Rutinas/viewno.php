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
            <?= $this->Html->link(__('Edit Rutina'), ['action' => 'edit', $rutina->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rutina'), ['action' => 'delete', $rutina->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rutina->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rutinas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rutina'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rutinas view content">
            <h3><?= h($rutina->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Rutina') ?></th>
                    <td><?= h($rutina->rutina) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rutina->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Usuario') ?></th>
                    <td><?= $this->Number->format($rutina->id_usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Creacion') ?></th>
                    <td><?= h($rutina->fecha_creacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Modificacion') ?></th>
                    <td><?= h($rutina->fecha_modificacion) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($rutina->descripcion)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
