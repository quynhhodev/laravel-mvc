<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use DB;
use App\Models\Category;


class SmallBannerSale extends Component
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
        $catsShowHome=Category::where('status', 2)->get();
        return view('components.frontend.small-baner-sale', ['catsShowHome' => $catsShowHome]);
    }
}
