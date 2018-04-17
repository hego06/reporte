<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    @if (Session::has('menssage'))
                        <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
                            <strong>OK! </strong>{{ Session::get('menssage') }}
                        </div>
                    @endif
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
    </script>
</html>