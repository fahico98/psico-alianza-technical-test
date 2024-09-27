<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class EmployeeTable extends DataTableComponent
{
    public array $bulkActions = ['deleteSelected' => 'Eliminar selección'];

    public function builder(): Builder
    {
        return Employee::select(['id', 'name', 'lastname', 'address', 'birthplace', 'phone_number', 'updated_at']);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSingleSortingDisabled()
            ->setDefaultSort('updated_at', 'desc')
            ->setColumnSelectDisabled();
    }

    public function deleteSelected()
    {
        return redirect()->route('delete-many-employees-confirmation', ['employees' => $this->getSelected()]);
    }

    public function columns(): array
    {
        return [
            Column::make("Nombre", 'name')
                ->format(fn($value, $row, Column $column) => $row->name . ' ' . $row->lastname)
                ->sortable()
                ->searchable(),

            Column::make('Apellido', 'lastname')
                ->hideIf(true)
                ->searchable(),

            Column::make("Identificación", "employee_id")
                ->sortable()
                ->searchable(),

            Column::make("Dirección", "address")
                ->sortable()
                ->searchable(),

            Column::make("Teléfono", "phone_number")
                ->sortable()
                ->searchable(),

            Column::make("Ciudad", "birthplace")
                ->format(function($value, $row, Column $column){
                    $birthplaceArray = explode(',', $row->birthplace);
                    return last($birthplaceArray);
                })
                ->sortable()
                ->searchable(),

            Column::make("Departamento", "birthplace")
                ->format(function($value, $row, Column $column){
                    $birthplaceArray = explode(',', $row->birthplace);
                    return $birthplaceArray[0];
                })
                ->sortable()
                ->searchable(),

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
                        ->location(fn($row) => route('edit-employee', $row->id)),
                ])
        ];
    }
}
