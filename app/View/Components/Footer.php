<?php

namespace App\View\Components;

use App\Models\Service as ServiceModel;
use Illuminate\View\Component;

class Footer extends Component
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
        $services = ServiceModel::where('is_active', 1)->get();
        return view('components.footer', compact('services'));
    }
}
