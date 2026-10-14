@extends('layouts.default')

@php
    $standardPhoto = 'images/defaults/perfil.jpg';
    $currentBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out';
    $sideBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

@section('navbar')
    @include('layouts.navigationHome')
@endsection

@section('content')
    <div class="flex flex-col justify-center items-center py-2 w-6xl">
        <div class="text-3xl font-bold text-shadow-lg">Usuários</div>
        <div class="grid grid-cols-3 gap-2 py-3">
            @foreach ($users as $user)
                <a class="border w-50 h-80 rounded-md overflow-hidden" href="{{ route('user.index', $user->id) }}">
                    <img src="{{ $user->photo === $standardPhoto ? asset($user->photo) : Storage::url($user->photo) }}"
                        alt="{{ $user->name }}" class="h-5/7 w-full">
                    <div class="flex flex-col items-start h-2/7 w-full p-2">
                        <p class="w-full truncate text-start font-semibold text-base">{{ $user->name }}</p>
                        <p class="w-full truncate text-start font-semibold text-base">{{ $user->username }}
                        </p>
                        <p class="w-full truncate text-start font-semibold text-base">{{ $user->email }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <div>
            {{ $users->links() }}
        </div>
    </div>
@endsection
