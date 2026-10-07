@extends('layouts.default')

@section('content')
    <div>
        <h1>Adicionar item</h1>
    </div>
    <div>
        <form method="POST" enctype="multipart/form-data" action="{{ route('item.store') }}" class="m-2">
            @csrf
            <input type="text" name="name" id="" class="rounded-md border shadow-md my-1 px-2 pb-0.5"
                value="{{ old('name') }}" placeholder="Título">
            @error('name')
                {{ $message }}
            @enderror
            <br>
            <input type="text" name="summary" id="" class="rounded-md border shadow-md my-1 px-2 pb-0.5"
                value="{{ old('summary') }}" placeholder="Resumo">
            @error('summary')
                {{ $message }}
            @enderror
            <br>
            <input type="text" name="alternative_titles" id=""
                class="rounded-md border shadow-md my-1 px-2 pb-0.5" value="{{ old('alternative_titles') }}"
                placeholder="Título alternativo">
            @error('alternative_titles')
                {{ $message }}
            @enderror
            <br>
            <input type="text" name="genres" id="" class="rounded-md border shadow-md my-1 px-2 pb-0.5"
                value="{{ old('genres') }}" placeholder="Gênero">
            @error('genres')
                {{ $message }}
            @enderror
            <br>
            <input type="file" name="image"> <br>
            <button type="submit" class="rounded-md border shadow-md px-2 py-0.5 my-1">Salvar</button>
        </form>
    </div>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
