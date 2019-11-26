<?php

namespace yiicom\content\common\models;

use yii\db\ActiveQuery;
use yii\helpers\Json;

class PageUrlQuery extends ActiveQuery
{
    /**
     * Returns PageUrlQuery by alias similar to 'articles/example-page-title.html'
     * @param string $alias
     * @return PageUrlQuery
     */
	public function byAlias(string $alias)
	{
        $this->andWhere(['alias' => $alias]);

        return $this;
	}

    /**
     * Returns PageUrlQuery by system route similar to /pages/page/view
     * @param string $route
     * @param array $params
     * @return PageUrlQuery
     */
	public function byRoute(string $route, array $params = [])
	{
        $this->andWhere([
            'route' => $route,
            'params' => Json::encode($params),
        ]);

        return $this;
	}

	/**
	 * Добавляет новый адрес страницы
	 * @param str $alias Адрес страницы
	 * @param str $route Системный адрес
	 * @param str $params GET параметры
	 * @param int $status Статус
	 * @return bool
	 */
//	public static function createUrl($alias, $route, $params = [], $metaParams = [])
//	{
//		$url = new Url;
//		$url->alias = $alias;
//		$url->route = $route;
//		$url->params = Json::encode($params);
//		$url->status = $status;
//		$url->title = isset($metaParams['title']) ? $metaParams['title'] : '';
//		$url->keywords  = isset($metaParams['keywords']) ? $metaParams['keywords'] : '';
//		$url->description = isset($metaParams['description']) ? $metaParams['description'] : '';
//
//		return $url->save();
//	}

//	public static function updateUrl($alias, $route, $params = [], $metaParams = [])
//	{
//		$url = self::getByRoute($route, $params);
//
//		$url->alias = $alias;
//		$url->status = $status;
//		$url->title = isset($metaParams['title']) ? $metaParams['title'] : '';
//		$url->keywords  = isset($metaParams['keywords']) ? $metaParams['keywords'] : '';
//		$url->description = isset($metaParams['description']) ? $metaParams['description'] : '';
//
//		return $url->save();
//	}

}