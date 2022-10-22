<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Barang</title>
    <!-- load bootstrap css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  </head>
  <body>
  <style type="text/css">

          #maincontent{
            width: auto;
            float: none;
          }
          #sidebar{
            width: auto;
            float: none;
          }
  </style>
  <div class="container">
      <h1><center>Checkout Barang</center></h1>
        
        <form action="<?php echo site_url('objek/save_transaksi');?>" method="post">
        <input class="form-control" type="text" name="kode" placeholder="edit kode" aria-label="kode barang" value="<?php echo $kode;?>" ><br>
        <input class="form-control" type="text" name="nama" placeholder="edit nama" aria-label="nama barang" value="<?php echo $nama;?>" ><br>
        <input class="form-control" type="text" name="harga" placeholder="edit harga" aria-label="harga barang" value="<?php echo $harga;?>" ><br>
        <input class="form-control" type="text" name="jumlah" placeholder="edit jumlah" aria-label="jumlah barang" value="<?php echo $jumlah;?>" ><br>
        <input class="form-control" type="text" name="kondisi" placeholder="edit kondisi" aria-label="kondisi barang" value="<?php echo $kondisi;?>" ><br>
        <input class="form-control" type="text" name="jumlah_checkout" placeholder="checkout berapa?" aria-label="jumlah Checkout"><br>
          
        <input type="hidden" name="id" value="<?php echo $id?>">
        
        <button type="submit" class="btn btn-primary">Checkout</button>
        </form>

        <form>
          
        </form>
     
    </div>
   </body>
</html>