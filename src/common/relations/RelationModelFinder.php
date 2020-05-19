<?php

namespace yiicom\content\common\relations;

use yii\web\Application;
use yii\helpers\FileHelper;
use yiicom\common\interfaces\ModelInfoInterface;

class RelationModelFinder
{
    /** @var Application */
    private $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return array
     * @throws \ReflectionException
     * TODO: add button "Find models" to admin panel
     */
    public function findInVendorModules(): array
    {
        $path = YS_PATH_VENDOR . "/yiicom";
        $files = FileHelper::findFiles($path, ['only' => ['*.php']]);
        $models = [];

        foreach ($files as $file) {
            if (strpos($file, '/common/models/') === false) {
                continue;
            }

            $name = str_replace([$path, '/src', '.php'], '', $file);
            $name = str_replace('yiicom-', 'yiicom/', $name);
            $name = str_replace('/', '\\', $name);

            $reflection = new \ReflectionClass($name);
            if (! $reflection->implementsInterface(ModelInfoInterface::class)) {
                continue;
            }

            $models[$reflection->name] = $reflection->name::modelTitle();
        }

        return $models;
    }
}