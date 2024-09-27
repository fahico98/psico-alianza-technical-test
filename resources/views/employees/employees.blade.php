<x-app-layout>
    <div class="w-full flex justify-start items-center mb-6">
        <x-button onclick="location.href='{{ route('create-employee') }}'">Nuevo empleado</x-button>
    </div>
    <livewire:employee-table/>
</x-app-layout>