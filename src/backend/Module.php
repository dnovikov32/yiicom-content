<?php

namespace yiicom\content\backend;

use yiicom\content\common\models\Category;

class Module extends \yiicom\common\Module
{
    /**
     * Return module settings for backend vue application
     * @return array
     */
    public function settings()
    {
        $settings['content']['categories'] = (new Category)->getList();

        return $settings;
    }
}