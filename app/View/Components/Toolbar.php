<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toolbar extends Component
{
    public string $title;
    public array $breadcrumbs;
    public ?string $actionUrl;
    public ?string $modalTarget;
    public ?string $actionIcon;
    public string $actionLabel;

    public function __construct(
        $title,
        $breadcrumbs = [],
        $actionUrl = null,
        $modalTarget = null,
        $actionIcon = null,
        $actionLabel = 'Create'
    ) {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs;
        $this->actionUrl = $actionUrl;
        $this->modalTarget = $modalTarget;
        $this->actionIcon = $actionIcon;
        $this->actionLabel = $actionLabel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.toolbar');
    }
}
