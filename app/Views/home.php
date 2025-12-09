<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="<?= base_url() ?>/images/Millennium_logo.png">
    <title>Reservasi Ruang</title>
</head>

<nav class="p-2 bg-dark text-white sticky-top">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <?php
              if(session()->get('logged_in') == TRUE){
                ?>
                  <div class="text-end">
                    <a href="<?= base_url();?>/logout"><button type="button" class="btn btn-outline-danger">Logout</button></a>
                  </div>
                <?php
              }else{
                ?>
                  <div class="text-end">
                    <a href="<?= base_url();?>/login/index"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                  </div>
                <?php
              }
            ?>
        </div>
    </div>
</nav>

<body>
<main>
    <div class="container py-5 bg-light">
        <div class="row text-center">
          <div>
            <img src="<?= base_url();?>/images/profile_blank.jpg" alt="blank" class="rounded-circle" width="auto" height="140">
            <h3><?= $user['nama'] ?></h3>
            <p><?= $user['id_user'] ?></p>
            <a href="<?= base_url();?>/register/index"><button type="button" class="btn btn-outline-dark me-2">Atur Reservasi Pribadi</button></a>
          </div>
        </div>
    </div>
  </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>