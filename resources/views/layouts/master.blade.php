<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.2/css/bulma.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/app.css">

        <title>2017 Sui</title>
    </head>
    <body>
    
        
    
        <div id="app">
            @include('layouts.header')
            
            <section class="section">
                <div class="container">
                    <router-view></router-view>
                </div>
            </section>  
        </div>
        
        <script src="/js/app.js"></script>
        
        <script type="text/javascript">
            document.getElementById("nav-toggle").addEventListener ("click", toggleNav);
            function toggleNav() {
                    var nav = document.getElementById("nav-menu");
                    var className = nav.getAttribute("class");
                    if(className == "nav-right nav-menu") {
                        nav.className = "nav-right nav-menu is-active";
                    } else {
                        nav.className = "nav-right nav-menu";
                    }
            }
        </script>
    </body>
</html>
