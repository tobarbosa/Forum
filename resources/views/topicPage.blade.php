@extends('layouts.default')

<script>
    function nextImg(event) {
        let img = document.getElementById("img");
        let imgId = img.alt;
        let images = @json(
            $topic->images->map(function ($image) {
                $image->imagePath = Storage::url($image->image);
                return $image;
            }));

        let index = images.findIndex(item => item.id.toString() === imgId);

        if (index + 1 < images.length) {
            let next = index + 1;
            img.alt = images[next].id.toString();
            img.src = images[next].imagePath;
        }

        setButtonColor(images, img);
    }

    function previousImg(event) {
        let img = document.getElementById("img");
        let imgId = img.alt;
        let images = @json(
            $topic->images->map(function ($image) {
                $image->imagePath = Storage::url($image->image);
                return $image;
            }));

        let index = images.findIndex(item => item.id.toString() === imgId);

        if (index - 1 >= 0) {
            let next = index - 1;
            img.alt = images[next].id.toString();
            img.src = images[next].imagePath;
        }

        setButtonColor(images, img);
    }

    function setButtonColor(images, img) {
        let previousButton = document.getElementById("left");
        let leftButtonStyle = previousButton.getAttribute("class");
        leftButtonStyle = img.alt === images[0].id.toString() ?
            leftButtonStyle.replace(/(text-gray-)[\d]+/, "$1400") :
            leftButtonStyle.replace(/(text-gray-)[\d]+/, "$10")
        previousButton.setAttribute('class', leftButtonStyle);

        let nextButton = document.getElementById("right");
        let rightButtonStyle = nextButton.getAttribute("class");
        rightButtonStyle = img.alt === images[images.length - 1].id.toString() ?
            rightButtonStyle.replace(/(text-gray-)[\d]+/, "$1400") :
            rightButtonStyle.replace(/(text-gray-)[\d]+/, "$10")
        nextButton.setAttribute('class', rightButtonStyle);
    }

    function editComment(commentId, comment) {
        let edit = document.getElementById("edit-" + commentId);
        let editComment = document.getElementById("editComment-" + commentId);

        edit.hidden = !edit.hidden;

        if (!edit.hidden) {
            editComment.value = comment;
        }
    }
