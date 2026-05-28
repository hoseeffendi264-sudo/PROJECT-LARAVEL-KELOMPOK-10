@extends('layouts.app')

@section('content')
<h1>{{ $menu->name }}</h1>

<div>
    <p><strong>Deskripsi:</strong></p>
    <p>{{ $menu->description }}</p>
    
    <p><strong>Harga:</strong> Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
    
    <p><strong>Kategori:</strong> {{ ucfirst($menu->category) }}</p>
    
    <hr>
    
    <a href="{{ route('menu.index') }}">← Kembali ke Menu</a> |
    <form action="{{ route('cart.add', $menu->id) }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Tambah ke Keranjang</button>
    </form>
</div>
@endsection