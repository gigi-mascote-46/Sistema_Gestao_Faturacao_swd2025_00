<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bem vindo !") }}

                    <div class="mt-4">
                        <a href="{{ route('clientes.index') }}" class="btn btn-primary">Listar Clientes</a>
                        <a href="{{ route('clientes.create') }}" class="btn btn-success">Inserir Cliente</a>
                        <a href="{{ route('clientes.show', 1) }}" class="btn btn-info">Mostrar Cliente</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
