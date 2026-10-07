@php
    $standardPhoto = 'images/defaults/perfil.jpg';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'No início dos tempos...')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen w-full flex flex-col bg-[#e53e3e] text-white text-center">
        @section('header')
            <div class="flex justify-center items-center h-14 w-full">
                <div class="w-1/3"></div>
                <div class="w-1/3"><a class="px-1 py-0.5 hover:text-black" href="{{ route('home') }}">HOME</a></div>
                <div class="flex w-1/3 h-full justify-end">
                    <div class="flex items-center justify-center">
                        @auth
                            <x-dropdown align="right" width="14">
                                <x-slot name="trigger">
                                    <button
                                        class="flex items-center justify-center border border-transparent text-sm font-medium rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{-- <div>{{ Auth::user()->name }}</div> --}}
                                        <img src="{{ Auth::user()->photo === $standardPhoto ? asset(Auth::user()->photo) : Storage::url(Auth::user()->photo) }}"
                                            alt="{{ Auth::user()->name }}"
                                            class="h-13 w-13 rounded-full object-cover shadow-2xl">
                                        <span
                                            class="flex justify-center items-center p-2 text-sm font-medium">{{ Auth::user()->name }}</span>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <div
                                        class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-800 text-shadow-2xs font-bold underline">
                                        {{ '@' . Auth::user()->username }}
                                    </div>
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Perfil') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('dashboard')">
                                        {{ __('Atividades') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Sair') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @else
                            <a href="{{ route('login') }}"
                                class="flex items-center h-full bg-red-700 justify-center px-5 py-1.5 border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] text-sm leading-normal">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="flex items-center h-full bg-red-700 justify-center px-5 py-1.5 border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] text-sm leading-normal">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @show
        @section('navbar')
            <div class="w-full">
                <nav class="flex h-16 bg-red-900 m-0 p-0 box-border">

                    <!-- Div 1 (Vermelho Escuro) -->
                    <a href="{{ route('users') }}"
                        class="flex-1 flex items-center justify-center text-red-100 bg-red-800 border-r border-red-900">
                        Usuários
                    </a>

                    <!-- Div 2 (Vermelho Principal) -->
                    <a href="{{ route('list.items') }}"
                        class="flex-2 flex items-center justify-center text-red-100 bg-red-700 border-r border-red-900">
                        Itens da lista
                    </a>

                    <!-- Div 3 (Vermelho Mais Claro) -->
                    <a href="{{ route('item.new') }}"
                        class="flex-1 flex items-center justify-center text-red-100 bg-red-600">
                        Perfil / Direita
                    </a>

                </nav>
            </div>
        @show
        <div class="flex-1 w-full h-full flex flex-col items-center py-10">
            {{-- <h1>Teste</h1> --}}
            @yield('content')
        </div>
        @section('footer')
            <div
                class="flex items-center justify-center h-20 text-lg text-shadow-sm bg-gradient-to-l from-red-400 to-red-100">
                <span class="bg-gradient-to-r from-red-600 to-black text-transparent bg-clip-text ">
                    Em homenagem ao aprendizado!
                </span>
            </div>
        @show
    </div>
</body>

</html>
