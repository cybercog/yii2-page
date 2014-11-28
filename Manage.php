<?php

namespace krok\page;

use krok\cp\components\Module;

class Manage extends Module
{
    /**
     * @var array
     */
    public $templates = [];

    /**
     * @var string
     */
    public $defaultRoute = 'manage';

    /**
     * @var string
     */
    public $controllerNamespace = 'krok\page\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
