{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.default')

@php
    $currentBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out';
    $sideBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

@section('navbar')
    @include('layouts.navigationDashboard')
@endsection

@section('content')
    <div class="flex-1 flex flex-col p-2 h-full w-full">
        <div name="header">
            <h2 class="font-semibold text-3xl leading-tight pt-10 pb-4">
                {{ __('Tópicos') }}
            </h2>
        </div>

        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="py-7">
            <div>
                <a href="{{ route('newTopic') }}"
                    class="bg-red-200 text-gray-700 p-2 border border-transparent rounded-md font-semibold text-lg uppercase tracking-widest hover:bg-red-300 active:bg-red-400 focus:outline-none focus:ring-1 transition ease-in-out duration-150">
                    Criar novo tópico
                </a>
            </div>
            <div class="py-7">
                @if ($topics->isNotEmpty())
                    <div class="flex-1 flex items-center justify-center">
                        <div
                            class="flex flex-col items-center justify-center rounded-2xl w-6xl bg-red-200 text-gray-700 p-5">
                            <ul class="flex flex-col gap-2 py-3 w-full">
                                @foreach ($topics as $topic)
                                    <li class="flex flex-row gap-2 rounded-md shadow-sm bg-red-700 text-gray-200 p-2">
                                        <a href="{{ route('topic.index', $topic->id) }}" class="w-19/20">
                                            <h3
                                                class="text-left underline text-xl font-bold text-shadow-sm text-shadow-red-600">
                                                {{ $topic->title }}</h3>
                                            <p class="text-left max-h-12 line-clamp-2">{{ $topic->description }}</p>
                                            <p class="text-right text-shadow-sm text-sm">{{ Auth::user()->name }}</p>
                                            <p class="text-right text-shadow-sm text-xs">{{ Auth::user()->username }}</p>
                                            <p class="text-right text-shadow-sm">
                                                @if ($topic->created_at->ne($topic->updated_at))
                                                    <span class="text-gray-400 text-xs">Editado</span>
                                                @endif
                                                {{ $topic->updated_at->format('d/m/Y H:i') }}
                                            </p>
                                        </a>
                                        <div class="flex flex-col justify-end gap-1 w-1/20 text-gray-700">
                                            <a href="{{ route('editTopic', $topic->id) }}"
                                                class="flex justify-center items-center h-1/2 bg-red-200 rounded-t-md">
                                                <x-lucide-square-pen class="h-10 w-10" />
                                            </a>
                                            <form action="{{ route('topic.delete', ['topic' => $topic->id]) }}"
                                                method="post"
                                                onsubmit="return confirm('Deseja realmente excluir este tópico?')"
                                                class="flex flex-col justify-center items-center h-1/2 py-2 pl-1 bg-red-200 rounded-b-md">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit">
                                                    <x-lucide-trash class="text-red-500 w-10 h-10" />
                                                </button>
                                            </form>
                                        </div>
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
    </div>
@endsection
