<x-app-layout>
    <div class="w-full h-[500px] flex flex-col justify-center items-center gap-y-4">
        <form method="POST" action="{{ route('update-employee', $employee->id) }}" class="w-[70%] h-full flex flex-col justify-center items-center gap-y-8">

            @csrf
            @method('PUT')

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="name">Nombres</label>
                    <input type="text" id="name" name="name" value="{{ $employee->name }}">
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="lastname">Apellidos</label>
                    <input type="text" id="lastname" name="lastname" value="{{ $employee->lastname }}">
                    @error('lastname')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="employee_id">Identificación</label>
                    <input type="text" id="employee_id" name="employee_id" value="{{ $employee->employee_id }}">
                    @error('employee_id')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="phone_number">Número de teléfono</label>
                    <input type="text" id="phone_number" name="phone_number" value="{{ $employee->phone_number }}">
                    @error('phone_number')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="city">Ciudad</label>
                    <input type="text" id="city" name="city" value="{{ last(explode(',', $employee->birthplace)) }}">
                    @error('city')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="department">Departamento</label>
                    <input type="text" id="department" name="department" value="{{ explode(',', $employee->birthplace)[0] }}">
                    @error('department')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="address">Dirección</label>
                    <input type="text" id="address" name="address" value="{{ $employee->address }}">
                    @error('address')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-2">
                <x-button type="submit">Actualizar</x-button>
                <x-button type="button" onclick="location.href='{{ route('employees') }}'">Cancelar</x-button>
            </div>

        </form>
    </div>
</x-app-layout>