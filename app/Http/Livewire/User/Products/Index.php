<?php

namespace App\Http\Livewire\User\Products;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class Index extends Component 
{
    protected $listeners = ['setFilter'];

    public $filter = null;

    public $queryString = ['filter'];

    public $readyToLoad = false;

    public function mount()
    {
        $firstCategoryLocaleCache = 'first_category_' . app()->currentLocale();

        if (!cache()->has($firstCategoryLocaleCache)) {

            $firstCategory = Category::orderBy('name_' . app()->currentLocale(), 'ASC')->firstOrFail()->slug;

            Cache::forever($firstCategoryLocaleCache, $firstCategory);
            
        }

        $this->filter = $this->filter ?? cache($firstCategoryLocaleCache);
    }

    public function setFilter($value)
    {
        $this->filter = $value;
    }

    public function updatedFilter()
    {
        $this->render();
    }

    public function loadProducts()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        if (!$this->readyToLoad) {
            return view('livewire.user.products.index', ['products' => collect([])]);
        }

        if (!cache()->has($this->filter)) {

            $catProducts = match ($this->filter) {

                'latest' => Product::latest()->limit(12)->get(),

                'view_count' => Product::orderBy('view_count', 'DESC')->limit(12)->get(),

                default => Product::whereCategoryId(Category::whereSlug($this->filter)->firstOrFail()->id)->latest()->get()

            };

            Cache::forever($this->filter, $catProducts);

        }

        $products = cache($this->filter);

        $this->dispatchBrowserEvent('loading:work:space');

        $this->dispatchBrowserEvent('scroll:to:products');
        
        return view('livewire.user.products.index', compact('products'));
    } 
}
