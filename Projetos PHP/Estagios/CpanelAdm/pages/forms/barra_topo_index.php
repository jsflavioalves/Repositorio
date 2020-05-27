<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
    <!-- Messages: style can be found in dropdown.less-->
    <li class="dropdown messages-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php 
          require('../conn.php');
         // mysqli_select_db('estagios');
          $emails=mysqli_query($conn,"SELECT*FROM emails ORDER BY id_emails DESC");
          $result=10;
    //      $result=mysqli_num_rows($emails);
        ?>
        <i class="fa fa-envelope-o"></i>
        <span class="label label-success"><?php echo $result; ?></span>
      </a>
      <ul class="dropdown-menu">
        <li class="header">VocÃª tem <?php echo $result; ?> email(s).</li>
        <li>
          <!-- inner menu: contains the actual data -->
          <ul class="menu">
            <?php 
           
            while ($emails_result=mysqli_fetch_array($emails,MYSQLI_NUM)) {
                $id_emails=$emails_result['id_emails'];
                $nome1=$emails_result['nome'];
                $email=$emails_result['email'];
                $data=$emails_result['data'];
                $hora=$emails_result['hora'];

                echo '<li>
                        <a href="https://novowebmail.ufc.br/rc/" target="_blank">
                          <div class="pull-left">
                            <img src="dist/img/email.png" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Novo Email de '.$nome1.'
                          </h4>
                          <p>'.$email.'</p>
                          <p>'.$data.' Ã s '.$hora.'</p>
                        </a>
                      </li>'; 
              }
            ?>
          </ul>
        </li>
        <li class="footer"><a href="#"></a></li>
      </ul>
    </li>
    <!-- Notifications: style can be found in dropdown.less -->
    <li class="dropdown notifications-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
       <?php 
          require('../conn.php');
         // mysqli_select_db('estagios');
          $notification=mysqli_query($conn,"SELECT*FROM declaracao");
          $resultado=mysqli_num_rows($notification);
        ?>
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning"><?php echo $resultado; ?></span>
      </a>
      </a>
      <ul class="dropdown-menu">
         <li class="header">VocÃª tem <?php echo $resultado; ?> notificaÃ§Ãµes</li>
        <li>
          <!-- inner menu: contains the actual data -->
          <ul class="menu">
	           <?php 
	              while ($notification_result=mysqli_fetch_array($notification)) {
	                $id_aluno=$notification_result['id_aluno'];
	                $id_termo=$notification_result['id_termo_compromisso'];
	                $id_declaracao=$notification_result['id_declaracao'];

	                $aluno=mysqli_query("SELECT*FROM alunos WHERE id_aluno LIKE '$id_aluno'");
	                $aluno_result=mysqli_fetch_array($aluno);
	                $nome_aluno=$aluno_result['nome'];
	                $curso_aluno=$aluno_result['curso'];

	                $termo=mysqli_query("SELECT*FROM termo_compromisso WHERE id_termo_compromisso LIKE '$id_termo'");
	                $termo_result=mysqli_fetch_array($termo);
	                $id_termo_compromisso1=$aluno_result['id_termo_compromisso1'];
	                $nome_empresa=$aluno_result['nome'];
	                $dt_inicio1=$aluno_result['dt_inicio'];

	                echo '<li style="position: relative;">
				              <form action="pages/forms/fazer_declaracao.php" method="POST">
				              <button style="background:transparent; position: absolute; width: 100%;height: 20px; margin: 0; border: none;" value="'.$id_termo.'" name="id_termo"></button>
				                <i class="fa fa-file-text"></i> O ALUNO(A) '.$nome_aluno. ' GEROU UM DECLARAÃ‡ÃƒO!</button>
					              <input type="hidden" value="'.$id_aluno.'" name="id_aluno">
					              <input type="hidden" value="'.$id_declaracao.'" name="id_declaracao">
				              </form>
				            </li>'; 
	              }
	            ?>
          </ul>
        </li>
        <li class="footer"><a href="#"></a></li>
      </ul>
    </li>
    <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="pages/forms/perfil/<?php echo $foto; ?>" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo $nome; ?></span>
      </a>
      <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
          <img src="pages/forms/perfil/<?php echo $foto; ?>" class="img-circle" alt="User Image">

          <p>
            <?php echo $nome; ?> - <?php echo $funcao; ?>
            <small>NUTEDS - UFC</small>
          </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
          <div class="row">
            <div class="col-xs-4 text-center">
              <a href="#"></a>
            </div>
            <div class="col-xs-4 text-center">
              <a href="#"></a>
            </div>
            <div class="col-xs-4 text-center">
              <a href="#"></a>
            </div>
          </div>
          <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <div class="pull-left">
            <a href="pages/forms/profile.php" class="btn btn-default btn-flat">Perfil</a>
          </div>
          <div class="pull-right">
            <a href="pages/forms/sair.php" class="btn btn-default btn-flat">Sair</a>
          </div>
        </li>
      </ul>
    </li>
    <!-- Control Sidebar Toggle Button -->
    <li>
      <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
    </li>
  </ul>
</div>