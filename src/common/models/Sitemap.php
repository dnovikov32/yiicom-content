<?php

namespace yiicom\content\common\models;

use Yii;
use yiicom\common\interfaces\ModelStatus;
use yiicom\content\common\models\PageUrl;

class Sitemap
{
    const DEFAULT_PRIORITY = '1.0';

	public function xml()
	{
		$host = Yii::getAlias('@frontendWeb');
		
        $urls = PageUrl::find()
            ->where([
                'status' => ModelStatus::STATUS_ACTIVE,
                'sitemap' => true,
            ])
            ->orderBy([
                'modelClass' => SORT_ASC,
                'alias' => SORT_ASC,
            ]);

        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;

        $urlsetElement = $dom->createElement('urlset');
        $urlsetElement->setAttribute('xmlns', "http://www.sitemaps.org/schemas/sitemap/0.9");
        $dom->appendChild($urlsetElement);

        foreach($urls->each() as $url) {
            /** @var PageUrl $url */
            
            $urlElement = $dom->createElement('url');

            $locElement = $dom->createElement('loc', sprintf('%s/%s', $host, $url->alias));
            $urlElement->appendChild($locElement);

            $lastmodElement = $dom->createElement('lastmod', (new \DateTime($url->updatedAt))->format('c'));
            $urlElement->appendChild($lastmodElement);

            $priorityElement = $dom->createElement('priority', self::DEFAULT_PRIORITY);
            $urlElement->appendChild($priorityElement);

            $urlsetElement->appendChild($urlElement);
        }

		return $dom->saveXML();
	}

}