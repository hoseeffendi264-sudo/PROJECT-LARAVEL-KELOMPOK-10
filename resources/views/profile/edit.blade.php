@extends('layouts.app')

@section('content')
<h1>Edit Profil</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div style="margin-bottom: 15px;">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label>No. Telepon:</label><br>
        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label>Alamat:</label><br>
        <textarea name="address" style="width: 100%; padding: 8px;">{{ old('address', $user->address) }}</textarea>
    </div>

    <button type="submit">Simpan Perubahan</button>
    <a href="{{ route('menu.index') }}">Batal</a>
</form>
@endsection