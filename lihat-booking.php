<?php include "header.php" ?>

<?php mustLoggedIn(); ?>

<?php

  $query = 'SELECT * 
            FROM SILUTEL.INVOICE;';

  $result = pg_query_params($db_con, $query, array()) or die("Cannot execute query: $query\n");
?>

<div class="container">
  <div class="page-header">
    <div class="row">
      <div class="col-md-12">
        <h1>LIHAT BOOKING</h1>
      </div>
    </div>    
  </div>

  <div class="col-md-12">
    <table class="table table-hover" id="main-table">
      <thead>
        <tr>
          <th>Invoice</th>
          <th>Tanggal Datang</th>
          <th>Tanggal Pergi</th>
          <th>Jumlah</th>
          <th>Discount</th>
          <th>Total</th>
          <th>Nama Tamu</th>
        </tr>
      </thead>
      <tbody>
<?php

  while($result_row = pg_fetch_row($result)):
  
    $tamu_query = 'SELECT Nama
                   FROM SILUTEL.TAMU
                   WHERE Id = $1';
    
    $id_tamu = $result_row[4];

    $tamu_result = pg_query_params($db_con, $tamu_query, array($id_tamu)) or die("Cannot execute query: $query\n");

    $tamu_result_row = pg_fetch_row($tamu_result);
  ?>
        <tr>
          <td><?=$result_row[0]?></td>
          <td><?=$result_row[1]?></td>
          <td><?=$result_row[2]?></td>
          <td><?=$result_row[3]?></td>
          <td><?=$result_row[5]?></td>
          <td><?=$result_row[6]?></td>
          <td><?=$tamu_result_row[0]?></td>
        </tr>
  <?php
  endwhile;

?>
      </tbody>
    </table>

  </div>
</div>

<script src="js/silutel.datatables.js"></script>

<?php include "footer.php" ?>
