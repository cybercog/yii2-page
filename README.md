Yii2 Page Manager
=================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist krok/yii2-page "*"
```

or add

```
"krok/yii2-page": "*"
```

to the require section of your `composer.json` file.

Configure
-----------------

Add to config file (config/web.php or common/config/main.php)

```
    'bootstrap' => [
        'page',
    ],
```

```
        'defaultRoute' => 'page/page/route',
```

```
        'errorHandler' => [
            'errorAction' => 'page/page/error',
        ],
```

```
    'modules' => [
        'page' => [
            'class' => 'krok\page\Page',
        ],
    ],
```

register modules

```
    'modules' => [
        'cp' => [
            'class' => 'krok\cp\Cp',
            'modules' => [
                'page' => [
                    'class' => 'krok\page\Manage',
                    'templates' => [
                        'index' => 'Главная',
                        'about' => 'О нас',
                    ],
                ],
            ],
        ],
    ],
```

@app\views\page

```
                    'templates' => [
                        'index' => 'Главная',
                        'about' => 'О нас',
                    ],
```

Add to config file (config/params.php or common/config/params.php)

```
    'nav' => [
        [
            'label' => ['category' => 'cp', 'context' => 'Administration'],
            'items' => [
                [
                    'label' => ['category' => 'page', 'context' => 'Page'],
                    'url' => ['/cp/page'],
                ],
                '<li class="divider"></li>',
            ],
        ],
    ],
```
