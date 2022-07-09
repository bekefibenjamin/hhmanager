<form wire:submit.prevent="update">
    {{ $this->form }}
 
    <button 
        type="submit"
        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2 mt-3"
    >
        Submit
    </button>
    <a href="{{ route('household.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2 mt-3">Cancel</a>
</form>