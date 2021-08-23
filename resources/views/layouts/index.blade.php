<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="{{ asset('') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://valleyparty.vn/upload/company/favicon-15320605862.png" rel="shortcut icon" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="admin_asset/dist/css/jquery-confirm.min.css">
        <title>Valley Party Decor</title>
    </head>
<body>
 @include('layouts.header');
    @yield('slide')  
    <div class="container"> <!--content-->
        <div id="content" class="space-top-none">
            <div class="main-contain">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    @yield('content') <!--mau moi-->
                     @include('layouts.right')    <!--tintuc, fanpage-->
                </div>
            </div>
        </div>
    </div>
        <div class="space50">&nbsp;</div>
        <div class="space50">&nbsp;</div>
        @include('layouts.footer') <!--footer-->
        <div id="copyright" style="line-height: 30px;">
            <div class="container">
                <p class="pul-right">Privacy policy. (&copy;) 2021</p>
            </div>
        </div>
    </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="admin_asset/dist/js/jquery-confirm.min.js"></script>
<script src="js/script.js"></script>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#send').click(function(){
            var formData = new FormData(document.getElementById('feedback'))
            $.ajax({
                type: 'POST',
                url: 'feedback',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    $.alert(response.message);
                },
            })
        })
    })
</script>
</html>    