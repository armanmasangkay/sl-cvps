<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 403 | Invalid access</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css?v1.0') }}">
</head>
<body>
    <div class="container-fluid px-0">
        <div class="container bg-white pt-4 pb-4 mt-4 __error">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-sm-8 offset-sm-2 image">
                    <div class="">
                        <center>
                            <img src="{{ asset('images/error/403.jpg') }}" alt="Error 403">
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-1">
            <div class="row">
                <div class="col-md-8 offset-md-2 pl-5 pr-5">
                    <center>
                        <button class="btn btn-primary mt-4"><i data-feather="chevron-left" class="pt-1 pb-1" style="margin-bottom: 2px;"></i> Return Back&nbsp;</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    @include('templates.collaboration')
</body>
</html>