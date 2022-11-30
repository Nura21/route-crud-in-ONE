<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $type, $name, $placeholder, $value, $class, $classForm, $multiple, $min;

    public function __construct($type, $name, $placeholder="null", $value=null, $class=null, $classForm=null, $multiple=null)
    {
        $this->type = lcfirst($type);
        $this->name = lcfirst($name);
        $this->placeholder = lcfirst($placeholder);
        $this->value = lcfirst($value);
        $this->class = $class;
        $this->classForm = $classForm;
        $this->type == 'date' ? $this->min = date('Y-m-d', strtotime(now())) : '';
        $multiple != null ? $this->multiple = $multiple : $multiple = null;
    }

    public function render()
    {
        return view('components.input');
    }
}
