<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavApp extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $rol = auth()->user()->id_roles;
        return view('layouts.nav.nav-app', ['rol' => $rol]);
    }
}
