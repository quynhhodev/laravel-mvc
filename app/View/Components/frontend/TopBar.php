<?php

namespace App\View\Components\frontend;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class TopBar extends Component
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
        if(Auth::check()){
            $customerName = Auth::user()->customerName;
        }
        else{
            $customerName = '';
        }
        return view('components.frontend.top-bar', ['customerName'=>$customerName]);
    }
}
