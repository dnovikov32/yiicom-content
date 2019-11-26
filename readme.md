## Yii commerce content module

###Install

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
