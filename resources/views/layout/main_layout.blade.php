<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Southern Leyte (Covid-19 Vaccination Passport)</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css?v1.0') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
</head>
<body>
    
    @yield('content')


    <div class="container mt-5 pt-3">
        <p class="text-center text-gray text-muted text-dev">Developed by: SLSU-CCSIT Developer Team</p>
    </div>

    <div class="container mt-5 pb-3">
        <p class="text-center text-gray text-muted text-footer"> <a href="" class="mr-2">Privacy Policy</a><a href="" class="mr-2 ml-2">Terms and Condition</a>
        <a href="" class="mr-2 ml-2">About</a><a href="" class="ml-2">Help</a> </p>
    </div>
</body>
</html>