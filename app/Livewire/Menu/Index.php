<?php

namespace App\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;

class Index extends Component
{
    public $no = 1; //declare variable no

    public function render()
    {
        return view('livewire.menu.index', [ //parsing data
            'menus' => Menu::get() //getAll data menu
        ]);
    }
}