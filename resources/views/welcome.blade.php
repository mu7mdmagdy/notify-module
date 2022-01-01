<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Push Notifications</title>

    <link href="{{ asset('css') }}/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css') }}/pnotify.custom.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css') }}/main.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <a class="navbar-brand" href="#">Notify Module</a>
    <div class="dropdown ml-auto mr-3 notify-icon "  role="button" data-toggle="dropdown">
        <span class="badge badge-danger notify-count" data-count="0">0</span>
        <i class="fa fa-bell"></i>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"></div>
    </div>
</nav>
<div class="container-fluid ">
    <div class="row justify-content-center  align-items-center">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h4 class="card-subtitle mt-2 text-white">Push new notification</h4>
                </div>
                <div class="card-body text-center">
                    <form method="POST" id="notfiyForm" action="{{route('push')}}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="notify_content" class="form-control" rows="3"></textarea>
                        <div class="btn-group mt-4 mb-2">
                            <button type="submit"  class="btn btn-success">Push</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start js -->
<script src="{{ asset('js') }}/jquery.min.js"></script>
<script src="{{ asset('js') }}/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" ></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>const csrf_token = '{{ @csrf_token() }}'</script>
<script src="{{ asset('js') }}/pnotify.custom.min.js"></script>
<script src="{{ asset('js') }}/main.js"></script>
</body>
</html>
