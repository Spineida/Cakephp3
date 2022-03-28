<?
    $this->Form->setTemplates([
        'inputContainer' => '{{content}}',
        'inputContainerError' => '{{content}}{{error}}',
        'error' => '<div class="input-errors">{{content}}{{error}}</div>',
        'errorList' => '<p class="help-block">{{content}}</p>',
        'errorItem' => '{{text}}<br>'
    ]);
?>

<?= $this->Form->create($user, ['method' => 'post', 'id' => 'form', 'class' => 'need-validation']); ?>
<div class="form-group row">
    <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
        <label>Nombre</label>
        <?= $this->Form->control('name', ['class' => 'form-control form-control-user', 'label' => false, 'required' => true, 'type' => 'text', 'maxlength' => '80'])?>
    </div>
    <div class="col-md-4 col-sm-6">
        <label>Apellido</label>
        <?= $this->Form->control('lastname', ['class' => 'form-control form-control-user', 'label' => false, 'required' => true, 'type' => 'text', 'maxlength' => '80'])?>
    </div>
    <div class="col-md-4 col-sm-6">
        <label>Teléfono</label>
        <?= $this->Form->control('phone', ['class' => 'form-control form-control-user', 'label' => false, 'required' => true, 'type' => 'number', 'maxlength' => '12'])?>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4 col-sm-6">
        <label>Email</label>
        <?= $this->Form->control('email', ['class' => 'form-control form-control-user', 'label' => false, 'required' => true, 'type' => 'email', 'maxlength' => '80'])?>
    </div>
    <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
        <label>Contraseña</label>
        <?= $this->Form->control('password', ['class' => 'form-control password form-control-user', 'maxlength' => '20', 'label' => false, 'required' => $this->request->getParam('action') == 'add' ? true : false, 'type' => 'password', 'id' => 'pwd', 'value' => '', 'autocomplete' => 'off'])?>
    </div>
    <div class="col-md-4 col-sm-6">
        <label>Confirmación de contraseña</label>
        <?= $this->Form->control('password_confirmation', ['class' => 'form-control password form-control-user', 'maxlength' => '20', 'label' => false, 'required' =>  $this->request->getParam('action') == 'add' ? true : false, 'type' => 'password', 'id' => 'pwdc', 'value' => '', 'autocomplete' => 'off'])?>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
        <label>Rol</label>
        <?= $this->Form->control('role_id', ['class' => 'form-control form-control-user', 'label' => false, 'required' => true, 'type' => 'select', 'options' => $roles])?>
    </div>
    <div class="col-md-4 col-sm-6">
        <label>Estado</label>
        <?= $this->Form->control('active', ['class' => 'form-control form-control-user', 'label' => false, 'required' => true, 'type' => 'select', 'options' => [ 1 => 'Activo', 0 => 'Desactivado']])?>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3 col-sm-6 mt-5">
        <?= $this->Form->submit('Guardar', ['class' => 'btn btn-success btn-user btn-block']); ?>
    </div>
    <div class="col-md-3 col-sm-6 mt-5">
        <?= $this->Html->link('Cancelar', ['controller' => 'users', 'action' => 'index'], ['class' => 'btn btn-danger btn-block']);?>
    </div>
</div>
<?= $this->Form->end; ?>
<? $this->Html->scriptStart(['block' => true]); ?>
    var validation = true;

    $(document).ready(function(){
        $('.password').change(function(){
            pwd = $('#pwd');
            pwdc = $('#pwdc');
            if(pwd.val() != pwdc.val()){
                validation = false;
                pwd.addClass("is-invalid");
                pwdc.addClass("is-invalid");
            }else{
                validation = true;
                pwd.removeClass("is-invalid");
                pwdc.removeClass("is-invalid");
            }
        });

        $("#form").submit(function(e){
            if(validation == true){
                return true;
            }else{
                Swal.fire({
                    title: 'Error',
                    text: 'Las contraseñas deben ser las mismas',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
                return false;
            }
        })

    });
<?= $this->Html->scriptEnd(); ?>