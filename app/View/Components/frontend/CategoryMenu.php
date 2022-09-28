<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use App\Models\Category;

class CategoryMenu extends Component
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
        $categoriesLv1=Category::where('parentId',0)->where('status','>',0)->where('status','<',2)->get();
        $categoriesLv2=Category::where('parentId','>',0)->where('status','>',0)->get();
        return view('components.frontend.category-menu',['categoriesLv1'=>$categoriesLv1, 'categoriesLv2'=>$categoriesLv2]);
    }
}
