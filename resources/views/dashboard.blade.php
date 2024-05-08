<x-app-layout>
    <x-slot name="header">
        <form action="/import-excel" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="button-20" type="file" name="excel_file" accept=".xlsx,.xls" required>
            <input class="button-20" type="date"name="input_date" required>
            <button class="button-20" type="submit">Import</button>
            <!-- HTML !-->
        </form>
    </x-slot>
    <div class="py-12">
        <div class="">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- <livewire:searching /> --}}
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
