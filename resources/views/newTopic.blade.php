@extends('layouts.default')

@php
    $currentBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out';
    $sideBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<script>
    function removeImage(id) {
        document.getElementById('image-' + id).remove();
        let container = document.getElementById('imagesToRemove');
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'imgToRemove[]';
        input.value = id;
        container.append(input);
    }
</script>

@section('navbar')
    @include('layouts.navigationDashboard')
@endsection

@section('content')
    <div class="flex flex-col w-6xl p-2 gap-3 text-left">
        {{-- VOLTAR --}}
        <div>
            <a href="{{ back()->getTargetUrl() }}" class="flex gap-2 items-center w-20">
                <x-lucide-arrow-left class="w-5 h-5" />
                <span>Voltar</span>
            </a>
        </div>
        {{-- TÓPICO --}}
        <div class="flex flex-col gap-4 rounded-sm shadow p-3">
            <form action="{{ isset($topic) ? route('topic.edit', $topic->id) : route('topic.store') }}" method="post"
                enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf
                {{-- TITLE --}}
                <label for="title"
                    class="text-3xl p-1 after:content-['*'] after:ml-0.5 after:text-gray-300">Título</label>
                <input type="text" name="title" id="title" class="border p-1"
                    value="{{ isset($topic) ? old('title') ?? $topic->title : old('title') }}" required>
                @error('title')
                    <p class="text-gray-300">{{ $message }}</p>
                @enderror
                {{-- DESCRIPTION --}}
                <label for="description"
                    class="text-3xl p-1 after:content-['*'] after:ml-0.5 after:text-gray-300">Descrição</label>
                <textarea name="description" id="description" cols="30" rows="10" class="border p-1" required>
                    {{ isset($topic) ? old('description') ?? $topic->description : old('description') }}
                </textarea>
                @error('description')
                    <p class="text-gray-300">{{ $message }}</p>
                @enderror
                {{-- PREVIOUS IMAGES --}}
                @if (isset($topic) && $topic?->images?->isNotEmpty())
                    <div class="grid grid-cols-10 gap-1">
                        @foreach ($topic->images as $image)
                            <div id="image-{{ $image->id }}">
                                <button type="button" class="absolute" onclick="removeImage({{ $image->id }})">
                                    <x-lucide-trash
                                        class="text-red-500 w-1/10 h-1/10 transition-all duration-150 hover:h-1/9 hover:w-1/9 hover:drop-shadow-lg hover:stroke-red-700 hover:stroke-3" />
                                </button>
                                <img src="{{ Storage::url($image->image) }}" alt="" class="rounded-sm">
                            </div>
                        @endforeach
                    </div>
                @endif
                {{-- IMAGES --}}
                <div class="inline-flex gap-2">
                    <label for="images" class="font-medium text-lg mb-1">Imagens:</label>

                    <input type="file" name="images[]" accept="image/*" id="images" value="{{ old('images[]') }}"
                        multiple
                        class="text-sm file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-xs file:font-semibold
                        file:uppercase file:tracking-widest
                        file:bg-red-50 file:text-gray-700
                        hover:file:bg-red-100
                        cursor-pointer
                        rounded-md shadow-sm shadow-red-300">
                    @error('images')
                        <p class="text-gray-300">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-red-50 hover:bg-red-100 w-24 p-1 border border-transparent rounded-md text-gray-700 text-xs uppercase tracking-widest font-semibold">{{ isset($topic) ? 'Editar' : 'Criar' }}</button>
                </div>
                <div type="text" name="toRemove" id="imagesToRemove" hidden></div>
            </form>
        </div>
    </div>
@endsection
