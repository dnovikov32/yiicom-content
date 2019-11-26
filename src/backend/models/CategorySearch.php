<?php

namespace yiicom\content\backend\models;

use yii\db\ActiveQuery;
use modules\commerce\backend\search\SearchModelInterface;
use modules\commerce\backend\search\SearchModelTrait;
use yiicom\content\common\models\Category;

class CategorySearch extends Category implements SearchModelInterface
{
    use SearchModelTrait;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'parentId','status', 'position'], 'integer'],

            [['title'], 'safe'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    protected function prepareQuery()
    {
        $query = static::find();

        $query->joinWith(['parent']);

        return $query;
    }

    /**
     * @param ActiveQuery $query
     */
    protected function prepareFilters($query)
    {
        $query->andFilterWhere([
            '{{%pages_categories}}.id' => $this->id,
            '{{%pages_categories}}.parentId' => $this->parentId,
            '{{%pages_categories}}.status' => $this->status,
            '{{%pages_categories}}.position' => $this->position,
        ]);

        $query->andFilterWhere(['LIKE', '{{%pages_categories}}.title', $this->title]);
    }
}
