<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividade $actividade
 */
?>
<br><br><br><br>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Actividade'), ['action' => 'edit', $actividade->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actividade'), ['action' => 'delete', $actividade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividade->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actividades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actividade'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Apuntarme'), ['controller' => 'Actividades', 'action' => 'reservar', $actividade->id]) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividades view content">
            <h3><?= h($actividade->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($actividade->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= $this->Number->format($actividade->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= $this->Number->format($actividade->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($actividade->fecha) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hora Inicio') ?></th>
                    <td><?= h($actividade->hora_inicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hora Fin') ?></th>
                    <td><?= h($actividade->hora_fin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($actividade->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($actividade->updated) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($actividade->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id Usuario') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Apellidos') ?></th>
                            <th><?= __('Fecha Nac') ?></th>
                            <th><?= __('Telefono') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Abonado') ?></th>
                            <th><?= __('Fecha Registro') ?></th>
                            <th><?= __('Fecha Fin Abono') ?></th>
                            <th><?= __('Rol') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($actividade->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id_usuario) ?></td>
                            <td><?= h($users->nombre) ?></td>
                            <td><?= h($users->apellidos) ?></td>
                            <td><?= h($users->fecha_nac) ?></td>
                            <td><?= h($users->telefono) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->abonado) ?></td>
                            <td><?= h($users->fecha_registro) ?></td>
                            <td><?= h($users->fecha_fin_abono) ?></td>
                            <td><?= h($users->rol) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id_usuario]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id_usuario]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id_usuario], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id_usuario)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
