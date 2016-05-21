<?php include "header.php" ?>

<div class="container">
  <div class="page-header">
    <div class="row">
      <div class="col-md-12">
        <h1>BELI INVENTORI</h1>
      </div>
    </div>    
  </div>
  <div class="row">
    <div class="col-md-6">
      <form>
        <div class="form-group">
          <label for="nonota">Nomor Nota</label>
          <input type="text" class="form-control" id="nonota" placeholder="Nomor Nota">
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" placeholder="Nama">
        </div>
        <div class="form-group">
          <label for="merk">Merk</label>
          <input type="text" class="form-control" id="merk" placeholder="Merk">
        </div>
        <div class="form-group">
          <label for="jumlah">Jumlah</label>
          <input type="text" class="form-control" id="jumlah" placeholder="Jumlah">
        </div>
        <div class="form-group">
          <label for="harga">Harga Satuan</label>
          <input type="text" class="form-control" id="harga" placeholder="Harga Satuan">
        </div>
        <button type="submit" class="btn btn-default">Lakukan Pembelian</button>
      </form>
    </div>
  </div>
</div>


<?php include "footer.php" ?>
