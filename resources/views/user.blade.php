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
    <div class="flex flex-col w-6xl gap-3">
        <div class="flex flex-row gap-3 bg-red-200 text-gray-700 p-5 rounded-2xl">
            <div class="w-3/10">
                <img src="{{ $user->photo === $standardPhoto ? asset($user->photo) : Storage::url($user->photo) }}"
                    alt="{{ $user->name }}">
            </div>
            <div class="w-7/10 text-left text-2xl">
                <p>{{ $user->name }}</p>
                <p>{{ $user->username }}</p>
            </div>
        </div>
        <div class="py-7">
            @if ($topics->isNotEmpty())
                <div class="flex-1 flex items-center justify-center">
                    <div class="flex flex-col items-center justify-center rounded-2xl w-6xl bg-red-200 text-gray-700 p-5">
                        <div class="text-4xl pb-2 font-semibold">Tópicos do usuário</div>
                        <ul class="flex flex-col gap-2 py-3 w-full">
                            @foreach ($topics as $topic)
                                <li class="flex flex-row gap-2 rounded-md shadow-sm bg-red-700 text-gray-200 p-2">
                                    <a href="{{ route('topic.index', $topic->id) }}" class="w-full">
                                        <h3
                                            class="text-left underline text-xl font-bold text-shadow-sm text-shadow-red-600">
                                            {{ $topic->title }}</h3>
                                        <p class="text-left max-h-12 line-clamp-2">{{ $topic->description }}</p>
                                        <p class="text-right text-shadow-sm text-sm">{{ $user->name }}</p>
                                        <p class="text-right text-shadow-sm text-xs">{{ $user->username }}</p>
                                        <p class="text-right text-shadow-sm">
                                            @if ($topic->created_at->ne($topic->updated_at))
                                                <span class="text-gray-400 text-xs">Editado</span>
                                            @endif
                                            {{ $topic->updated_at->format('d/m/Y H:i') }}
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div>
                            {{ $topics->links() }}
                        </div>
                    </div>
                </div>
            @else
                <div class="flex-1 flex items-center justify-center">
                    <div class="flex items-center justify-center rounded-2xl bg-red-200 text-gray-700 w-40 h-30">
                        Não tem Tópicos
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
