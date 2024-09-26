<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class ChargeTable extends DataTableComponent
{
    public array $bulkActions = ['deleteSelected' => 'Eliminar selección'];

    public function builder(): Builder
    {
        return Employee::select(['id', 'name', 'lastname'])
            ->whereNotNull('area_id')
            ->whereNotNull('charge_id')
            ->whereNotNull('role_id')
            ->whereNotNull('boss_id');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSingleSortingDisabled()
            ->setDefaultSort('created_at', 'desc')
            ->setColumnSelectDisabled();
    }

    public function columns(): array
    {
        return [

            Column::make("Nombre", 'name')
                ->format(fn($value, $row, Column $column) => $row->name . ' ' . $row->lastname)
                ->sortable(),

            Column::make("Identificación", "employee_id")
                ->sortable(),

            Column::make("Area", "area_id")
                ->format(fn($value, $row, Column $column) => $row->area->name)
                ->sortable(),

            Column::make("Cargo", "charge_id")
                ->format(fn($value, $row, Column $column) => $row->charge->name)
                ->sortable(),

            Column::make("Rol", "role_id")
                ->format(fn($value, $row, Column $column) => $row->role->name)
                ->sortable(),

            Column::make("Jefe", "boss_id")
                ->format(fn($value, $row, Column $column) => $row->boss->name . ' ' . $row->boss->lastname)
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
