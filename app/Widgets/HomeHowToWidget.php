<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class HomeHowToWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.home_how_to_widget', [
            'config' => $this->config,
        ]);
    }
}
