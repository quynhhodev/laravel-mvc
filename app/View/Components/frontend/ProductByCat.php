<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use App\Models\Product;

class ProductByCat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($catId,$catName)
    {
        $this->catId = $catId;
        $this->catName = $catName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $productsByCat = Product::where('catId', $this->catId)->where('status','>', 0)->orderby('created_at', 'DESC')->limit(8)->get();
        return view('components.frontend.product-by-cat', ['productsByCat'=>$productsByCat,'catName'=>$this->catName]);
    }
}
