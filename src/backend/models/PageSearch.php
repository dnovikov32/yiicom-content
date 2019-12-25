<?php

namespace yiicom\content\backend\models;

use Yii;
use yii\db\ActiveQuery;
use yiicom\backend\search\SearchModelInterface;
use yiicom\backend\search\SearchModelTrait;
use yiicom\content\common\models\Page;

class PageSearch extends Page implements SearchModelInterface
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
        return Page::class;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'categoryId'], 'integer'],

            [['name', 'title', 'alias', 'template'], 'safe'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    protected function prepareQuery()
    {
        $query = self::find();

        $query->joinWith(['url']);

        return $query;
    }

    /**
     * @param ActiveQuery $query
     */
    protected function prepareFilters($query)
    {
        $query->andFilterWhere([
            '{{%pages}}.id' => $this->id,
            '{{%pages}}.categoryId' => $this->categoryId
        ]);

        $query->andFilterWhere(['LIKE', '{{%pages}}.name', $this->name]);
        $query->andFilterWhere(['LIKE', '{{%pages}}.title', $this->title]);
        $query->andFilterWhere(['LIKE', '{{%pages}}.template', $this->template]);
        $query->andFilterWhere(['LIKE', '{{%pages_urls}}.alias', $this->alias]);
    }
}
