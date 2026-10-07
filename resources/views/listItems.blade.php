@extends('layouts.default')

{{-- @section('navbar')
    <div class="w-screen">
        <nav class="flex w-screen h-20 bg-red-900 m-0 p-0 box-border">

            <!-- Div 1 (Vermelho Escuro) -->
            <div class="flex-1 flex items-center justify-center text-red-100 bg-red-800 border-r border-red-900">
                Logo / Esquerda
            </div>

            <!-- Div 2 (Vermelho Principal) -->
            <div class="flex-2 flex items-center justify-center text-red-100 bg-red-700 border-r border-red-900">
                Menu / Centro
            </div>

            <!-- Div 3 (Vermelho Mais Claro) -->
            <div class="flex-1 flex items-center justify-center text-red-100 bg-red-600">
                Perfil / Direita
            </div>

        </nav>
    </div>
@endsection --}}

@section('title', 'Dá uma olhada nisso aqui')

@section('content')
    <div class="w-full h-full m-0 py-2 px-1">
        <!-- It always seems impossible until it is done. - Nelson Mandela -->
        @foreach ($listItems as $item)
            <div>
                <h1>{{ $item->name }}</h1>
            </div>
            <div>
                <h2>{{ $item->summary }}</h2>
            </div>
            <div>
                <h2>{{ $item->genres }}</h2>
            </div>
            <div>
                <h2>{{ $item->comments }}</h2>
            </div>
            @if ($item->image)
                <div class="flex justify-center">
                    <img src="{{ Storage::url($item->image) }}" alt="" width="100">
                </div>
            @endif
        @endforeach
        <div>{{ $listItems->onEachSide(1)->links() }}</div>
    </div>
@endsection
