<?php

namespace yiicom\content\backend\models;

use Yii;
use yii\db\ActiveQuery;
use yiicom\backend\search\SearchModelInterface;
use yiicom\backend\search\SearchModelTrait;
use yiicom\content\common\models\Page;
use yiicom\content\common\models\PageUrl;

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
        $contentPage = Page::tableName();
        $contentUrl = PageUrl::tableName();

        $query->andFilterWhere([
            "$contentPage.id" => $this->id,
            "$contentPage.categoryId" => $this->categoryId
        ]);

        $query->andFilterWhere(['LIKE', "$contentPage.name", $this->name]);
        $query->andFilterWhere(['LIKE', "$contentPage.title", $this->title]);
        $query->andFilterWhere(['LIKE', "$contentPage.template", $this->template]);
        $query->andFilterWhere(['LIKE', "$contentUrl.alias", $this->alias]);
    }
}