</script>

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
    <div class="flex flex-col w-6xl p-2 gap-3 text-left">
        {{-- VOLTAR --}}
        <div>
            <a href="{{ back()->getTargetUrl() }}" class="flex gap-2 items-center w-max">
                <x-lucide-arrow-left class="w-5 h-5" />
                <span>Voltar</span>
            </a>
        </div>
        {{-- TÓPICO --}}
        <div class="flex flex-col gap-4 rounded-sm shadow p-1">
            {{-- Title --}}
            <div class="text-3xl p-1 border-b-2">{{ $topic->title }}</div>
            {{-- Description --}}
            <div class="p-1 whitespace-pre-line">{{ $topic->description }}</div>
            {{-- Images --}}
            @if ($topic->images->isNotEmpty())
                <div class="flex justify-center w-full">
                    <div class="flex flex-row justify-center gap-1">
                        <button id="left" name="{{ $topic->images[0]->id }}" onclick="previousImg(event)"
                            class="bg-gray-100/20 text-gray-400 hover:bg-gray-400/30">
                            <x-lucide-chevron-left class="w-10" />
                        </button>
                        <div id="topic-image" class="w-fit max-w-full max-h-100 flex items-center justify-center">
                            <img id="img" src="{{ Storage::url($topic->images[0]->image) }}"
                                alt="{{ $topic->images[0]->id }}"
                                class="max-w-full max-h-full h-auto w-auto object-contain">
                        </div>
                        <button id="right" name="{{ $topic->images[0]->id }}" onclick="nextImg(event)"
                            class="bg-gray-100/20 {{ $topic->images->count() > 1 ? 'text-gray-0' : 'text-gray-400' }} hover:bg-gray-400/30">
                            <x-lucide-chevron-right class="w-10" />
                        </button>
                    </div>
                </div>
            @endif
            {{-- User Info --}}
            <div class="p-1 text-right">
                <div class="font-bold">
                    <p class="text-xs">{{ $topic->user->username }}</p>
                    <p>{{ $topic->user->name }}</p>
                </div>
                <p>{{ $topic->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
        {{-- COMENTÁRIOS --}}
        <div class="flex flex-col gap-2">
            <div class="text-3xl p-1">Comentários</div>
            @auth
                <div class="">
                    <form method="POST" action="{{ route('comment', ['topic' => $topic, 'user' => Auth::user()]) }}"
                        class="flex flex-col gap-2 items-end">
                        @csrf
                        <textarea name="comment" id="comment" class="w-full h-30 border ring-2 ring-gray-700 rounded-sm p-2">{{ old('comment') }}</textarea>
                        <input type="submit" value="Comentar"
                            class="border w-max px-2 rounded-2xl bg-gray-100/80 text-gray-700 font-semibold text-lg flex items-center justify-center">
                    </form>
                </div>
            @endauth
            @guest
                <div class="flex items-center justify-center h-30 bg-gray-600/50 rounded-sm">
                    <a href="{{ route('login') }}" class="hover:text-blue-400">Faça login para continuar</a>
                </div>
            @endguest
            @if ($topic->comments->isNotEmpty())
                <ul>
                    @foreach ($topic->comments as $comment)
                        <li class="">
                            <div id="comment-{{ $comment->id }}" class="flex flex-raw border">
                                <div class="flex flex-col gap-1 p-2 {{ Auth::check() ? 'w-19/20' : 'w-full' }}">
                                    <div class="font-bold">
                                        <p>{{ $comment->user->name }}</p>
                                        <p class="text-xs">{{ $comment->user->username }}</p>
                                    </div>
                                    <p class="whitespace-pre-line">{{ $comment->comment }}</p>
                                    <p class="text-right">
                                        @if ($comment->created_at->ne($comment->updated_at))
                                            <span class="text-gray-400 text-xs">Editado</span>
                                        @endif
                                        {{ $comment->created_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                                @auth
                                    <div class="flex flex-col gap-1 w-1/20 text-gray-700 p-1">
                                        <button class="flex justify-center items-center h-1/2 bg-red-200 rounded-tl-md"
                                            onclick="editComment({{ $comment->id }}, {{ Js::from($comment->comment) }})">
                                            <x-lucide-square-pen
                                                class="h-10 w-10 transition-all duration-150 hover:h-11 hover:w-11 hover:stroke-2" />
                                        </button>
                                        <form action="{{ route('comment.delete', ['comment' => $comment->id]) }}"
                                            method="post"
                                            onsubmit="return confirm('Deseja realmente excluir este comentário?')"
                                            class="flex flex-col justify-center items-center h-1/2 py-2 pl-1 bg-red-200 rounded-bl-md">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit">
                                                <x-lucide-trash
                                                    class="text-red-500 w-10 h-10 transition-all duration-150 hover:h-11 hover:w-11 hover:stroke-2" />
                                            </button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                            @auth
                                <div id="edit-{{ $comment->id }}" class="py-2" hidden>
                                    <form action="{{ route('comment.edit', $comment->id) }}" method="post"
                                        class="flex flex-col gap-2 items-end">
                                        @csrf
                                        <textarea name="editComment" id="editComment-{{ $comment->id }}"
                                            class="w-full h-30 border ring-2 ring-gray-700 rounded-sm p-2">{{ old('editComment') ? old('editComment') : $comment->comment }}</textarea>
                                        <input type="submit" value="Editar"
                                            class="border w-max px-2 rounded-2xl bg-gray-100/80 text-gray-700 font-semibold text-lg flex items-center justify-center">
                                    </form>
                                </div>
                            @endauth
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
