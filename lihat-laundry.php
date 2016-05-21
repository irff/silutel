<?php include "header.php" ?>

<div class="container">
  <div class="page-header">
    <div class="row">
      <div class="col-md-12">
        <h1>LIHAT LAUNDRY</h1>
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
          <th>Staf</th>
          <th>Waktu</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th>Total</th>
          <th>Tanggal Ambil</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Handuk</td>
          <td>Gucci</td>
          <td>Irfan</td>
          <td>05/30/2016 20:00</td>
          <td>10</td>
          <td>15.000</td>
          <td>150.000  </td>
          <td>06/01/2016 20:00</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Keset</td>
          <td>Gucci</td>
          <td>Irfan</td>
          <td>05/30/2016 20:00</td>
          <td>10</td>
          <td>15.000</td>
          <td>150.000  </td>
          <td>06/01/2016 20:00</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Selimut</td>
          <td>Polo</td>
          <td>Irfan</td>
          <td>05/30/2016 20:00</td>
          <td>10</td>
          <td>15.000</td>
          <td>150.000  </td>
          <td>06/01/2016 20:00</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Sprei</td>
          <td>Gucci</td>
          <td>Irfan</td>
          <td>05/30/2016 20:00</td>
          <td>10</td>
          <td>15.000</td>
          <td>150.000  </td>
          <td>06/01/2016 20:00</td>
        </tr>
        <tr>
          <td>5</td>
          <td>Tirai</td>
          <td>Gucci</td>
          <td>Ahmad</td>
          <td>05/30/2016 20:00</td>
          <td>10</td>
          <td>15.000</td>
          <td>150.000  </td>
          <td>06/01/2016 20:00</td>
        </tr>
        <tr>
          <td>6</td>
          <td>Taplak Meja</td>
          <td>Gucci</td>
          <td>Ahmad</td>
          <td>05/30/2016 20:00</td>
          <td>10</td>
          <td>15.000</td>
          <td>150.000  </td>
          <td>06/01/2016 20:00</td>
        </tr>
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
