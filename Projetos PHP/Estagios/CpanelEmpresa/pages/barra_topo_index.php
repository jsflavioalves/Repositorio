<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
    <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php session_start(); echo utf8_encode($_SESSION['nome_empresa']); ?></span>
      </a>
    </li>
    <!-- Control Sidebar Toggle Button -->
    <li>
      <a href="sair.php"><i class="fa fa-sign-out"></i> Sair</a>
    </li>
  </ul>
</div>