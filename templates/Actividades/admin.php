<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividade[]|\Cake\Collection\CollectionInterface $actividades
 */
?>

<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividade[]|\Cake\Collection\CollectionInterface $actividades
 */
?>


<style>
body{
    
    background-color:#B3E5FC;

}


.card-1{

  border: none;
    border-radius: 10px;
    width: 100%;
    background-color: #fff;
}


.table-responsive{
    display: inline-table;
}

.btn{
            display: grid;
        }

</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section" style="background-image:url(<?php echo $this->Url->image('breadcrumb-bg.jpg') ?>)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb-text">
                    <h2>Administración actividades</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->



<div class="container mt-5">
<?= $this->Html->link(__('Anadir Actividad'), ['action' => 'add'], ['class' => 'btn btn-outline-success']) ?>
<br><br>
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
                    <span class="ml-2">Acciones</span>
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
                            <span class="d-block font-weight-bold"><?= h($actividade->fecha) ?></span>
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
                        <span class="font-weight-bold"><?= h($actividade->hora_fin) ?></span>
                        
                    </div>
                </td>
                <td>
                    <div class="p-2 icons">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $actividade->id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $actividade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividade->id)]) ?>

                    </div>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</div>




<!-- 

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
</div> -->
