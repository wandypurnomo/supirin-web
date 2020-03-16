<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class MainNavigationWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'title' => 'SupirIN'
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.main_navigation_widget', [
            'config' => $this->config,
        ]);
    }
}
