<?php

namespace yiicom\content\backend\models;

use yii\db\ActiveQuery;
use modules\commerce\backend\search\SearchModelInterface;
use modules\commerce\backend\search\SearchModelTrait;
use yiicom\content\common\models\Page;

class PageSearch extends Page implements SearchModelInterface
{
    use SearchModelTrait;

    /**
     * @var string
     */
    public $alias;

    /**
     * @return string
     */
    public function modelClass()
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

            [['title', 'alias', 'template'], 'safe'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'alias' => 'Адрес страницы'
        ]);
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

        $query->andFilterWhere(['LIKE', '{{%pages}}.title', $this->title]);
        $query->andFilterWhere(['LIKE', '{{%pages}}.template', $this->template]);
        $query->andFilterWhere(['LIKE', '{{%pages_urls}}.alias', $this->alias]);
    }
}
