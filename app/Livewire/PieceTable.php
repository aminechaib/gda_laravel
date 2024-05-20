<?php

namespace App\Livewire;
use App\Models\Piece;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
final class PieceTable extends PowerGridComponent
{
    public bool $showFilters = true;

    use WithExport;
    public function setUp(): array
    {
        
        $this->showCheckBox();
        return [
            Exportable::make('export')
            ->striped()
            ->columnWidth([
                2 => 30,
            ])
            ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),


            Header::make()
                // ->showSoftDeletes()
                ->showToggleColumns()
                ->withoutLoading()
                ->showSearchInput(),

            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }


    

    public function datasource(): Builder
    
    {
        config(['livewire-powergrid.filter' => 'outside']);

        return Piece::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('reference oem')
            ->add('reference')
            ->add('designation')
            ->add('marque')
            ->add('prix')
            ->add('quantity')
            ->add('prix_total')
            ->add('fournisseur')
            ->add('date', function (Piece $model) {
                return Carbon::parse($model->date)->format('Y-m-d');  // Format date
            });
    }

    public function columns(): array
    {
        return [
            // Column::make('ID', 'id')->sortable(),
            Column::make('Référence', 'reference')->searchable()->sortable()->editOnClick(),
            Column::make('Référence OEM', 'reference oem')->searchable()->sortable()->editOnClick(),
            Column::make('Désignation', 'designation')->searchable()->sortable()->editOnClick(),
            Column::make('Marque', 'marque')->searchable()->sortable()->editOnClick(),
            Column::make('Prix', 'prix')->searchable()->editOnClick(),
            Column::make('Prix Remiser', 'prix_remiser')->searchable()->editOnClick(),
            Column::make('Quantity', 'quantity')->searchable()->editOnClick(),
            Column::make('Montant Total', 'prix_total')->searchable()->editOnClick(),
            Column::make('Fournisseur', 'fournisseur')->searchable()->sortable()->editOnClick(),
            Column::make('Date', 'date')->searchable()->sortable()->editOnClick(),
            Column::action('Action')
                ->add(Button::add('edit')
                    ->slot('Edit: {{ $id }}')
                    ->id()
                    ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                    ->dispatch('edit', ['rowId' => '$id']))
        ];
    }


    public function filters(): array
    {
        return [
            Filter::inputText('marque'),
            Filter::inputText('reference'),
            Filter::inputText('designation'),
            Filter::inputText('fournisseur'),
            Filter::inputText('date'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function onUpdatedEditable(string|int $id, string $field, string $value): void
{
    Piece::query()->find($id)->update([
        $field => $value,
    ]);
}
}