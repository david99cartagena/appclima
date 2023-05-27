<?php

$key_api = "8eedc7ec90bc0cc93698a87d19c59fd7";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clima App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand">Clima App</a>
            <form action="" class="d-flex" role="search" method="get">
                <label for="direccion"></label>
                <input class="form-control me-2" type="text" name="direccion" value="" placeholder="Buscar Cuidad o Pais" aria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="button">Buscar</button>&nbsp;
                <button type="button" class="btn btn-outline-secondary">Agregar</button>
            </form>
        </div>
    </nav>
</head>

<body>

    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex p-3 justify-content-center">
        <div class="col">
            <div class="card h-80">

                <?php

                $cityname = $_GET['direccion'];
                $owApiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . $cityname . "&appid=" . $key_api;

                /* Curl connection */
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $owApiUrl);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);

                /* Decode and check cod */
                $data = json_decode($response);
                if ($data->cod != 200) exit("An error has occurred: " . $data->message);

                ?>

                <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="rounded mx-auto d-block" alt="100" width="100" height="100">

                <div class="card-body">

                    <?php
                    if (isset($cityname)) {

                        $url = "http://api.openweathermap.org/geo/1.0/direct?q=" . $cityname . "&limit=2&appid=" . $key_api;
                        $json = file_get_contents($url);
                        $datos = json_decode($json, true);

                        $name1 = $datos[0]["name"];
                        $lat1 = $datos[0]["lat"];
                        $lon1 = $datos[0]["lon"];

                        $name2 = $datos[1]["name"];
                        $lat2 = $datos[1]["lat"];
                        $lon2 = $datos[1]["lon"];

                    }
                    ?>

                    <?= "<h2 class=card-title>Nombre : {$name1}</h2>" ?>
                    <?= "<p class=card-text>Latitud : {$lat1}</p>" ?>
                    <?= "<p class=card-text>Longitud : {$lon1}</p>" ?>

                    <?= "<h2 class=card-title>Nombre : {$name2}</h2>" ?>
                    <?= "<p class=card-text>Latitud : {$lat2}</p>" ?>
                    <?= "<p class=card-text>Longitud : {$lon2}</p>" ?>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-80">
                <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="rounded mx-auto d-block" alt="100" width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-80">
                <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="rounded mx-auto d-block" alt="100" width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>

        <!-- <div class="col">
            <div class="card h-100">
                <img src="ima1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="ima1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="ima1.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div> -->

    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex p-3 justify-content-center">
        <div class="col">
            <div class="card h-80">
                <h3 class="card-title text-center">History</h3>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <!-- <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>