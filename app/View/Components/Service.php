<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Service as ServiceModel;

class Service extends Component
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
        $services = ServiceModel::all();
        return view('components.service', compact('services'));
    }
}
