<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;
use App\Models\Deal;

class CownDown extends Component
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
        //$deal =  Deal::where('countDown - date()','>',0)->orderBy('countDown','asc')->limit(1)->get();
        //DB::select('select top(?) * from hongocquynhdeals where countDown - date("Y-m-d") > 0 order by countDown asc ', [1]);
        
        return view('components.frontend.cown-down');
    }
}
