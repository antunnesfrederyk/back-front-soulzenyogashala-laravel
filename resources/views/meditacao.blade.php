<html lang="en" data-xadprotection="true">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Soul Zen Yoga Shala - Login</title>
    <!-- Custom fonts for this template-->
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="https://adminsoulzenyoga1.websiteseguro.com//css/sb-admin-2.min.css " rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function() {
            $("button").on("click", function() {
                document.querySelector("button").innerHTML = '<i class="fas fa-spa"></i>';
                document.querySelector("#p").innerHTML = 'Meditação em andamento...';
                document.querySelector("button").disabled = true;
                document.getElementById('player_html5').play();
            })
        });
    </script>
</head>

<body style="background-color: #2096f3">

<div class="container pt-1">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-12 p-5" align="center">
                            <h1>Meditação</h1>
                            <h5 class="text-primary mb-0">
                                @switch($url->categoria)
                                    @case("0.0")
                                    Triste
                                    @break
                                    @case("2.5")
                                    Ansioso
                                    @break
                                    @case("5.0")
                                    Irritado
                                    @break
                                    @case("7.5")
                                    Sentimental
                                    @break
                                    @case("10.0")
                                    Animado
                                    @break
                                @endswitch</h5>
                            <p style="font-variant-caps: all-small-caps" class="text-primary">
                                {{$url->nome}}
                            </p>
                            <p id="p">Clique para iniciar</p>
                            <br>
                            <audio id="player_html5" src="{{asset($url->audio)}}">Seu navegador não tem suporte a HTML5</audio>
                            <button class="btn btn-info btn-lg btn-circle" style="height: 100px; width: 100px" onclick="document.getElementById('player_html5').play();"><i class="fa fa-play"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
