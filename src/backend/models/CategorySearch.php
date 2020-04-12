<?php

namespace yiicom\content\backend\models;

use yii\db\ActiveQuery;
use yiicom\backend\search\SearchModelInterface;
use yiicom\backend\search\SearchModelTrait;
use yiicom\content\common\models\Category;

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
        $query->andFilterWhere([
            '{{%content_category}}.id' => $this->id,
            '{{%content_category}}.parentId' => $this->parentId,
            '{{%content_category}}.status' => $this->status,
            '{{%content_category}}.position' => $this->position,
        ]);

        $query->andFilterWhere(['LIKE', '{{%content_category}}.name', $this->name]);
        $query->andFilterWhere(['LIKE', '{{%content_category}}.title', $this->title]);
        $query->andFilterWhere(['LIKE', '{{%content_url}}.alias', $this->alias]);
    }
}
