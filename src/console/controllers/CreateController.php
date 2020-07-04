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
        $mainPage = new Page;
        $mainPage->name = Yii::t("yiicom", "Main page");
        $mainPage->title = Yii::t("yiicom", "Main page");
        $mainPage->template = 'index';

        $mainPage->url = Yii::createObject(PageUrl::class);
        $mainPage->url->alias = '';

        if (! $mainPage->save()) {
            Console::output(
                Console::ansiFormat(
                    "Failed to create main page: "  . implode(', ', $mainPage->getFirstErrors()),
                    [Console::FG_RED]
                )
            );

            return ExitCode::UNSPECIFIED_ERROR;
        };

        Console::output(Console::ansiFormat("Default pages created successfully", [Console::FG_GREEN]));

        return ExitCode::OK;
    }
}
