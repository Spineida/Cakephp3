<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $currentUser->getFullName(); ?></span>
                <?= $this->Html->image('undraw_profile.svg', ['class' => 'img-profile rounded-circle'])?>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?= $this->Html->link("<i class='fas fa-user fa-sm fa-fw mr-2 text-gray-400'></i> Perfil", ['controller' => 'Users', 'action' => 'profile'], ['class' => 'dropdown-item', 'escape' => false])?>
                <div class="dropdown-divider"></div>
                <?= $this->Html->link("<i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i> Logout", ['controller' => 'Users', 'action' => 'logout'], ['class' => 'dropdown-item', 'escape' => false])?>
            </div>
        </li>
    </ul>
</nav>