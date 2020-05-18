<?php

namespace yiicom\content\backend\models;

use yii\db\ActiveQuery;
use yiicom\backend\search\SearchModelInterface;
use yiicom\backend\search\SearchModelTrait;
use yiicom\content\common\models\RelationGroup;

class RelationGroupSearch extends RelationGroup implements SearchModelInterface
{
    use SearchModelTrait;

    /**
     * @inheritDoc
     */
    public function getModelClass()
    {
        return RelationGroup::class;
    }
    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'position'], 'integer'],

            [['name', 'title', 'modelClass', 'relationClass'], 'safe'],
        ];
    }

    /**
     * @param ActiveQuery $query
     */
    protected function prepareFilters($query)
    {
        $contentRelationGroup = RelationGroup::tableName();

        $query->andFilterWhere([
            "$contentRelationGroup.id" => $this->id,
            "$contentRelationGroup.position" => $this->position,
        ]);

        $query->andFilterWhere(['LIKE', "$contentRelationGroup.name", $this->name]);
        $query->andFilterWhere(['LIKE', "$contentRelationGroup.title", $this->title]);
        $query->andFilterWhere(['LIKE', "$contentRelationGroup.modelClass", $this->modelClass]);
        $query->andFilterWhere(['LIKE', "$contentRelationGroup.relationClass", $this->relationClass]);
    }
}
