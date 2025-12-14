<?php

namespace MrShaneBarron\share\View\Components;

use Illuminate\View\Component;

class share extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('sb-share::components.share');
    }
}
