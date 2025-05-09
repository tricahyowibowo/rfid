<div class="container">
  <div class="card">
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr class="table100-head">
            <th class="column1">Keranjang</th>
            <th class="column2">Nama_Barang</th>
            <th class="column3">Harga</th>
            <th class="column4">Jumlah</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 0;
        foreach ($keranjang as $data) {
          $no++;
        ?>
          <tr>
            <td class="column1"><?=$data->no_keranjang;?></td>
            <td class="column2"><?=$data->Nama_Barang;?></td>
            <td class="column3"><?=$data->Harga;?></td>
            <td class="column4"><?=$data->Jumlah;?></td>
            
          </tr>	
        <?php
        }
        ?>							
        </tbody>
      </table>
    </div>
  </div>
</div>