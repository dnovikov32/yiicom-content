<?php

namespace yiicom\content\common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\db\ActiveQuery;
use yii\behaviors\TimestampBehavior;
use yiicom\common\interfaces\ModelList;
use yiicom\common\traits\ModelListTrait;
use yiicom\content\common\models\Relation;

/**
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $modelClass
 * @property string $relationClass
 * @property integer $position
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Relation[] $relations
 */
class RelationGroup extends ActiveRecord implements ModelList
{
    use ModelListTrait;

    /**
     * @inheritdoc
     */
	public static function tableName()
	{
		return '{{%content_relation_group}}';
	}

    /**
     * @inheritdoc
     */
	public function rules()
	{
		return array_merge(parent::rules(), [
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'string', 'max' => 255],
            ['name', 'match', 'pattern' => '/^[\w\-\_]+$/', 'message' => '{attribute}: доступны только латинские буквы, символ "-" и "_"'],
            ['name', 'unique'],

            ['title', 'filter', 'filter' => 'trim'],
            ['title', 'required'],
            ['title', 'string', 'max' => 255],

            ['modelClass', 'required'],
            ['modelClass', 'string', 'max' => 255],

            ['relationClass', 'required'],
            ['relationClass', 'string', 'max' => 255],

            ['position', 'integer'],
            ['position', 'default', 'value' => 0],

            [['createdAt', 'updatedAt'], 'safe'],
		]);
	}

    /**
     * @inheritdoc
     */
	public function attributeLabels()
	{
		return array_merge(parent::attributeLabels(), [
            'id' => Yii::t('yiicom', 'ID'),
            'name' => Yii::t('yiicom', 'Name'),
			'title' => Yii::t('yiicom', 'Title'),
			'modelClass' => Yii::t('yiicom', 'Model Class'),
			'relationClass' => Yii::t('yiicom', 'Relation Model Class'),
			'position' => Yii::t('yiicom', 'Position'),
            'createdAt' => Yii::t('yiicom', 'Created At'),
            'updatedAt' => Yii::t('yiicom', 'Updated At'),
		]);
	}

    /**
     * @return array
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'Timestamp' => [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
                'createdAtAttribute' => 'createdAt',
                'updatedAtAttribute' => 'updatedAt',
            ],
        ]);
    }
    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            'id',
            'name',
            'title',
            'modelClass',
            'relationClass',
            'position',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getRelations()
    {
        return $this->hasMany(Relation::class, ['id' => 'groupId']);
    }
}
