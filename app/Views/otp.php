<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>

    <!--  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/"> -->



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="../assets/universal/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">

        <?= session()->get('kodeOTP') ?>

        <?php if (session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('gagal'); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?= base_url('vaksin/validating'); ?>">
            <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Input OTP Code</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="masukkan Kode OTP" name="inputOTP" required>
                <label for="floatingInput">Code OTP</label>
            </div>


            <button class="w-100 btn btn-lg btn-primary mt-5" type="submit">Proceed</button>
            <p>
                batas waktu <span id="waktu"></span><br>
                Tidak menerima sms kode otp? <a href="<?php echo base_url('index.php/welcome/kirimulang') ?>">kirim ulang</a><br>
                <a href="<?php echo base_url('index.php/welcome') ?>">Kembali Login</a>
            </p>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>



    <script>
        var minutesToAdd = 1;
        var currentDate = new Date();
        var countDownDate = new Date(currentDate.getTime() + minutesToAdd * 60000);

        var x = setInterval(function() {

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("waktu").innerHTML = minutes + ":" + seconds;

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("waktu").innerHTML = "00:00";
            }
        }, 1000);
    </script>
</body>

</html>