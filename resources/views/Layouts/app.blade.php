<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Order</title>
</head>
<body>
    <nav>
        <a href="{{ route('menu.index') }}">Menu</a> |
        <a href="{{ route('cart.index') }}">Keranjang</a>
    </nav>
    
    <hr>
    
    @yield('content')
</body>
</html>