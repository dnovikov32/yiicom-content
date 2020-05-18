<?php

namespace yiicom\content\common\behaviors;

use yii\base\Behavior;
use yii\base\Exception;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yiicom\content\common\models\Relation;

class RelationBehavior extends Behavior
{
    /**
     * @var string
     */
    public $attribute = 'relations';

    /**
     * @inheritdoc
     */
	public function events()
	{
		return [
			ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
			ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
		];
	}

    /**
     * @return ActiveQuery
     */
    public function getRelations()
    {
        /** @var ActiveRecord $owner */
        $owner = $this->owner;

        return $owner->hasMany(Relation::class, ['modelId' => 'id'])
            ->onCondition(['modelClass' => $owner->getModelClass()]);
    }

    public function setRelations($value)
    {
        $this->owner->{$this->attribute} = $value;
    }

	public function afterSave()
	{
        /** @var ActiveRecord $owner */
        /** @var Relation[] $relations */

        $owner = $this->owner;
        $relations = $this->owner->{$this->attribute};
        $models = [];

        Relation::deleteAll('modelId = :modelId', [':modelId' => $owner->id]);

        if (! $relations) {
            return;
        }

        foreach ($relations as $index => $relation) {
            /** @var Relation $model */
            $model = \Yii::createObject(Relation::class);
            $model->load($relation->getAttributes(), '');
            $model->modelId = $owner->id;
            $model->position = $index;

            if (! $model->save()) {
                throw new Exception("Can't save Relation model: " . implode(', ', $model->getFirstErrors()));
            }

            $models[] = $model;
        }

        // Reindexes the array with a 0 key to remove keys from JSON result
        $owner->{$this->attribute} = array_values($models);
	}

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function beforeDelete()
    {
        $relations = $this->getRelations()->all();
        $result = true;

        foreach ($relations as $relation) {
            $result += (bool) $relation->delete();
        }

        return $result;
    }
}
