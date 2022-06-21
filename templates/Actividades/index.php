<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividade[]|\Cake\Collection\CollectionInterface $actividades
 */
?>


<style>
    body {

        background-color: black;

    }


    .card-1 {

        border: none;
        border-radius: 10px;
        width: 100%;
        background-color: #fff;
    }


    .table-responsive {
        display: inline-table;
    }
</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section" style="background-image:url(<?php echo $this->Url->image('breadcrumb-bg.jpg') ?>)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb-text">
                    <h2>Actividades</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->



<div class="container mt-5">

    <table class="table table-borderless table-responsive card-1 p-4">
        <thead>
            <tr class="border-bottom">

                <th>
                    <span class="ml-2">Actividad</span>
                </th>
                <th>
                    <span class="ml-2">Fecha</span>
                </th>
                <th>
                    <span class="ml-2">Hora de inicio</span>
                </th>
                <th>
                    <span class="ml-2">Hora de fin</span>
                </th>
                <th>
                    <span class="ml-2">Reservar</span>
                </th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($actividades as $actividade) : ?>
                <tr class="border-bottom">
                    <td>
                        <div class="p-2">
                            <span class="d-block font-weight-bold"><?= h($actividade->nombre) ?></span>
                        </div>
                    </td>
                    <td>
                        <div class="p-2 d-flex flex-row align-items-center mb-2">

                            <div class="d-flex flex-column ml-2">
                                <span class="d-block font-weight-bold"><?= h($actividade->fecha->i18nFormat('dd-MM-yyyy')); ?></span>
                            </div>
                        </div>

                    </td>
                    <td>
                        <div class="p-2">
                            <span class="font-weight-bold"><?= h($actividade->hora_inicio) ?></span>
                        </div>
                    </td>
                    <td>
                        <div class="p-2 d-flex flex-column">
                            <span><?= h($actividade->hora_fin) ?></span>

                        </div>
                    </td>
                    <td>
                        <div class="p-2 icons">
                            <?php

                            $data = date("Y-m-d");
                     
                            $variable = $actividade->fecha; 
                            $variable = $variable->i18nFormat('dd-MM-yyyy');
                           
                          
                            
                            if ($data < $variable) {
                                echo $this->Html->link("Reservar", array('controller' => 'Actividades', 'action' => 'reservar', $actividade->id), array('class' => 'btn btn-success disabled'));
                            } else {
                                echo $this->Html->link("Reservar", array('controller' => 'Actividades', 'action' => 'reservar', $actividade->id), array('class' => 'btn btn-success'));
                            }
                            ?>
                        </div>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>


</div>


<!-- 
<div class="actividades index content">
    <?= $this->Html->link(__('New Actividade'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actividades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('hora_inicio') ?></th>
                    <th><?= $this->Paginator->sort('hora_fin') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('updated') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actividades as $actividade) : ?>
                    <tr>
                        <td><?= $this->Number->format($actividade->id) ?></td>
                        <td><?= h($actividade->nombre) ?></td>
                        <td><?= $this->Number->format($actividade->user_id) ?></td>
                        <td><?= h($actividade->fecha) ?></td>
                        <td><?= h($actividade->hora_inicio) ?></td>
                        <td><?= h($actividade->hora_fin) ?></td>
                        <td><?= h($actividade->created) ?></td>
                        <td><?= h($actividade->updated) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $actividade->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actividade->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actividade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividade->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> -->
<!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div> -->