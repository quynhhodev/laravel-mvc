<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use App\Models\Page;

class ShopBlog extends Component
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
        $pages = Page::where('status', '>', 0)->get();
        return view('components.frontend.shop-blog',['pages'=>$pages]);
    }
}
