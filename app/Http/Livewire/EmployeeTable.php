<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Employee;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class EmployeeTable extends DataTableComponent
{
    public array $bulkActions = ['deleteSelected' => 'Eliminar selección'];

    public function builder(): Builder
    {
        return Employee::select(['id', 'name', 'lastname', 'address', 'birthplace', 'phone_number']);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSingleSortingDisabled()
            ->setDefaultSort('created_at', 'desc')
            ->setColumnSelectDisabled();
    }

    public function deleteSelected()
    {
        Log::info(gettype($this->getSelected()));

//        Employee::

        foreach($this->getSelected() as $item)
        {
            Log::info($item);
        }

        $this->clearSelected();
    }

    public function columns(): array
    {
        return [
            Column::make("Nombre", 'name')
                ->format(fn($value, $row, Column $column) => $row->name . ' ' . $row->lastname)
                ->sortable(),

            Column::make("Identificación", "employee_id")
                ->sortable(),

            Column::make("Dirección", "address")
                ->sortable(),

            Column::make("Teléfono", "phone_number")
                ->sortable(),

            Column::make("Ciudad", "birthplace")
                ->format(function($value, $row, Column $column){
                    $birthplaceArray = explode(',', $row->birthplace);
                    return last($birthplaceArray);
                })
                ->sortable(),

            Column::make("Departamento", "birthplace")
                ->format(function($value, $row, Column $column){
                    $birthplaceArray = explode(',', $row->birthplace);
                    return last($birthplaceArray);
//                    return $birthplaceArray[count($birthplaceArray) - 1];
                })
                ->sortable(),

            ButtonGroupColumn::make('Acciones')
                ->attributes(function($row) {
                    return ['class' => 'flex gap-x-4'];
                })
                ->buttons([
                    LinkColumn::make('Delete')
                        ->title(fn($row) => 'Eliminar')
                        ->location(fn($row) => route('delete-employee-confirmation', $row->id))
                        ->attributes(fn($row) => ['class' => 'text-red-400']),
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Editar')
                        ->location(fn($row) => route('edit-employee-form.blade.php', $row->id)),
                ])
        ];
    }
}
