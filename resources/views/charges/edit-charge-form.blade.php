<x-app-layout>
    <div class="w-full h-[500px] flex flex-col justify-center items-center gap-y-4">
        <form method="POST" action="{{ route('update-charge', $charge->id) }}" class="w-[70%] h-full flex flex-col justify-center items-center gap-y-8">

            @csrf
            @method('PUT')

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="employee_id">Identificación del empleado</label>
                    <input value="{{ $charge->employee->employee_id }}" type="text" id="employee_id" name="employee_id">
                    @error('employee_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="area">Area</label>
                    <input value="{{ $charge->area }}" type="text" id="area" name="area">
                    @error('area')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="name">Nombre del cargo</label>
                    <input value="{{ $charge->name }}" type="text" id="name" name="name">
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="role">Rol</label>
                    <select name="role" id="role">
                        <option value="">Seleccionar...</option>
                        <option value="Jefe" selected="{{ $charge->role === 'Jefe' }}">Jefe</option>
                        <option value="Colaborador" selected="{{ $charge->role === 'Colaborador' }}">Colaborador</option>
                    </select>
                    @error('role')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="boss_employee_id">Identificación del jefe</label>
                    <input value="{{ $charge->employee->boss->employee_id }}" type="text" id="boss_employee_id" name="boss_employee_id">
                    @error('boss_employee_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-2">
                <x-button type="submit">Guardar</x-button>
                <x-button type="button" onclick="location.href='{{ route('charges') }}'">Cancelar</x-button>
            </div>

        </form>
    </div>
</x-app-layout>