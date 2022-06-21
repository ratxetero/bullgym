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
            <?= $this->Html->link(__('Edit Actividades User'), ['action' => 'edit', $actividadesUser->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actividades User'), ['action' => 'delete', $actividadesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividadesUser->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actividades Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actividades User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividadesUsers view content">
            <h3><?= h($actividadesUser->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($actividadesUser->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Actividad') ?></th>
                    <td><?= $this->Number->format($actividadesUser->id_actividad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Usuario') ?></th>
                    <td><?= $this->Number->format($actividadesUser->id_usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($actividadesUser->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($actividadesUser->updated) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
