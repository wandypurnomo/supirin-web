<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class SingleDriverGridWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'image' => null,
        'name' => null,
        'experience' => null,
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.single_driver_grid_widget', [
            'config' => $this->config,
        ]);
    }
}
