<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body class="mt-4">
    <div class="container">
      <div class="card">
        <div class="d-flex justify-content-center">
          <h1><strong>Nota Transaksi</strong></h1>
        </div>
        <div class="card-body">
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
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>

<script>
  window.print();
</script>