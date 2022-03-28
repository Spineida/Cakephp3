<?
$this->Breadcrumbs->add([
    ['title' => 'Listado de usuarios', 'url' => ['controller' => 'Users', 'action' => 'index']],
    ['title' => 'Agregar usuario']
]);
?>
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-md-12 mb-4">
                        <?= $this->element('Users/form'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
