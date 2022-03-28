<?
$this->Breadcrumbs->add([
    ['title' => 'Usuarios']
]);
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Listado de usuarios</h1>
    <?
        if($currentUser->role_id == 1)
            echo $this->Html->link('<i class="fas fa-plus fa-sm text-white-50"></i> Agregar usuario', ['controller' => 'Users', 'action' => 'add'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-warning shadow-sm', 'escape' => false]) 
    ?>
</div>
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
            <a href="#filtro" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="filtro">
                <h2 class="h5 ml-1 text-gray-800">Filtros</h2>
            </a>
            <div class="collapse show" id="filtro">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <?= $this->Form->create(null, ["type" => "get", "valueSources" => "query"]); ?>
                                <div class="form-group row">
                                    <div class="col-md-3 col-sm-6 mb-2 mb-sm-0">
                                        <label>Nombre completo</label>
                                        <?= $this->Form->control('fullname', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'text'])?>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-2 mb-sm-0">
                                        <label>Email</label>
                                        <?= $this->Form->control('email', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'text'])?>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label>Rol</label>
                                        <?= $this->Form->control('role', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'select', 'options' => $roles, 'empty' => 'Seleccione un rol'])?>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <label>Estado</label>
                                        <?= $this->Form->control('status', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'select', 'options' => [1 => 'Activado', 0 => 'Desactivado'], 'empty' => 'Seleccione un estado'])?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2 col-sm-2">
                                        <?= $this->Form->submit('Filtrar', ['class' => 'btn btn-primary btn-user btn-block']); ?>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <?= $this->Html->link('Limpiar filtro', ['action' => 'index'], ['class' => 'btn btn-info btn-user btn-block']) ?>
                                    </div>
                                </div>
                            <?= $this->Form->end; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                                    <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                                    <th><?= $this->Paginator->sort('lastname', 'Apellido') ?></th>
                                    <th><?= $this->Paginator->sort('phone', 'Teléfono') ?></th>
                                    <th><?= $this->Paginator->sort('email', 'Email') ?></th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach($users as $user): ?>
                                <tr>
                                    <td><?= $user->id ?></td>
                                    <td><?= $user->name ?></td>
                                    <td><?= $user->lastname ?></td>
                                    <td><?= $user->phone ?></td>
                                    <td><?= $user->email?></td>
                                    <td><?= $user->role->name ?></td>
                                    <td><?= $user->getNameStatus()?></td>
                                    <td class="">
                                        <?
                                            if($currentUser->role_id == 1){
                                                if($user->id != $currentUser->id){
                                                    $parameter = $user->getParamterForChangeStatus();
                                                    echo $this->Form->postLink($parameter['icon'], ['action' => 'changeStatus', $user->id], ['confirm' => __($parameter['message'], $user->name, $user->lastname), 'class' => 'btn edit cancel-button', 'escape' => false]);
                                                }
    
                                                echo $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $user->id], ['class' => 'btn edit-button mr-1', 'escape' => false]);
                                                echo $this->Form->postLink('<i class="fas fa-trash"></i>', ['action' => 'delete', $user->id], ['confirm' => __('¿Estás seguro que deseas eliminar el usuario {0} {1}?', $user->name, $user->lastname), 'class' => 'btn edit cancel-button', 'escape' => false]);
                                            }
                                            echo $this->Html->link('<i class="fas fa-file"></i>', ['action' => 'view', $user->id], ['class' => 'btn edit-button mr-1', 'escape' => false]);
                                        ?>
                                        
                                    </td>
                                </tr>
                                <? endforeach;?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <?= $this->element('paginator') ?>
            </div>
        </div>
    </div>
</div>