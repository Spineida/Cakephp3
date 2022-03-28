<?
$this->Form->setTemplates([
    'inputContainer' => '{{content}}',
    'inputContainerError' => '{{content}}{{error}}',
    'error' => '<div class="input-errors">{{content}}{{error}}</div>',
    'errorList' => '<p class="help-block">{{content}}</p>',
    'errorItem' => '{{text}}<br>'
]);
?>
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-md-12 mb-4">
                        <?= $this->Form->create($user, ['method' => 'post', 'id' => 'form']); ?>
                        <div class="form-group row">
                            <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
                                <label>Nombre</label>
                                <?= $this->Form->control('name', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'text', 'required' => true, 'value' => $user->name]) ?>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Apellido</label>
                                <?= $this->Form->control('lastname', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'text', 'required' => true, 'value' => $user->lastname]) ?>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Teléfono</label>
                                <?= $this->Form->control('phone', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'number', 'required' => true, 'value' => $user->phone]) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-sm-6">
                                <label>Email</label>
                                <?= $this->Form->control('email', ['class' => 'form-control form-control-user', 'label' => false, 'type' => 'text', 'disabled', 'value' => $user->email]) ?>
                            </div>
                            <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
                                <label>Contraseña</label>
                                <?= $this->Form->control('password', ['class' => 'form-control password form-control-user', 'label' => false, 'required' => $this->request->getParam('action') == 'add' ? true : false, 'type' => 'password', 'id' => 'pwd', 'value' => '', 'autocomplete' => 'off']) ?>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Confirmación de contraseña</label>
                                <?= $this->Form->control('password_confirmation', ['class' => 'form-control password form-control-user', 'label' => false, 'required' =>  $this->request->getParam('action') == 'add' ? true : false, 'type' => 'password', 'id' => 'pwdc', 'value' => '', 'autocomplete' => 'off']) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-sm-6 mt-5">
                                <?= $this->Form->submit('Guardar', ['class' => 'btn btn-success btn-user btn-block']); ?>
                            </div>
                            <div class="col-md-3 col-sm-6 mt-5">
                                <?= $this->Html->link('Atras', ['controller' => 'users', 'action' => 'index'], ['class' => 'btn btn-info btn-block']); ?>
                            </div>
                        </div>
                        <?= $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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