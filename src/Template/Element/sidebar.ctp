<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-text mx-3">Prueba</div>
	</a>
	<hr class="sidebar-divider my-0">
	<div class="sidebar-heading">
		Secciones
	</div>
	<? foreach($sidebar as $module): ?>
		<? if($module['current'] == false):?>
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="<?= $module['ico']?>"></i>
					<span><?= $module['name']?></span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Vistas :</h6>
						<? foreach($module['submenu'] as $subMenu):?>
							<?= $this->Html->link("<i class='".$subMenu["ico"]."'></i>". $subMenu['name'], $subMenu["current"], ['class' => 'collapse-item', 'escape' => false])?>
						<? endforeach; ?>
					</div>
				</div>
			</li>
		<? else: ?>
			<li class="nav-item">
				<?= $this->Html->link("<i class='".$module["ico"]."'></i><span>". $module['name'] ."</span>", $module["current"], ['class' => 'nav-link', 'escape' => false])?>
			</li>
		<? endif; ?>
	<? endforeach;?>
	<hr class="sidebar-divider d-none d-md-block">
</ul>