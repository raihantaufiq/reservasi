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
<body>
    
<main>
    
    <div class="container p-5">
        <div class="col-md-10 mx-auto col-lg-5">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show container text-center" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url(); ?>/login/process" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
                <?= csrf_field(); ?>
                <h3 class="text-center">Login</h3>
                <p class="text-center">Gunakan akun anda untuk masuk</p>
                <div class="form-floating mb-3">
                    <input required name="id_user" id="id_user" type="id_user" class="form-control" placeholder="id_user">
                    <label for="id_user">ID user </label>
                </div>
                <div class="form-floating mb-3">
                    <input required name="password" id="password" type="password" class="form-control" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <button name="login" id="login" class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                <hr class="my-4">
                <small class="text-muted">Belum punya akun? <a href="<?= base_url();?>/register/index">klik disini</a> untuk buat akun baru</small>
            </form>
        </div>
    </div>
  
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>