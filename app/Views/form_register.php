<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="icon" href="<?= base_url() ?>/images/Millennium_logo.png">
    <title>Reservasi Ruang</title>
</head>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<body>

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
    
<main>

    <div class="container col-12 p-5 my-3 shadow bg-light">
    <div class="col-md-10 mx-auto col-lg-8">

        <?php if (!empty(session()->getFlashdata('error'))) : ?>
          <div class="alert alert-danger alert-dismissible fade show container text-center" role="alert">
              <h5>Periksa Entrian Form</h5>
              </hr />
              <?php echo session()->getFlashdata('error'); ?>
          </div>
        <?php endif; ?>

        <h3 class="mb-4 border-bottom text-center">Buat reservasi baru</h3>
        <form action="<?= base_url(); ?>/register/process" method="post" class="row g-3">
            <?= csrf_field(); ?>
            <div class="col-12">
              <label for="no_ruang" class="form-label">Ruangan</label>
              <select name="no_ruang" class="form-select" id="no_ruang">
                <option value="1">Ruang Utama (1)</option>
              </select>
            </div>
            <div class="col-12">
              <label for="tanggal" class="form-label">Tanggal</label>
              <!-- Date Picker -->
              <input name="tanggal" type="date" class="form-control datepicker" id="tanggal">
              <script>
                
              </script>
            </div>
            <div class="col-md-6">
              <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
              <!-- Time Picker -->
              <input name="waktu_mulai" type="time" class="form-control timepicker" id="waktu_mulai">
            </div>
            <div class="col-md-6">
              <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
              <!-- Time Picker -->
              <input name="waktu_selesai" type="time" class="form-control timepicker" id="waktu_selesai">
            </div>
            <!-- timepicker script -->
            <script>
                flatpickr(".timepicker", {
                  enableTime: true,
                  noCalendar: true,
                  dateFormat: "H:i",
                  time_24hr: true,
                  minTime: "08:00",
                  maxTime: "17:00",
                  minuteIncrement: 5
                });
            </script>
            
            <div class="col-12 mb-2">
              <button name="register" id="register" type="submit" class="btn w-100 btn-primary">Register</button>
            </div>
        </form>
        <hr class="my-2">


    </div>
    </div>
  
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>