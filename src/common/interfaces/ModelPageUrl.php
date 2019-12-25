<?php

namespace yiicom\content\common\interfaces;

use yiicom\content\common\models\PageUrl;

/**
 * Use with PageUrlTrait and PageUrlBehavior
 *
 * @property PageUrl $url
 */
interface ModelPageUrl
{
    /**
     * Returns route to frontend controller for PageUrl route field value
     *
     * ```php
     *     return 'content/page/view';
     * ```
     *
     * @return string
     */
    public function route();

    /**
     * @return PageUrl
     */
//    public function getUrl();
// TODO: how to create getUrl method required
}