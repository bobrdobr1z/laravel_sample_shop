<!DOCTYPE html>
<html>
<head>
    <title>Интернет-магазин</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <a href="{{ route('delivery.payment') }}" style="color:rgb(0, 0, 0); text-decoration: none;">Доставка и оплата</a>
</body>
</html>

