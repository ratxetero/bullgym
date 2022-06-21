<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id_usuario], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id_usuario], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id_usuario), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id_usuario) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($user->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellidos') ?></th>
                    <td><?= h($user->apellidos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono') ?></th>
                    <td><?= h($user->telefono) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rol') ?></th>
                    <td><?= h($user->rol) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Usuario') ?></th>
                    <td><?= $this->Number->format($user->id_usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Nac') ?></th>
                    <td><?= h($user->fecha_nac) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Registro') ?></th>
                    <td><?= h($user->fecha_registro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Fin Abono') ?></th>
                    <td><?= h($user->fecha_fin_abono) ?></td>
                </tr>
                <tr>
                    <th><?= __('Abonado') ?></th>
                    <td><?= $user->abonado ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
