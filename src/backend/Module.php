<?php

namespace yiicom\content\backend;

use yiicom\content\common\models\Category;

class Module extends \yiicom\content\common\Module
{
    /**
     * @inheritDoc
     */
    public function settings()
    {
        $settings = [
            'content' => [
                'categories' => (new Category)->getList(),
            ],
        ];

        return $settings;
    }

    /**
     * @inheritDoc
     */
    public function adminMenu()
    {
        return [
            'label' => 'Страницы',
            'icon' => 'fa fa-file',
            'url' => '/content/page/index',
            'items' => [
                [
                    'label' => 'Страницы',
                    'icon' => 'fa fa-file',
                    'url' => '/content/page/index',
                ],
                [
                    'label' => 'Категории',
                    'icon' => 'fa fa-list',
                    'url' => '/content/category/index',
                ]
            ]
        ];
    }

}