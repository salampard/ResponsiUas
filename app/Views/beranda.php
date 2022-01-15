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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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
    <link href="" rel="stylesheet">
</head>

<body>
    <div class="d-flex my-3 w-100">

        <h6 class="d-block ms-auto">Terimakasih Atas Partisipasinya dalam Vaksinasi</h6>

        <a href="<?= base_url('vaksin/keluar'); ?>" type="button" class="btn btn-dark my-3 ms-auto me-5">Log out</a>

    </div>
    <div class="container">


        <div class="row">
            <div class="col-6 position-relative">
                <?php if (session()->getFlashdata('gagalHapus')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('gagalHapus'); ?>
                    </div>
                <?php endif; ?>
                <div class="card position-absolute top-50 start-50 translate-middle" style="width: 18rem;">
                    <img src="../assets/gambar/<?= $vaksin['fp']; ?>" class="card-img-top" alt="...">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">M Miftahus Salam</li>
                        <li class="list-group-item">Teknik Informatika</li>
                        <li class="list-group-item">1800018214</li>
                    </ul>
                    <div class="card-body">
                        <a type="button" class="card-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit Profile</a>
                        <a href="<?= base_url('vaksin/delete'); ?>" class="card-link">Delete Profile Pic</a>
                    </div>
                </div>
            </div>

            <div class="col-6">

                <div class="row" style="width: 90%;">

                    <div class="position-relative p-2" id="capture">
                        <div class="bg-info" style="width: 65vh; height:40vh;">

                        </div>

                        <button onclick="yoi()" type="button" class="btn btn-outline-secondary position-absolute top-50 start-100 translate-middle w-auto h-auto">
                            <i class="bi bi-download" style="pointer-events: none;"></i>
                        </button>
                    </div>

                </div>

                <div class="row" style="width: 90%;">

                    <div class="position-relative p-2" id="capture">
                        <div class="bg-info" style="width: 65vh; height:40vh;">

                        </div>

                        <button onclick="yoi()" type="button" class="btn btn-outline-secondary position-absolute top-50 start-100 translate-middle w-auto h-auto">
                            <i class="bi bi-download" style="pointer-events: none;"></i>
                        </button>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('vaksin/save'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Input New Profile</label>
                            <input class="form-control" type="file" id="fileProfile" name="fileProfile" required>
                        </div>

                        <label for="formNIM" class="form-label">No HP</label>
                        <input class="form-control" type="text" placeholder="<?= $vaksin['nim']; ?>" aria-label="default input example" id="formNIM" name="nomorHP" required>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function yoi() {
            html2canvas(document.getElementById("capture")).then(function(canvas) {
                var anchorTag = document.createElement("a");
                document.body.appendChild(anchorTag);
                anchorTag.download = "filename.jpg";
                anchorTag.href = canvas.toDataURL();
                anchorTag.target = '_blank';
                anchorTag.click();
            });
        };
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/dist/html2canvas.min.js"></script>

</body>



</html>