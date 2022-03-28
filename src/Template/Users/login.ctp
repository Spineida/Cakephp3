<?
	$this->Form->setTemplates([
		'inputContainer' => '<div class="form-group">{{content}}</div>',
		'label' => false
	]);
?>
<div class="p-5">
	<div class="text-center">
		<h1 class="h4 text-gray-900 mb-4">Ingreso</h1>
	</div>
	<?= $this->Form->create(null, ['controller' => 'users', 'action' => 'login', 'method' => 'post', 'class' => 'user'])?>
		<?= $this->Form->control('email', ['required' => true, 'type' => 'email', 'placeholder' => 'Ingrese email', 'class' => 'form-control form-control-user'])?>
		<?= $this->Form->control('password', ['required' => true, 'type' => 'password', 'placeholder' => 'Ingrese contraseña', 'class' => 'form-control form-control-user'])?>
		<?= $this->Form->submit('Login', ['class' => 'btn btn-primary btn-user btn-block'])?>
	<?= $this->Form->end(); ?>
</div>