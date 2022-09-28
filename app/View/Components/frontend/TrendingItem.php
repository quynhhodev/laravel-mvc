<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use App\Models\Product;

class TrendingItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menProducts = Product::where('catId','<',11)->limit(8)->get();
        $womenProducts = Product::where('catId','>',10)->where('catId','<',14)->limit(8)->get();
        $childProducts = Product::where('catId','>',13)->limit(8)->get();
        return view('components.frontend.trending-item', ['menProducts'=>$menProducts, 'womenProducts'=>$womenProducts, 'childProducts'=>$childProducts]);
    }
}
