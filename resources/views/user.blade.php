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
    <h1 class="text-4xl font-bold">{{ $user->name }}</h1>

    <h3 class="text-base font-normal my-2">Primeira informação importante</h3>
    <h3 class="text-base font-normal my-2">{{ $user->email }}</h3>
    <h3 class="text-base font-normal my-2">{{ $user->password }}</h3>
    <h3 class="text-base font-normal my-2">{{ $user->created_at }}</h3>
    <h3 class="text-base font-normal my-2">{{ $user->updated_at }}</h3>
    <h3 class="text-base font-normal my-2">{{ $user->items }}</h3>
@endsection
