<?php

namespace krok\page;

class Manage extends \yii\base\Module
{
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
