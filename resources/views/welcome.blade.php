<!DOCTYPE html>
<html lang="en">
    <head> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">       
        <script src="https://kit.fontawesome.com/0aba8936a3.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="/css/welcome.css"> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('js/app.js')}}" defer> </script>     
        <meta charset="utf-8">
        <title>Это CRUD!</title>             
    </head>

    <body>
        <div id="app">             
            <employees-component>
            </employees-component>
        </div>              
    </body>
</html>