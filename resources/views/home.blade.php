@extends('layouts.default')

@php
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
        <div class="text-3xl font-bold text-shadow-lg">Destaques</div>
        <ul class="flex flex-col gap-2 py-3 w-full">
            @foreach ($topics as $topic)
                <li class="rounded-md shadow-sm bg-red-200 text-gray-700 shadow-red-300 p-2">
                    <a href="{{ route('topic.index', $topic->id) }}">
                        <h3 class="text-left underline text-xl font-bold text-shadow-sm">{{ $topic->title }}</h3>
                        <p class="text-left max-h-12 line-clamp-2">{{ $topic->description }}</p>
                        <p class="text-right text-shadow-sm text-sm">{{ $topic->user->name }}</p>
                        <p class="text-right text-shadow-sm text-xs">{{ $topic->user->username }}</p>
                        <p class="text-right text-shadow-sm">
                            @if ($topic->created_at->ne($topic->updated_at))
                                <span class="text-gray-400 text-xs">Editado</span>
                            @endif
                            {{ $topic->updated_at->format('d/m/Y H:i') }}
                            {{ $topic->updated_at->format('d/m/Y H:i') }}
                        </p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
