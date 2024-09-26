<x-app-layout>
    <div class="w-full h-[500px] flex flex-col justify-center items-center gap-y-4">
        <form method="POST" action="{{ route('update-employee', $employee->id) }}" class="w-[70%] h-full flex flex-col justify-center items-center gap-y-8">

            @csrf
            @method('PUT')

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="name">Nombres</label>
                    <input type="text" id="name" value="{{ $employee->name }}">
                    @error('name')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="lastname">Apellidos</label>
                    <input type="text" id="lastname" value="{{ $employee->lastname }}">
                    @error('lastname')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="employee_id">Identificación</label>
                    <input type="text" id="employee_id" value="{{ $employee->employee_id }}">
                    @error('employee_id')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="phone_number">Número de teléfono</label>
                    <input type="text" id="phone_number" value="{{ $employee->phone_number }}">
                    @error('phone_number')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="city">Ciudad</label>
                    <input type="text" id="city" value="{{ $employee->birthplace }}">
                    @error('city')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="department">Departamento</label>
                    <input type="text" id="department" value="{{ $employee->birthplace }}">
                    @error('department')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-8">
                <button type="submit">Actualizar</button>
                <button type="button" onclick="location.href='{{ route('employees') }}'">Cancelar</button>
            </div>

        </form>
    </div>
</x-app-layout>