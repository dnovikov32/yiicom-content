<?php

namespace yiicom\content\console\controllers;

use Yii;
use yii\helpers\Console;
use yii\console\ExitCode;
use yii\console\Controller;
use yii\base\InvalidConfigException;
use yiicom\content\common\models\PageUrl;
use yiicom\content\common\models\Page;

class CreateController extends Controller
{
    /**
     * Creates default pages (index, etc)
     * @return int
     * @throws InvalidConfigException
     */
    public function actionDefaults()
    {
        // Index page
        $mainPage = new Page;
        $mainPage->name = Yii::t("yiicom", "Main page");
        $mainPage->title = Yii::t("yiicom", "Main page");
        $mainPage->template = 'index';
        $mainPage->url = Yii::createObject(PageUrl::class);
        $mainPage->url->alias = '';
        $mainPage->url->sitemap = true;

        // Sitemap page
        $sitemapPage = new Page;
        $sitemapPage->name = Yii::t("yiicom", "Site map");
        $sitemapPage->title = Yii::t("yiicom", "Site map");
        $sitemapPage->url = Yii::createObject(PageUrl::class);
        $sitemapPage->url->alias = 'sitemap.xml';
        $sitemapPage->url->route = 'content/sitemap/index';
        $sitemapPage->url->sitemap = false;

        foreach ([$mainPage, $sitemapPage] as $page) {
            if (! $page->save()) {
                Console::output(
                    Console::ansiFormat(
                        sprintf("Failed to create '%s': %s", $page->name, implode(', ', $page->getFirstErrors())),
                        [Console::FG_RED]
                    )
                );

                return ExitCode::UNSPECIFIED_ERROR;
            };
        }

        Console::output(Console::ansiFormat("Default pages created successfully", [Console::FG_GREEN]));

        return ExitCode::OK;
    }
}
