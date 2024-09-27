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
        return Employee::select([
                'employees.id as id',
                'employees.name as name',
                'employees.lastname as lastname',
                'employees.charge_id as charge_id',
                'employees.boss_id as boss_id',
                'employees.updated_at as updated_at'
            ])
            ->whereNotNull('boss_id')
            ->whereHas('boss');
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
        return redirect()->route('delete-many-charges-confirmation', ['employees' => $this->getSelected()]);
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

            Column::make("Area", "charge.area")
                ->sortable()
                ->searchable(),

            Column::make("Cargo", "charge.name")
                ->sortable()
                ->searchable(),

            Column::make("Rol", "charge.role")
                ->sortable()
                ->searchable(),

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
                        ->location(fn($row) => route('delete-charge-confirmation', $row->charge->id))
                        ->attributes(fn($row) => ['class' => 'text-red-400']),
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Editar')
                        ->location(fn($row) => route('edit-charge', $row->charge->id)),
                ])
        ];
    }
}
