## Yii commerce content module

### Install

**app/backend/config/main.php**
```php
// Enable backend routes
'modules' => [
    ...
    'content' => [
        'class' => yiicom\content\backend\Module::class
    ],
],
```

**app/frontend/config/main.php**
```php
'components' => [
    ...
    // Enable url aliases            
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'enableStrictParsing' => true,
        'rules' => [
            [
                'class' => yiicom\content\common\components\UrlRule::class,
            ],
        ]
    ],
    // Override error handler        
    'errorHandler' => [
        'errorAction' => 'content/page/error',
    ],            
    ...
    // Override default theme
    'view' => [
        'theme' => [
            'pathMap' => [
                ...
                '@yiicom/content' => '@app/themes/content',
            ]
        ]
    ],
],


// Enable frontend routes
'modules' => [
    ...
    'content' => [
        'class' => yiicom\content\frontend\Module::class
    ],
],




```

**app/console/config/main.php**
```php
// Enable module commands
'modules' => [
    ...
    'content' => [
        'class' => yiicom\content\console\Module::class
    ],
],

// Enable module migrations 
'params' => [
    ...
    'yii.migrations' => [
        ...
        '@yiicom/content/migrations',
    ],
],
```

Run migrations to create tables: **pages**, **pages_categories** , **pages_urls**
```bash
php yii migrate
```
