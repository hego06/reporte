<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            #scroll{
                overflow: scroll;
                height: 400px;
            }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                display: none;
                background: url('Preloader_3.gif') center no-repeat #fff;
            }
        </style>
    </head>
    <body>
        <div class="se-pre-con"></div>
        <div class="container">
            <div class="row">
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
    <script>
        $('.ver').click(function() 
        {
            $('#contenido embed').attr('src', $(this).data('name'));
        });

        $('.imprimir').click(function() 
        {
            $('.se-pre-con').show();
        });
    </script>
</html>