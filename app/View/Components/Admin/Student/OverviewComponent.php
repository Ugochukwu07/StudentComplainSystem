<?php

namespace App\View\Components\Admin\Student;

use Closure;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class OverviewComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function students()
    {
        return User::where('admin', 0)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.student.overview-component');
    }
}
