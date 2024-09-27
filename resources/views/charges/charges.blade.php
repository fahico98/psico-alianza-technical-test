<x-app-layout>
    <div class="w-full flex justify-start items-center mb-6">
        <x-button onclick="location.href='{{ route('create-charge') }}'">Nuevo cargo</x-button>
    </div>
    <livewire:charge-table/>
</x-app-layout>