@extends('layouts.app')

@section('content')
<h1>Daftar Menu</h1>

<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
    @foreach($menus as $menu)
    <div style="border: 1px solid #ccc; padding: 15px;">
        <h3>{{ $menu->name }}</h3>
        <p>{{ Str::limit($menu->description, 100) }}</p>
        <p><strong>Rp {{ number_format($menu->price, 0, ',', '.') }}</strong></p>
        <p><em>{{ ucfirst($menu->category) }}</em></p>
        
        <a href="{{ route('menu.show', $menu->id) }}">Lihat Detail</a> |
        <form action="{{ route('cart.add', $menu->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Tambah ke Keranjang</button>
        </form>
    </div>
    @endforeach
</div>
@endsection