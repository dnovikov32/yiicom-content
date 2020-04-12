<?php

namespace yiicom\content\backend\models;

use yii\db\ActiveQuery;
use yiicom\backend\search\SearchModelInterface;
use yiicom\backend\search\SearchModelTrait;
use yiicom\content\common\models\Category;
use yiicom\content\common\models\PageUrl;

class CategorySearch extends Category implements SearchModelInterface
{
    use SearchModelTrait;

    /**
     * @var string
     */
    public $alias;

    /**
     * @inheritDoc
     */
    public function getModelClass()
    {
        return Category::class;
    }
    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'parentId','status', 'position'], 'integer'],

            [['name', 'title', 'alias'], 'safe'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    protected function prepareQuery()
    {
        $query = static::find();

        $query->joinWith(['parent', 'url']);

        return $query;
    }

    /**
     * @param ActiveQuery $query
     */
    protected function prepareFilters($query)
    {
        $contentCategory = Category::tableName();
        $contentUrl = PageUrl::tableName();

        $query->andFilterWhere([
            "$contentCategory.id" => $this->id,
            "$contentCategory.parentId" => $this->parentId,
            "$contentCategory.status" => $this->status,
            "$contentCategory.position" => $this->position,
        ]);

        $query->andFilterWhere(['LIKE', "$contentCategory.name", $this->name]);
        $query->andFilterWhere(['LIKE', "$contentCategory.title", $this->title]);
        $query->andFilterWhere(['LIKE', "$contentUrl.alias", $this->alias]);
    }
}
