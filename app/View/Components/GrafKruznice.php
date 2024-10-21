<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GrafKruznice extends Component
{
    public $total;
    public $value;
    public $percentage;
    public $text1;
    public $text2;
    /**
     * Create a new component instance.
     */
    public function __construct($value, $total = 100, $text1 = '', $text2 = '')
    {
    $this->total = $total;
    $this->value = $value;
    $this->percentage = ($this->total > 0) ? ($this->value / $this->total) * 100 : 0;
    $this->text1 = $text1;
    $this->text2 = $text2;
    
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.graf-kruznice');
    }
}
