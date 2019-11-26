<?php

namespace yiicom\content\backend;

class Module extends \modules\commerce\common\Module
{
    /**
     * @return array
     */
    public function getAdminMenu()
    {
        return [
            'label' => 'Страницы',
            'url' => ["/pages/page/index"],
            'icon' => 'nav-icon fa fa-file',
            'items' => [
                [
                    'label' => 'Страницы',
                    'url' => ["/pages/page/index"],
                    'icon' => 'nav-icon fa fa-file',
                ],
                [
                    'label' => 'Категории',
                    'url' => ["/pages/category/index"],
                    'icon' => 'nav-icon fa fa-list',
                ]
            ]
        ];
    }
}