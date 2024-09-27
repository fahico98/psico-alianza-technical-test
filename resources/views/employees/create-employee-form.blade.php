<x-app-layout>
    <div class="w-full h-[500px] flex flex-col justify-center items-center gap-y-4">
        <form method="POST" action="{{ route('store-employee') }}" class="w-[70%] h-full flex flex-col justify-center items-center gap-y-8">

            @csrf
            @method('POST')

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="name">Nombres</label>
                    <input value="{{ old('name') }}" type="text" id="name" name="name">
                    @error('name')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="lastname">Apellidos</label>
                    <input value="{{ old('lastname') }}" type="text" id="lastname" name="lastname">
                    @error('lastname')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="employee_id">Identificación</label>
                    <input value="{{ old('employee_id') }}" type="text" id="employee_id" name="employee_id">
                    @error('employee_id')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="phone_number">Número de teléfono</label>
                    <input value="{{ old('phone_number') }}" type="text" id="phone_number" name="phone_number">
                    @error('phone_number')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="city">Ciudad</label>
                    <input value="{{ old('city') }}" type="text" id="city" name="city">
                    @error('city')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="department">Departamento</label>
                    <input value="{{ old('department') }}" type="text" id="department" name="department">
                    @error('department')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-4">
                <div class="flex flex-col gap-y-2 w-full">
                    <label for="address">Dirección</label>
                    <input value="{{ old('address') }}" type="text" id="address" name="address">
                    @error('address')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="flex w-full gap-x-2">
                <x-button type="submit">Guardar</x-button>
                <x-button type="button" onclick="location.href='{{ route('employees') }}'">Cancelar</x-button>
            </div>

        </form>
    </div>
</x-app-layout>