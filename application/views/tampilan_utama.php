<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/font/glyphicons-halflings-regular.ttf">

  </head>
  <body style="background-image:url(https://images4.alphacoders.com/607/607866.png);color:white;"  >
  
  
  
  

  
    <div class="container" >
    

    
      
      
    </div>

    <div class="container" style="text-align: center;">
 
      <div class="search-form__icon" width="32" height="32" viewbox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
        

      <div class="col-md-12" class="circle-loader">
      
      
      <form action="<?=base_url()?>index.php/home/index" method="get">
        <input type="text" name="cari" class="form-control"  placeholder="Cari gambar">
        <input type="submit" value="Cari" class=" form-control btn btn-success">
      </form>
      <hr>
    </div>
  </div>
  <br>


      <div class="row">

        <?php foreach ($data as $data): ?>
          <div class="col-sm-6 col-md-3">

            <a href="#" class="thumbnail">
              <img src="<?=base_url()?>assets/picture/<?=$data->foto?>" style="max-width:100%; max-height:100%; height:180px" alt="foto">
            </a>
            <div class="caption">
              <h3><?php echo $data->name?></h3>
              <p> <?php echo $data->alamat ?></p>
              <p>
                <a href="<?=base_url()?>index.php/home/edit/<?=$data->id?>" class="btn btn-warning" role="button">Edit</a>
                <a href="<?=base_url()?>index.php/home/deletedata/<?=$data->id?>/<?=$data->foto?>" class="btn btn-danger" role="button">Hapus</a>
              </p>
            </div>
          </div>
        <?php endforeach; ?>


      </div>
    </div>
    <div class="container">
      <?php echo $pagination ?>
    </div>

    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
