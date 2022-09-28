<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use App\Models\Product;

class SlideShow extends Component
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
        $hotProducts= Product::where('status', '=', 2)->get();
        return view('components.frontend.slide-show', ['hotProducts'=>$hotProducts]);
    }
}
