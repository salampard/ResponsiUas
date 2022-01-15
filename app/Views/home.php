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

        /* .cardYok {
            display: none;
        } */
    </style>


    <!-- Custom styles for this template -->
    <link href="" rel="stylesheet">
</head>

<body>
    <div class="w-100 h-auto d-flex justify-content-between">

        <a href="<?= base_url('vaksin/masuk'); ?>" type="button" class="btn btn-dark my-3 ms-auto me-5 h-100">Log in</a>

    </div>

    <div id="heyhey" class="home d-flex flex-column text-center mt-3" style="height: 85vh;">
        <h4 class="d-block mb-auto" style="font-size: 5rem;">
            Ayo Vaksinasi!!!
        </h4>
        <div class="mt-auto">
            <ul class="d-flex justify-content-evenly p-0" style="list-style: none;">
                <li type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="every sunday on 1st week">Sinovac</li>
                <li type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="every sunday in 2nd week">AstraZeneca</li>
                <li type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="every sunday in 3rd week">Phizer</li>
                <li type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="every sunday in 4th week">Moderna</li>
            </ul>
        </div>
        <div class="mt-auto mb-3">
            Jaga Dirimu dan Keluargamu
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cari Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <input type="text" id="txt1" onkeyup="showHint(this.value)">
                    </div>
                    <div class="modal-body d-flex">
                        <?php foreach ($data as $dt) : ?>

                            <div class="card cardYok" style="width: 18rem;" id="<?= $dt['nim']; ?>">

                                <img src="..." class="card-img-top" alt="...">

                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">An item</li>
                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function showHint(str) {
            if (str == "18214") {
                if (!document.getElementById(str).style.display === "block") {
                    document.getElementById(str).style.display = "block";
                } else {
                    document.getElementById(str).style.display = "none";
                }

            }
            if (str == "18215") {
                if (!document.getElementById(str).style.display === "block") {
                    document.getElementById(str).style.display = "block";
                } else {
                    document.getElementById(str).style.display = "none";
                }

            }
            // const xhttp = new XMLHttpRequest();
            // xhttp.onload = function() {
            //     document.getElementById("txtHint").innerHTML =
            //         this.responseText;
            // }
            // xhttp.open("GET", "home.php?q=" + str);
            // xhttp.send();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>