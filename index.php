<?php

$key_api = "8eedc7ec90bc0cc93698a87d19c59fd7";
$citySearch = null;
$namecity = array("Orlando", "Miami", "New York City");

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
            <form action="" class="d-flex" role="search" method="post">
                <label for="citySearch"></label>
                <input class="form-control me-2" type="text" name="citySearch" value="" placeholder="Buscar Cuidad o Pais" aria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="button">Buscar</button>&nbsp;
            </form>
        </div>
    </nav>

</head>

<body>
    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex p-3 justify-content-center">
        <div class="col">
            <div class="card h-80">

                <?php

                $resultCitySearch = "bogota";

                if (isset($_POST["citySearch"])) :
                    $resultCitySearch = $_POST["citySearch"];
                endif;

                $owApiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . $resultCitySearch . "&appid=" . $key_api;



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

                    if (isset($resultCitySearch)) {

                        $url = "http://api.openweathermap.org/geo/1.0/direct?q=" . $resultCitySearch . "&limit=2&appid=" . $key_api;
                        $json = file_get_contents($url);
                        $datos = json_decode($json, true);

                        $nameCity = $datos[0]["name"];
                        $latitudeCity = $datos[0]["lat"];
                        $longitudeCity = $datos[0]["lon"];

                        $name2 = $datos[1]["name"];
                        $lat2 = $datos[1]["lat"];
                        $lon2 = $datos[1]["lon"];
                    }
                    ?>

                    <?= "<h2 class=card-title>Ciudad : {$nameCity}</h2>" ?>
                    <?= "<p class=card-text>Latitud : {$latitudeCity}</p>" ?>
                    <?= "<p class=card-text>Longitud : {$longitudeCity}</p>" ?>

                    <?= "<h2 class=card-title>Ciudad : {$name2}</h2>" ?>
                    <?= "<p class=card-text>Latitud : {$lat2}</p>" ?>
                    <?= "<p class=card-text>Longitud : {$lon2}</p>" ?>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-80">

                <div class="card-body">
                    <!-- <img src="http://openweathermap.org/img/w/<?php echo $datos->weather[0]->icon; ?>.png" class="rounded mx-auto d-block" alt="100" width="100" height="100"> -->

                    <?php
                    if (isset($resultCitySearch)) {
                        $url = "http://api.openweathermap.org/geo/1.0/direct?q=" . $namecity[0] . "&limit=2&appid=" . $key_api;

                        $json = file_get_contents($url);
                        $datos = json_decode($json, true);

                        $nameCity = $datos[0]["name"];
                        $latitudeCity = $datos[0]["lat"];
                        $longitudeCity = $datos[0]["lon"];


                        $url2 = "https://api.openweathermap.org/data/2.5/weather?q=" . $namecity[0] . "&appid=" . $key_api;

                        $json2 = file_get_contents($url2);
                        $datos2 = json_decode($json2, true);

                        $name = $datos2["name"];
                        $temp = $datos2["main"]["temp"];
                        $temp_min = $datos2["main"]["temp_min"];
                        $temp_max = $datos2["main"]["temp_max"];
                        $humidity = $datos2["main"]["humidity"];
                    }
                    ?>

                    <?= "<h2 class=card-title>Ciudad : {$nameCity}</h2>" ?>
                    <?= "<p class=card-text>Latitud : {$latitudeCity}</p>" ?>
                    <?= "<p class=card-text>Longitud : {$longitudeCity}</p>" ?>

                    <?= "<h3 class=card-title>Ciudad : {$name}</h3>" ?>
                    <?= "<p class=card-title>Temperatura : {$temp}</p>" ?>
                    <?= "<p class=card-title>Temp min : {$temp_min}</p>" ?>
                    <?= "<p class=card-title>Temp max : {$temp_max}</p>" ?>
                    <?= "<h4 class=card-title>Humedad : {$humidity}</h4>" ?>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-80">
                <!-- <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="rounded mx-auto d-block" alt="100" width="100" height="100"> -->
                <div class="card-body">

                    <?php
                    if (isset($resultCitySearch)) {
                        $url = "http://api.openweathermap.org/geo/1.0/direct?q=" . $namecity[1] . "&limit=2&appid=" . $key_api;

                        $json = file_get_contents($url);
                        $datos = json_decode($json, true);

                        $nameCity = $datos[0]["name"];
                        $latitudeCity = $datos[0]["lat"];
                        $longitudeCity = $datos[0]["lon"];


                        $url2 = "https://api.openweathermap.org/data/2.5/weather?q=" . $namecity[1] . "&appid=" . $key_api;

                        $json2 = file_get_contents($url2);
                        $datos2 = json_decode($json2, true);

                        $name = $datos2["name"];
                        $temp = $datos2["main"]["temp"];
                        $temp_min = $datos2["main"]["temp_min"];
                        $temp_max = $datos2["main"]["temp_max"];
                        $humidity = $datos2["main"]["humidity"];
                    }
                    ?>

                    <?= "<h2 class=card-title>Ciudad : {$nameCity}</h2>" ?>
                    <?= "<p class=card-text>Latitud : {$latitudeCity}</p>" ?>
                    <?= "<p class=card-text>Longitud : {$longitudeCity}</p>" ?>

                    <?= "<h3 class=card-title>Ciudad : {$name}</h3>" ?>
                    <?= "<p class=card-title>Temperatura : {$temp}</p>" ?>
                    <?= "<p class=card-title>Temp min : {$temp_min}</p>" ?>
                    <?= "<p class=card-title>Temp max : {$temp_max}</p>" ?>
                    <?= "<h4 class=card-title>Humedad : {$humidity}</h4>" ?>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-80">
                <!-- <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="rounded mx-auto d-block" alt="100" width="100" height="100"> -->
                <div class="card-body">

                    <?php
                    if (isset($resultCitySearch)) {
                        $url = "http://api.openweathermap.org/geo/1.0/direct?q=" . $namecity[2] . "&limit=2&appid=" . $key_api;

                        $json = file_get_contents($url);
                        $datos = json_decode($json, true);

                        $nameCity = $datos[0]["name"];
                        $latitudeCity = $datos[0]["lat"];
                        $longitudeCity = $datos[0]["lon"];


                        $url2 = "https://api.openweathermap.org/data/2.5/weather?q=" . $namecity[2] . "&appid=" . $key_api;

                        $json2 = file_get_contents($url2);
                        $datos2 = json_decode($json2, true);

                        $name = $datos2["name"];
                        $temp = $datos2["main"]["temp"];
                        $temp_min = $datos2["main"]["temp_min"];
                        $temp_max = $datos2["main"]["temp_max"];
                        $humidity = $datos2["main"]["humidity"];
                    }
                    ?>

                    <?= "<h2 class=card-title>Ciudad : {$nameCity}</h2>" ?>
                    <?= "<p class=card-text>Latitud : {$latitudeCity}</p>" ?>
                    <?= "<p class=card-text>Longitud : {$longitudeCity}</p>" ?>

                    <?= "<h3 class=card-title>Ciudad : {$name}</h3>" ?>
                    <?= "<p class=card-title>Temperatura : {$temp}</p>" ?>
                    <?= "<p class=card-title>Temp min : {$temp_min}</p>" ?>
                    <?= "<p class=card-title>Temp max : {$temp_max}</p>" ?>
                    <?= "<h4 class=card-title>Humedad : {$humidity}</h4>" ?>

                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex p-3 justify-content-center">
        <div class="col">
            <div class="card h-80">
                <div class="card-body">
                    <div id="openweathermap-widget-15"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
        window.myWidgetParam.push({
            id: 15,
            cityid: '3530597',
            appid: '8eedc7ec90bc0cc93698a87d19c59fd7',
            units: 'metric',
            containerid: 'openweathermap-widget-15',
        });
        (function() {
            var script = document.createElement('script');
            script.async = true;
            script.charset = "utf-8";
            script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(script, s);
        })();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</body>

</html>