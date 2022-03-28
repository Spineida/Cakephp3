<?
$this->Breadcrumbs->add([
    ['title' => 'Listado de usuarios', 'url' => ['controller' => 'Users', 'action' => 'index']],
    ['title' => 'Ver usuario']
]);
?>
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-md-12 mb-4">
                        <div class="form-group row">
                            <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
                                <label>Nombre</label>
                                <?= $this->Form->control('name', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'text', 'disabled', 'value' => $user->name]) ?>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Apellido</label>
                                <?= $this->Form->control('lastname', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'text', 'disabled', 'value' => $user->lastname]) ?>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Teléfono</label>
                                <?= $this->Form->control('phone', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'number', 'disabled', 'value' => $user->phone]) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-sm-6">
                                <label>Email</label>
                                <?= $this->Form->control('email', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'text', 'disabled', 'value' => $user->email]) ?>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
                                <label>Rol</label>
                                <?= $this->Form->control('role_id', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'text', 'disabled', 'value' => $user->role->name]) ?>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Estado</label>
                                <?= $this->Form->control('active', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'text', 'disabled', 'value' => $user->getNameStatus()]) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-sm-6 mt-5">
                                <?= $this->Html->link('Atras', ['controller' => 'users', 'action' => 'index'], ['class' => 'btn btn-info btn-block']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>