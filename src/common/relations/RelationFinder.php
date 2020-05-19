<?php

namespace yiicom\content\common\relations;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yiicom\content\common\models\RelationGroup;
use yiicom\catalog\common\models\Product;

class RelationFinder
{
    /** @var ActiveRecord */
    private $model;

    /** @var array */
    private $collection;

    /**
     * @param $product
     */
    public function __construct(ActiveRecord $model)
    {
        $this->model = $model;
    }

    public function find()
    {
        $modelId = $this->model->id;
        $modelClass = $this->model->getModelClass();

        $relationGroupTable = RelationGroup::tableName();
        $modelTable = $modelClass::tableName();

        $relations = RelationGroup::find()
            ->joinWith(['relations' => function (ActiveQuery $query) use ($modelId) {
                $query->andOnCondition(['modelId' => $modelId]);
            }])
            ->where(["$relationGroupTable.modelClass" => $modelClass])
            ->orderBy(["$relationGroupTable.position" => SORT_ASC])
            ->all();

        foreach ($relations as $relationGroup) {
            /** @var RelationGroup $relationGroup */

            $ids = ArrayHelper::getColumn($relationGroup->relations, 'relationId');

            $group = new \stdClass();
            $group->id = $relationGroup->id;
            $group->title = $relationGroup->title;
            $group->name = $relationGroup->name;

            $group->relations = $modelClass::find()
                ->withUrl()
                ->withFiles()
                ->where(["IN", "$modelTable.id", $ids])
                ->all();

            if ($group->relations) {
                $this->collection[$group->name] = $group;
            }
        }

        return $this->collection;
    }

}