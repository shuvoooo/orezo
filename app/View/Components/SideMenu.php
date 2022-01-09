<?php

namespace App\View\Components;

use App\Models\RolePermission;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class SideMenu extends Component
{
    private $user;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->user = auth()->user();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menus = [];


        if ($this->user->role == 'user' && request()->route('year') != null)
            $menus = include app_path('/Helpers/user_menu.php');

        elseif ($this->user->role == 'admin' || $this->user->role == 'staff') {
            $menus = include app_path('/Helpers/admin_menu.php');
        }

        $staff_visible_routes = [];

        if ($this->user->role == 'staff') {
            $staff_visible_routes = json_decode(RolePermission::where('user_id', $this->user->id)->first()->details ?? "[]");
        }

        foreach ($menus as $key => $menu) {
            if ($menu['type'] == 'single') {
                $menus[$key]['active'] = Route::currentRouteName() == $key;
                $menus[$key]['publish'] = true;

                if ($this->user->role == 'staff') {
                    $menus[$key]['publish'] = in_array($key, $staff_visible_routes);
                }

            } else {
                $menus[$key]['active'] = false;
                $menus[$key]['publish'] = true;
                if ($this->user->role == 'staff') {
                    $menus[$key]['publish'] = false;
                }

                foreach ($menu['submenu'] as $sub_key => $item) {

                    if (Route::currentRouteName() == $sub_key) {
                        if ($menus[$key]['active'] == false)
                            $menus[$key]['active'] = true;

                        $menus[$key]['submenu'][$sub_key]['active'] = true;
                    } else {
                        $menus[$key]['submenu'][$sub_key]['active'] = false;
                    }

                    $menus[$key]['submenu'][$sub_key]['publish'] = true;

                    if ($this->user->role == 'staff') {
                        $menus[$key]['publish'] = in_array($sub_key, $staff_visible_routes);
                        $menus[$key]['submenu'][$sub_key]['publish'] = in_array($sub_key, $staff_visible_routes);
                    }
                }
            }
        }


        return view('components.side-menu', compact('menus'));
    }
}
