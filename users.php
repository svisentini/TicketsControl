<?php
include('verifica_login.php');
?>






<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
  <?php include('template-header.php'); ?>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        
      <?php include('template-menu.php'); ?>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     

      
      <h2>Users</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">

          <!-- Columns header --> 
          <thead>
            <tr>
              <th scope="col">Action</th>
              <th scope="col">Id</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
            </tr>
          </thead>

          <!-- DB data to table columns -->
          <tbody>
            
            <?php
              include 'conexao.php';
              $pdo = Banco::conectar_tickets();
              $sql = 'SELECT * FROM usuario ORDER BY usuario ASC';

              foreach($pdo->query($sql)as $row)
              {
                  echo '<tr>';
                  echo '<td width=270>';
                  echo '<a href="read.php?id='.$row['usuario_id'].'"><i class="icon-home icon-4x"></i></a>';
                  echo ' ';
                  echo '<a class="btn btn-warning" href="update.php?id='.$row['usuario_id'].'">Update</a>';
                  echo ' ';
                  echo '<a class="btn btn-danger" href="delete.php?id='.$row['usuario_id'].'">Delete</a>';
                  echo '</td>';
                  echo '<td>'. $row['usuario_id'] . '</td>';
                  echo '<td>'. $row['usuario'] . '</td>';
                  echo '<td>'. $row['senha'] . '</td>';
                  echo '</tr>';
              }
              Banco::desconectar();
            ?>

          </tbody>
        </table>
      </div>

      
    </main>
  </div>
</div>

<?php include('template-scripts.php'); ?>

</body>
</html>