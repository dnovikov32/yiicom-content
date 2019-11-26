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
     * // TODO: move to relations trade
     * Returns class name for PageUrl modelClass field value
     * @return string
     */
    public function modelClass();

    /**
     * Returns route to frontend controller for PageUrl route field value
     *
     * ```php
     *     return 'pages/page/view';
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