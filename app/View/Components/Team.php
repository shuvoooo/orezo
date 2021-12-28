<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Team as TeamModel;

class Team extends Component
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
        $teams = TeamModel::where('is_active', 1)->get();
        return view('components.team', compact('teams'));
    }
}
