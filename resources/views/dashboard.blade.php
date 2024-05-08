<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('GDA') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- <livewire:searching /> --}}
                    <form action="/import-excel" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="excel_file" accept=".xlsx,.xls" required>
                        <button type="submit">Import</button>
                    </form>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <livewire:piece-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
