<?php include "header.php" ?>

<?php mustLoggedIn(); ?>

<?php 
  if(!(isRoleEqual('IN') || isRoleEqual('MG'))) {
    $_SESSION['message'] = "Fitur ini hanya bisa diakses oleh STAF INVENTORI atau MANAGER";
    header('Location: notif.php');
  }
?>

<?php

  $query = 'SELECT * 
            FROM SILUTEL.INVENTORI;';

  $result = pg_query_params($db_con, $query, array()) or die("Cannot execute query: $query\n");
?>

<div class="container">
  <div class="page-header">
    <div class="row">
      <div class="col-md-12">
        <h1>LIHAT INVENTORI</h1>
      </div>
    </div>    
  </div>

  <div class="col-md-12">
    <table class="table table-hover" id="main-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Merk</th>
          <th>Stok</th>
        </tr>
      </thead>
      <tbody>
<?php
  $counter = 0;
  while($result_row = pg_fetch_row($result)):
    $counter++;
?>
        <tr>
          <td><?=$counter?></td>
          <td><?=$result_row[0]?></td>
          <td><?=$result_row[1]?></td>
          <td><?=$result_row[2]?></td>
        </tr>

<?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<script src="js/silutel.datatables.js"></script>

<?php include "footer.php" ?>
