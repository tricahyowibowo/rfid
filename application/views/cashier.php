<div class="col-md-8">
  <div class="card mb-4">
    <div class="card-body">
    <form action="cashier" method="get">
      <div class="col-md-6">
        <label for="fname">No Keranjang:</label>
        <div class="input-group mb-3">
          <input class="form-control" type="text" id="no_keranjang" name="no_keranjang">
          <button class="btn btn-md btn-outline-info" type="submit" id="button-addon2">Search</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  
<?php if (!empty($keranjang)){?>
<div class="card">
<div class="card-body">
<div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Keranjang</th>
        <th>Nama_Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $no = 0;
    $total = 0;
    $no_keranjang = '';
    foreach ($keranjang as $data) {
      $no++;
      $total=$total+$data->Harga;
      $no_keranjang = $data->no_keranjang;
    ?>
      <tr>
        <td><?=$data->no_keranjang;?></td>
        <td><?=$data->Nama_Barang;?></td>
        <td><?=$data->Jumlah;?></td>
        <td><?=$data->Harga;?></td>
      </tr>	
    <?php
    }
    ?>							
    </tbody>
    <tfoot>
      <tr>
        <td colspan=2></td>
        <td class="text-end"> Total:</td>
        <td><?=$total?></td>
      </tr>
    </tfoot>
  </table>
</div>
<div class="d-flex justify-content-end">
  <a href="print?no_keranjang=<?=$no_keranjang?>" target="_blank" class="btn btn-md btn-success">Cetak Pembayaran</a>
</div>
</div>
</div>
<?php } ?>

</div>