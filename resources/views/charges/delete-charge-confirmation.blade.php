<x-app-layout>
    <div class="w-full h-[500px] flex flex-col justify-center items-center gap-y-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-exclamation-circle-fill text-red-500" viewBox="0 0
        16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
        </svg>
        Esta seguro de eliminar el cargo {{ $charge->name }}?
        <div class="flex justify-center gap-x-2">
            <x-button onclick="location.href='{{ route('delete-charge', $charge->id) }}'">Si</x-button>
            <x-button onclick="location.href='{{ route('charges') }}'">No</x-button>
        </div>
    </div>
</x-app-layout>