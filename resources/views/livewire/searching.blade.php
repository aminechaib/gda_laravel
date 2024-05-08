<div>
    <input type="text" wire:model.defer="search" placeholder="Search by reference..." class="form-control"/>
    <button wire:click="doSearch">Search</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Reference</th>
                <!-- Other table headers -->
            </tr>
        </thead>
        <tbody>
            @foreach ($pieces as $piece)
                <tr>
                    <td>{{ $piece->reference }}</td>
                    <!-- Other columns data -->
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pieces->links() }}
</div>
