<?php include "header.php" ?>

<?php mustLoggedIn(); ?>

<?php 
  if(!(isRoleEqual('LA') || isRoleEqual('MG'))) {
    $_SESSION['message'] = "Fitur ini hanya bisa diakses oleh STAF LAUNDRY atau MANAGER";
    header('Location: notif.php');
  }
?>

<?php

  $query = 'SELECT * 
            FROM SILUTEL.LAUNDRY_INVENTORI;';

  $result = pg_query_params($db_con, $query, array()) or die("Cannot execute query: $query\n");

?>

<div class="container">
  <div class="page-header">
    <div class="row">
      <div class="col-md-12">
        <h1>LIHAT LAUNDRY</h1>
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
          <th>Staf</th>
          <th>Waktu</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th>Total</th>
          <th>Tanggal Ambil</th>
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
          <td><?=$result_row[3]?></td>
          <td><?=$result_row[4]?></td>
          <td><?=$result_row[5]?></td>
          <td><?=intval($result_row[4])*intval($result_row[5])?></td>
          <td><?=$result_row[6]?></td>
        </tr>

<?php endwhile; ?>
      </tbody>
    </table>

  </div>
</div>

<script src="js/silutel.datatables.js"></script>

<?php include "footer.php" ?>
