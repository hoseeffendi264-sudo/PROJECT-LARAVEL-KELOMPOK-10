<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Restaurant Order</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f5f5f5; }
        nav { background: #333; padding: 10px 20px; }
        nav a, nav button { color: white; margin-right: 15px; text-decoration: none; background: none; border: none; cursor: pointer; font-size: 14px; }
        nav a:hover, nav button:hover { text-decoration: underline; }
        .container { max-width: 1000px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .alert-success { color: green; background: #d4edda; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        .alert-error { color: red; background: #f8d7da; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f8f9fa; }
        input, textarea, select { width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button, .btn { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        button:hover, .btn:hover { background: #0056b3; }
        .btn-danger { background: #dc3545; }
        .btn-danger:hover { background: #a71d2a; }
        .btn-success { background: #28a745; }
        .btn-success:hover { background: #1e7e34; }
        .text-right { text-align: right; }
        .mb-3 { margin-bottom: 15px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('menu.index') }}">🏠 Menu</a>
        <a href="{{ route('cart.index') }}">🛒 Keranjang</a>
        
        @auth
            <a href="{{ route('orders.index') }}">📦 Pesanan Saya</a>
            <a href="{{ route('profile.edit') }}">👤 Profil</a>
            @if(auth()->user()->email === 'admin@example.com')
                <a href="{{ route('admin.dashboard') }}">🛡️ Admin</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert-error">
                <ul style="margin:0; padding-left:20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>