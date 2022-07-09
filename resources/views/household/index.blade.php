<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="self-center font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Households') }}
            </h2>
            <a 
                href="{{ route('household.create') }}" 
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2"
            >
                Create Household
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <livewire:list-household>
    </div>
</x-app-layout>
