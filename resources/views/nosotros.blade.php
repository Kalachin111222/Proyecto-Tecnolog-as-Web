@extends('layout.plantilla')

@section('contenido')
<div class="max-w-screen-lg mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6" style="color: var(--text-primary);">
        Integrantes
    </h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-6">
        
        <div class="p-6 rounded-xl shadow-md text-center" style="background-color: var(--bg-card);">
            <h2 class="text-xl font-semibold" style="color: var(--text-primary);">Aguilar Meza Yolver</h2>
        </div>

        <div class="p-6 rounded-xl shadow-md text-center" style="background-color: var(--bg-card);">
            <h2 class="text-xl font-semibold" style="color: var(--text-primary);">Arcos Arce Santiago</h2>
        </div>

        <div class="p-6 rounded-xl shadow-md text-center" style="background-color: var(--bg-card);">
            <h2 class="text-xl font-semibold" style="color: var(--text-primary);">Bernilla de la Cruz Jean</h2>
        </div>

        <div class="p-6 rounded-xl shadow-md text-center" style="background-color: var(--bg-card);">
            <h2 class="text-xl font-semibold" style="color: var(--text-primary);">Rebaza Castañeda Joseph</h2>
        </div>

        <div class="p-6 rounded-xl shadow-md text-center" style="background-color: var(--bg-card);">
            <h2 class="text-xl font-semibold" style="color: var(--text-primary);">Rodriguez Rubio Ray</h2>
        </div>
        
    </div>
</div>
@endsection