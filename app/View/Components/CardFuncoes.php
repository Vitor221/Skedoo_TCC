<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardFuncoes extends Component
{
    public $tituloCard;
    public $href;
    public $icon;
    /**
     * Create a new component instance.
     */
    public function __construct($tituloCard, $href, $icon)
    {
        $this->tituloCard = $tituloCard;
        $this->href = $href;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-funcoes');
    }
}
