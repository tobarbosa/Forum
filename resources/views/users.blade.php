@extends('layouts.default')

{{-- @section('navbar')
    <div>
        <nav
            style="display: flex; width: 100vw; height: 70px; background-color: #7F1D1D; margin: 0; padding: 0; box-sizing: border-box;">

            <!-- Div 1 (Vermelho Escuro) -->
            <div
                style="flex: 1; display: flex; align-items: center; justify-content: center; color: #FEE2E2; background-color: #991B1B; border-right: 1px solid #7F1D1D;">
                Logo / Esquerda
            </div>

            <!-- Div 2 (Vermelho Principal) -->
            <div
                style="flex: 2; display: flex; align-items: center; justify-content: center; color: #FEE2E2; background-color: #B91C1C; border-right: 1px solid #7F1D1D;">
                Menu / Centro
            </div>

            <!-- Div 3 (Vermelho Mais Claro) -->
            <div
                style="flex: 1; display: flex; align-items: center; justify-content: center; color: #FEE2E2; background-color: #DC2626;">
                Perfil / Direita
            </div>

        </nav>
    </div>
@endsection --}}

@section('title', 'Dá uma olhada nisso aqui')

@section('content')
    <div style="width: 100vw; height: 100vh; margin: 0; padding: 0;">
        <!-- It always seems impossible until it is done. - Nelson Mandela -->
        @foreach ($users as $user)
            <div>
                <h1>{{ $user->name }}</h1>
            </div>
            <div>
                <h2>{{ $user->email }}</h2>
            </div>
        @endforeach
    </div>
@endsection
