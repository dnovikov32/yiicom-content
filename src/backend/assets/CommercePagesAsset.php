<?php

namespace yiicom\content\backend\assets;

use yii\web\AssetBundle;

/**
 * @inheritdoc
 */
class CommercePagesAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@modules/pages/backend/assets/dist';

    /**
     * @var array
     */
    public $css = [
		'css/pages.css',
    ];

    /**
     * @var array
     */
    public $js = [
		'js/pages.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        \modules\commerce\backend\assets\CommerceAsset::class,
        \modules\files\backend\assets\CommerceFilesAsset::class,
    ];
}