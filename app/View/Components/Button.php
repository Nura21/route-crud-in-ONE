<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Buttton extends Component
{
    public $type, $name, $class, $classForm;

    public function __construct($type, $name, $class=null, $classForm=null)
    {
        $this->type = lcfirst($type);
        $this->name = $name;
        $this->class = $class;
        $this->classForm = $classForm;
    }

    public function render()
    {
        return view('components.button');
    }
}
