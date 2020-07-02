<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
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
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
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
<h3>nik:8989 pass:admin</h3>
<form action="{{ url('restaurant/auth') }}" method="POST">
@csrf
@if (session('errors'))
    <div class="alert alert-danger">
        {{ session('errors') }}
    </div>
@endif
    <div class="flex-center position-ref full-height">
           
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">Login</h5>
                                
                                    <div class="form-label-group">
                                        <input type="text" name="nik" id="inputEmail" class="form-control" placeholder="NIK"
                                            required autofocus>
                                        <label for="inputEmail">NIK</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" name="password" id="inputPassword" class="form-control"
                                            placeholder="Password" required>
                                        <label for="inputPassword">Password</label>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                        type="submit">Login</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="content">
            <div class="title m-b-md">
                <a href="{{ url('restaurant/orders/create') }}" class="btn btn-sm btn-primary">Click Here</a>
            </div>
        </div>
    </div>
    
    </form>
</body>

</html>
