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

Add to config file (config/web.php or common\config\main.php)

```
'bootstrap' => [
    'page',
],
```

```
'modules' => [
        'page' => [
            'class' => 'krok\page\Page',
        ],
],
```

register modules for Cp modules ( @vendor\krok\cp\Cp.php )

```
public function registerModules()
{
    $this->modules = [
        'page' => [
            'class' => 'krok\page\Manage',
        ],
    ];
}
```
