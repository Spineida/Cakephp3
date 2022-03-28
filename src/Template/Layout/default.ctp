<!doctype html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <?= $this->Html->css([
        'fontawesome-free/css/all.min',
        'sb-admin-2.min',
        'custom'
    ]) ?>
    <?= $this->Html->script([
        'jquery.min',
        'bootstrap.bundle.min',
        'jquery.easing.min',
        'sb-admin-2.min',
        'sweetalert2.all.min'
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>


</head>
<body id="page-top" class="sidebar-toggled">
    <div id="wrapper">
        <?= $this->element('sidebar') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?= $this->element('nav') ?>
                <div class="container-fluid">
                    <?
                    $this->Breadcrumbs->setTemplates([
                        'wrapper' => '<ol class="breadcrumb"{{attrs}}>{{content}}</ol>',
                        'item' => '<li class="breadcrumb-item"><a href="{{url}}"{{innerAttrs}}>{{title}}</a></li>{{separator}}',
                        'itemWithoutLink' => '<li class="breadcrumb-item active"><span>{{title}}</span></li>{{separator}}',
                        'separator' => ''
                    ]);
                    ?>
                    <?= $this->Flash->render(); ?>
                    <div class="row">
                        <?= $this->Breadcrumbs->render(); ?>
                    </div>
                    
                    <?= $this->fetch('content') ?>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                </div>
            </footer>
        </div>
    </div>
    <?= $this->fetch('script') ?>
</body>

</html>