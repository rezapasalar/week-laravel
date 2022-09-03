<div class="relative z-0 w-full md:w-3/12">
    
    <select @change="loading = true" wire:ignore wire:model="search" class="bg-[left_.5rem] bg-gray-50 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2 rounded border-gray-300 mb-4 md:mb-0 w-full">
        <option value="all">همه محصولات</option>
        @foreach(\App\Models\Category::orderBy('name_fa')->latest()->get() as $category)
            <option value="{{ $category->name_en }}">{{ $category->name_fa }} - {{ $category->name_en }}</option>
        @endforeach            
    </select>

    <div wire:loading wire:target="search" class="absolute top-[5px] left-2 bg-gray-50 rounded-full border-4 border-b-gray-300 border-x-gray-300 dark:border-b-gray-700 dark:border-x-gray-700 border-t-indigo-600 animate-spin h-8 w-8"></div>
    
</div>