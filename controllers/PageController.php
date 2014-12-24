<?php

namespace krok\page\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use krok\page\models\Page;
use krok\language\models\Language;

class PageController extends Controller
{
    /**
     * @param string $route
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionRoute($route = 'index')
    {
        /* @var $dp Page */

        $page = Page::parse($route);

        $dp = Page::find()->where(
            'name = :name AND active = :active AND language = :language',
            [':name' => $page, ':active' => Page::ACTIVE_YES, ':language' => Language::getCurrent()]
        )->one();

        if ($dp === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }
        return $this->render($dp->template, ['dp' => $dp]);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
