<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $name, $class, $classForm;

    public function __construct($name, $class=null, $classForm=null)
    {
        $this->class = $class;
        $this->name = strtolower($name);
        $this->classForm = $classForm;
    }

    public function render()
    {
        return view('components.select');
    }
}
