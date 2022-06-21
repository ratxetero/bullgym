<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActividadesUser[]|\Cake\Collection\CollectionInterface $actividadesUsers
 */
?>
<div class="actividadesUsers index content">
    <?= $this->Html->link(__('New Actividades User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actividades Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('id_actividad') ?></th>
                    <th><?= $this->Paginator->sort('id_usuario') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('updated') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actividadesUsers as $actividadesUser): ?>
                <tr>
                    <td><?= $this->Number->format($actividadesUser->id) ?></td>
                    <td><?= $this->Number->format($actividadesUser->id_actividad) ?></td>
                    <td><?= $this->Number->format($actividadesUser->id_usuario) ?></td>
                    <td><?= h($actividadesUser->created) ?></td>
                    <td><?= h($actividadesUser->updated) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $actividadesUser->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actividadesUser->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actividadesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividadesUser->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
