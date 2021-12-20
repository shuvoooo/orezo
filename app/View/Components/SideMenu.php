<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class SideMenu extends Component
{
    private $user_role;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user_role = auth()->user()->role;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menu = [];
        if ($this->user_role == 'user' && request()->route('year') != null)
            $menu = include(__DIR__ . '/../../Helpers/user_menu.php');

        elseif ($this->user_role == 'admin')
            $menu = include(__DIR__ . '/../../Helpers/admin_menu.php');

        elseif ($this->user_role == 'staff')
            $menu = include(__DIR__ . '/../../Helpers/staff_menu.php');

        $route_name = Route::currentRouteName();

        return view('components.side-menu', compact('menu', 'route_name'));
    }
}
