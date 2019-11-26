<?php

namespace yiicom\content\common\traits;

use yiicom\content\common\models\PageUrl;

trait ModelPageUrlTrait
{
    /**
     * @return PageUrl
     */
//    public function getUrl()
//    {
//        return $this->url;
//    }

    /**
     * @return string
     */
    public function modelClass()
    {
        return static::class;
    }
}