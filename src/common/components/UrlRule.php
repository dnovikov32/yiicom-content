<?php

namespace yiicom\content\common\components;

use yii\helpers\Json;
use yii\web\Request;
use yii\web\UrlManager;
use yiicom\content\common\models\PageUrl;

class UrlRule extends \yii\web\UrlRule
{
	public function init()
	{
		if (null === $this->name) {
			$this->name = __CLASS__;
		}
	}

    /**
     * @param UrlManager $manager
     * @param string $route
     * @param array $params
     * @return null|bool|string
     * @throws \yii\base\InvalidConfigException
     */
	public function createUrl($manager, $route, $params)
	{
		/* @var PageUrl $url */

		$url = PageUrl::find()->byRoute($route, $params)->one();

		if (null === $url) {
			return false;
		}

		return $url->getAttribute('alias');
	}

    /**
     * @param UrlManager $manager
     * @param Request $request
     * @return array|bool
     * @throws \yii\base\InvalidConfigException
     */
	public function parseRequest($manager, $request)
	{
		/* @var PageUrl $url */
		$url = PageUrl::find()->byAlias($request->getPathInfo())->one();

		if (null === $url) {
			return false;
		}

		return [
			$url->getAttribute('route'),
			Json::decode($url->getAttribute('params'), true),
		];
	}

}