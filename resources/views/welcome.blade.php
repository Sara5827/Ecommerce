<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="colortext">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="colortext">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="colortext">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
             
        </div>
    </body>
    <style>
        #bkg{
            background-image: url("https://mir-s3-cdn-cf.behance.net/project_modules/fs/5a6ae3101408069.5f1e8000f0b48.gif"); 
            height: 900px;
            background-repeat: no-repeat;
            margin: 0 auto;
        }
        #Visite{
            margin: 0 auto;
            margin-left: 400px;
            margin-top: 400px;
        }
      
        .colortext{
            color: gray!important;
            font-family: 'Times New Roman', Times, serif;
           
        }
      
        .testvvv{
            background-color:#F4F4F4;
        }
     </style>
    <div class="testvvv">
        <div class="d-flex align-items-center" id="bkg">
            <div class="links">
                <a href="{{ route('products.index') }}" > <h1 id="Visite" class="colortext"> <i class="fa fa-grin-hearts"></i> vous etes les bienvenue, Visiter la boutique! </h1></a>
            </div>
        </div>

       
    </div>
</html>
