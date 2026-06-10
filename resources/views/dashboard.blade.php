<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Selamat datang, " . Auth::user()->name . "!") }}
                </div>
            </div>
            
            <!-- Menu Navigasi Cepat -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('menu.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded text-center">
                    🍽️ Lihat Menu
                </a>
                <a href="{{ route('cart.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded text-center">
                    🛒 Keranjang Saya
                </a>
                <a href="{{ route('orders.index') }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-3 px-4 rounded text-center">
                    📦 Pesanan Saya
                </a>
            </div>
        </div>
    </div>
</x-app-layout>