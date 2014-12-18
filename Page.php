<?php

namespace krok\page;

use Yii;

class Page extends \yii\base\Module implements \yii\base\BootstrapInterface
{
    /**
     * @var string
     */
    public $controllerNamespace = 'krok\page\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->registerTranslations();
        $this->registerViewPath();
    }

    /**
     * @param \yii\base\Application $app
     */
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules(
            [
                '<language:\w+\-\w+>/cp/' . $this->id => 'cp/' . $this->id,
                '<language:\w+\-\w+>/cp/' . $this->id . '/<controller:\w+>' => 'cp/' . $this->id . '/<controller>',
                '<language:\w+\-\w+>/cp/' . $this->id . '/<controller:\w+>/<action:\w+>' => 'cp/' . $this->id . '/<controller>/<action>',
            ]
        );

        $app->getUrlManager()->addRules(
            [
                '<language:\w+\-\w+>' => '/',
                '<language:\w+\-\w+>/<route:.+>' => 'page/page/route',
                '<route:.+>' => '/page/page/route',
            ],
            true
        );
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations[$this->id] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@krok/' . $this->id . '/messages',
        ];
    }

    public function registerViewPath()
    {
        $this->setViewPath('@app/views');
    }
}
