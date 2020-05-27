<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
    <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../../CpanelAluno/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo utf8_encode($nome_aluno); ?></span>
      </a>
      <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
          <img src="../../CpanelAluno/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

          <p>
            <?php echo utf8_encode($nome_aluno); ?>
            <small><?php echo $curso; ?></small>
          </p>
        </li>
        <!-- Menu Body -->
       
        <!-- Menu Footer-->
        <li class="user-footer">
          <div class="">
            <a href="profile.php" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Perfil</a>
          </div>
        </li>
      </ul>
    </li>
    <!-- Control Sidebar Toggle Button -->
    <li>
      <a href="sair.php"><i class="fa fa-sign-out"></i> Sair</a>
    </li>
  </ul>
</div>