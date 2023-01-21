<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <!-- Alpine Js cdn -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Bootstrap 5 cdn links -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Favicon Link -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('home/assets/images/favicon.png') }}">
    <!-- Font awesome cdn -->
    <script src="https://kit.fontawesome.com/1a015cf62c.js" crossorigin="anonymous"></script>
    <!-- Css Links -->
    <link rel="stylesheet" href="{{ asset('home/assets/css/styles.css') }}">
</head>

<body class="sign-up-body">
    @yield('content')
</body>

</html>
