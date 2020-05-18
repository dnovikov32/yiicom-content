<?php

namespace yiicom\content\common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\db\ActiveQuery;
use yiicom\common\interfaces\ModelList;
use yiicom\common\traits\ModelListTrait;
use yiicom\content\common\models\RelationGroup;

/**
 * @property integer $id
 * @property integer $groupId
 * @property integer $modelId
 * @property string $modelClass
 * @property integer $relationId
 * @property integer $position
 */
class Relation extends ActiveRecord implements ModelList
{
    use ModelListTrait;

    /**
     * @inheritdoc
     */
	public static function tableName()
	{
		return '{{%content_relation}}';
	}

    /**
     * @inheritdoc
     */
	public function rules()
	{
		return array_merge(parent::rules(), [
            ['groupId', 'required'],
            ['groupId', 'integer'],
            ['groupId', 'exist', 'targetClass' => RelationGroup::class, 'targetAttribute' => 'id'],

            ['modelId', 'integer'],

            ['modelClass', 'required'],
            ['modelClass', 'string', 'max' => 255],

            ['relationId', 'required'],
            ['relationId', 'integer'],

            ['position', 'integer'],
            ['position', 'default', 'value' => 0]
		]);
	}

    /**
     * @inheritdoc
     */
	public function attributeLabels()
	{
		return array_merge(parent::attributeLabels(), [
            'id' => Yii::t('yiicom', 'ID'),
            'groupId' => Yii::t('yiicom', 'Group ID'),
			'modelId' => Yii::t('yiicom', 'Model ID'),
			'modelClass' => Yii::t('yiicom', 'Model Class'),
			'relationId' => Yii::t('yiicom', 'Relation Model ID'),
			'position' => Yii::t('yiicom', 'Position'),
		]);
	}

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            'id',
            'groupId',
            'modelId',
            'modelClass',
            'relationId',
            'position',
        ];
    }
}
