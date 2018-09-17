<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">

    </head>
    <body>
        <div class="flex-center container">
            <form action="#" id="getRequest" class="form-signin">
                <div class="text-center mb-4">
                    <h2>Get weather form</h2>
                </div>
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                <div class="form-label-group form-margin">
                    <input class="form-control" type="text" id="key" placeholder="API key" required>
                </div>
                <div class="form-label-group">
                    <div class="input-group mb-3 form-margin">
                        <input id="town" class="form-control" placeholder="City" aria-label="City" aria-describedby="basic-addon2" required>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit"><i class="fas fa-check"></i></button>
                        </div>
                    </div>
                </div>
                {{--<input type="submit" class="btn btn-warning">--}}
            </form>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist"></div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {

//            $('#getRequest').on('submit', function (event) {
//                event.preventDefault();
//
//                var town = $('#town').val();
//                var key = $('#key').val();

//                $.post('getRequest', { town:town, key:key},function (data) {
//                    $('#getRequestData').append(data);
//                    console.log($('#getRequestData').append(function () {
//                        var $data = $(data);
//                        $data.find('li')
//                    }));
//                    //$('#nav-tabContent').append(data);
//                });
//
//                return false;
//            });



//            $('#getRequest').submit(function () {
//                var town = $('#town').val();
//                var key = $('#key').val();
//
//
//                $.post('getRequest', { town:town, key:key},function (data) {
//                    var $data = $(data);
//                    $('#getRequestData').append($data.hide('div'));
//                    console.log($data.find("li.nav-item").html());
//                    $('#nav-tabContent').append($("data:has(li)").hide());
//                });
//            });
            $('#getRequest').submit(function () {
                var town = $('#town').val();
                var key = $('#key').val();


                $.post('getRequest', { town:town, key:key},function (data) {
                    var $data = JSON.parse(data);
                    $('#nav-tab').append($data['a']).before('<a class="nav-item nav-link"');
                    $('#nav-tabContent').append($data['b']);
                    //$('#nav-tabContent').append($data.find('div'));
                    console.log($data)
                });
            });
        });
    </script>

    </body>
</html>
