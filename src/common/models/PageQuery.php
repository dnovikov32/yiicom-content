<?php

namespace yiicom\content\common\models;

use yii\db\ActiveQuery;
use yii\helpers\Json;
use yiicom\catalog\common\models\ProductQuery;

class PageQuery extends ActiveQuery
{
    /**
     * @return PageQuery
     */
    public function withUrl() : PageQuery
    {
        $this->joinWith(['url']);

        return $this;
    }

    /**
     * @return PageQuery
     */
    public function withFiles() : PageQuery
    {
        $this->joinWith(['files']);

        return $this;
    }

    /**
     * @return PageQuery
     */
    public function withCategory() : PageQuery
    {
        $this->joinWith(['category']);

        return $this;
    }
    
    /**
     * @param array $ids
     * @return PageQuery
     */
	public function category(array $ids) : PageQuery
	{
        $this->andWhere(['categoryId' => $ids]);

        return $this;
	}

    /**
     * @param Page $model
     * @return Page|null
     */
    public function prev(Page $model): ?Page
    {
        $query = Page::find()
            ->withUrl()
            ->where('{{%content_page}}.createdAt > :createdAt', [':createdAt' => $model->createdAt])
            ->orderBy(['{{%content_page}}.createdAt' => SORT_ASC]);

        if ($category = $model->category) {
            $query->category([$category->id]);
        }

        return $query->one();
    }

    /**
     * @param Page $model
     * @return Page|null
     */
    public function next(Page $model): ?Page
    {
        $query = Page::find()
            ->withUrl()
            ->where('{{%content_page}}.createdAt < :createdAt', [':createdAt' => $model->createdAt])
            ->orderBy(['{{%content_page}}.createdAt' => SORT_DESC]);

        if ($category = $model->category) {
            $query->category([$category->id]);
        }

        return $query->one();
    }

}