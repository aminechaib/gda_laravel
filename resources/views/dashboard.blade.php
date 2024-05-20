<x-app-layout>
    <x-slot name="header">
        <form action="/import-excel" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            <div class="form-group">
                <input type="file" name="excel_file" accept=".xlsx,.xls" required>
            </div>
            <div class="form-group">
                <input type="date" name="input_date" required>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Fournisseur" id="input_supplier" name="input_supplier" required>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button">Import</button>
            </div>
            <a href="/excel_model/ARRIVAGE.xlsx" class="download-link">Telecharger Model</a>  
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
<style>
    .form-container {
    display: flex;
    flex-wrap: wrap; /* Allows items to wrap to the next line if necessary */
    gap: 10px; /* Space between elements */
    align-items: center; /* Vertically centers the items */
    width:100%; /* Full width */
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
}

.download-link {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

.form-group {
    display: flex;
    flex-direction: column;
}

input[type="file"], input[type="date"], input[type="text"], .submit-button {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="file"], input[type="date"], input[type="text"] {
    width: 200px; /* Fixed width for input fields */
}

.submit-button {
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    background-color: #28a745;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.submit-button:hover {
    background-color: #218838;
}

.alert.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 4px;
}
</style>