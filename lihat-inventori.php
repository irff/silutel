<?php include "header.php" ?>

<?php mustLoggedIn(); ?>

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
    <p>Urut berdasarkan:
      <span class="sl-sort">
        <label class="radio-inline">
        <input type="radio" name="sort-type" id="inlineRadio1" value="option1" checked> Nama
        </label>
        <label class="radio-inline">
          <input type="radio" name="sort-type" id="inlineRadio2" value="option2"> Merk
        </label>
      </span>
      <span class="sl-sort">
        <label class="radio-inline">
        <input type="radio" name="asc-desc" id="inlineRadio1" value="option1" checked> Asc
        </label>
        <label class="radio-inline">
          <input type="radio" name="asc-desc" id="inlineRadio2" value="option2"> Desc
        </label>
      </span>
    </p>
    <table class="table table-hover">
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

    <nav class="sl-pagination">
      <ul class="pagination pagination-lg">
        <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>

  </div>
</div>


<?php include "footer.php" ?>
