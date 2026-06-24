@extends('layout.plantilla')
@section('title', 'Admin - D\'Ennita')
@section('contenido')

<main class="p-3 flex-grow-1" style="background-color:var(--bg-secondary);">
    <div class="container-xl">
        <h1 class="fs-3 fw-bold mb-4" style="color:var(--text-primary);">Panel de Administración</h1>

        {{-- Tabs de navegación --}}
        <ul class="nav nav-tabs mb-4" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#productos">📦 Productos</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pedidos">📋 Pedidos</button>
            </li>
        </ul>

        <div class="tab-content">
            {{-- PESTAÑA PRODUCTOS --}}
            <div class="tab-pane fade show active" id="productos">
                @include('partials.admin-productos')
            </div>

            {{-- PESTAÑA PEDIDOS --}}
            <div class="tab-pane fade" id="pedidos">
                @include('partials.admin-pedidos')
            </div>
        </div>
    </div>
</main>
@endsection
