<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
    <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="../dist/img/user2-160x160.jpg"" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo $nome_prof; ?></span>
      </a>
      <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
         <p>
            <?php echo $nome_prof; ?>
            <small><?php echo $lotacao; ?></small>
          </p>
        </li>
        <li class="user-footer">
          <div class="">
            <a href="profile.php" class="btn btn-default btn-flat" style="width: 100%;"><i class="fa fa-user"></i> Perfil</a>
          </div>
        </li>
      </ul>
    <li>
      <a href="../sair.php"><i class="fa fa-sign-out"></i> Sair</a>
    </li>
    </li>
    <!-- Control Sidebar Toggle Button -->
  </ul>
</div>