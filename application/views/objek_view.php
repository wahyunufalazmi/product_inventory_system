<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <!-- load bootstrap css file (v5.2)-->
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
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="<?= base_url('search/index') ?>" method="get">
        <input class="form-control me-2" type="search" placeholder="Cari nama barang..." aria-label="Search" name="keyword">
        <button class="btn btn-secondary" type="submit">Search</button>
      </form>
     &nbsp;&nbsp;&nbsp;
      <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Sidebar</button>
      &nbsp;&nbsp;&nbsp;
      
    </div>
  </div>
</nav>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">this is sidebar</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>item 1</p><hr>
    <p>item 2</p><hr>
  </div>
</div>  
    
    <div class="container">
      <?php
        $status_login = $this->session->userdata('status'); 
        if ($status_login != "logged") {
          redirect(base_url("login"));
        }
      ?>
      <center><h1>Selamat Datang <?php echo $this->session->userdata('identity'); ?></h1></center>


    <?php if(empty($keyword)){ ?>
      
      <div style="border: 1px solid rgb(204, 204, 204); padding: 5px; overflow: auto; width: 100%; height: 100%;background-color: rgb(255, 255, 255);">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Merek</th>
            <th scope="col">Harga Komputer</th>
            <th scope="col">Jumlah Tersedia</th>
            <th scope="col">Kondisi Barang</th>
            <th width="200">Edit Barang</th>
            <th width="200">Hapus Barang</th>
            <th width="200">Checkout Barang</th>
          </tr>
        </thead>
        <?php
          $count = 0;
          foreach ($data->result() as $row) :
            $count++;
        ?>
          <tr>
            <th scope="row"><?php echo $count;?></th>
            <td><?php echo $row->kode;?></td>
            <td><?php echo $row->nama;?></td>
            <td><?php echo number_format($row->harga);?></td>
            <?php if($row->jumlah != 0){ ?>
            <td><?php echo number_format($row->jumlah);?></td>
            <?php }
                  else { ?>
            <td><?php echo "barang habis";?></td>
            <?php } ?>
            <td><?php echo $row->kondisi;?></td>
            <td onclick="javascript : return confirm('Are you sure to edit this data ?')">
            <a href="<?php echo site_url('objek/get_edit/'.$row->id);?>" class="btn btn-sm btn-success">Update</a>
            </td>
            <td onclick="javascript : return confirm('Are you sure to delete this data ?')">
                <a href="<?php echo site_url('objek/delete/'.$row->id);?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
            <?php if($row->jumlah != 0){ ?>
            <td onclick="javascript : return confirm('Are you sure to checkout ?')">
              <a href="<?php echo site_url('objek/transaksi/'.$row->id);?>" class="btn btn-sm btn-outline-success">Checkout</a>
            </td>
            <?php }
                  else { ?>
            <td><?php echo "barang habis";?></td>
            </td>
            <?php } ?>
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>
      </div><br>

      <div class="row">
          <div class="col">
              <!--Tampilkan pagination-->
              <?php echo $pagination; ?>
          </div>
      </div>

    <?php }  else{ ?>

      <p style="color:orange"><b>Menampilkan data dengan kata kunci : "<?= $keyword; ?>"</b></p>

      <table class="table">
        <thead>
          <tr>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Merek</th>
                <th scope="col">Harga Komputer</th>
                <th scope="col">Jumlah Tersedia</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Kondisi Barang</th>
                <th width="200">Edit Barang</th>
                <th width="200">Hapus Barang</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data->result() as $row) { ?>
          <tr>
            <td><?php echo $row->kode;?></td>
            <td><?php echo $row->nama;?></td>
            <td><?php echo number_format($row->harga);?></td>
            <td><?php echo number_format($row->jumlah);?></td>
            <td><?php echo number_format(($row->harga)*($row->jumlah));?></td>
            <td><?php echo $row->kondisi;?></td>
            <td onclick="javascript : return confirm('Are you sure to edit this data ?')">
              <a href="<?php echo site_url('objek/get_edit/'.$row->id);?>" class="btn btn-sm btn-success">Update</a>
            </td>
            <td onclick="javascript : return confirm('Are you sure to delete this data ?')">
              <a href="<?php echo site_url('objek/delete/'.$row->id);?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
          <?php }?>
        </tbody>
      </table>

      

    <?php  } ?>
    <br>
    <center>
        <a class="btn btn-outline-info" href="<?= base_url('objek') ?>" role="button">Tampilkan Semua Barang</a>&nbsp;
        <a class="btn btn-info" href="<?= base_url('objek/add_new') ?>" role="button">Tambah Barang</a>&nbsp;
        <a class="btn btn-dark" href="<?= base_url('login/logout') ?>" role="button">Log Out</a>

      </center>

  </div>
</body><br>