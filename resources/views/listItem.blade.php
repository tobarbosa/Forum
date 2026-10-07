@extends('layouts.default')

@section('navbar')
    <div class="w-screen">
        <nav class="flex w-full h-17.5 bg-[#333] m-0 p-0 box-border">
            <div class="flex-1 flex items-center justify-center text-white border-r border-[#444]">1</div>
            <div class="flex-2 flex items-center justify-center text-white border-r border-[#444]">2</div>
            <div class="flex-1 flex items-center justify-center text-white">3</div>
        </nav>
    </div>
@endsection

@section('content')
    <h1 class="text-4xl font-bold">{{ $item->name }}</h1>

    <h3 class="text-base font-normal my-2">Primeira informação importante</h3>
    <p>{{ $item->user }}</p>
    <h3 class="text-base font-normal my-2">{{ $item->alternative_titles }}</h3>
    <h3 class="text-base font-normal my-2">{{ $item->summary }}</h3>
    <h3 class="text-base font-normal my-2">{{ $item->genres }}</h3>
    <h3 class="text-base font-normal my-2">{{ $item->user_id }}</h3>
    <h3 class="text-base font-normal my-2">{{ $item->comments }}</h3>
@endsection
