<?php

namespace yiicom\content\common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yiicom\common\interfaces\ModelStatus;
use yiicom\common\interfaces\ModelList;
use yiicom\common\traits\ModelStatusTrait;
use yiicom\common\traits\ModelListTrait;

/**
 * @property integer $id
 * @property integer $parentId
 * @property string $title
 * @property integer $status
 * @property integer $position
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Category $parent
 */
class Category extends ActiveRecord implements ModelStatus, ModelList
{
    use ModelStatusTrait, ModelListTrait;

    /**
     * @return string
     */
	public static function tableName()
	{
		return '{{%pages_categories}}';
	}

    /**
     * @return array
     */
	public function rules()
	{
		return array_merge(parent::rules(), [
		    ['parentId', 'integer'],

			['title', 'filter', 'filter' => 'trim'],
			['title', 'required'],
			['title', 'string', 'max' => 255],

            ['status', 'in', 'range' => $this->statusesOptions()],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],

            ['position', 'integer'],
            ['position', 'default', 'value' => 0],

            [['createdAt', 'updatedAt'], 'safe'],
		]);
	}

    /**
     * @return array
     */
	public function attributeLabels()
	{
		return array_merge(parent::attributeLabels(), [
            'id' => Yii::t("yiicom", "ID"),
			'parentId' => Yii::t("yiicom", "Parent category"),
			'title' => Yii::t("yiicom", "Title"),
            'status' => Yii::t("yiicom", "Status"),
            'position' => Yii::t("yiicom", "Position"),
            'createdAt' => Yii::t("yiicom", "Created At"),
            'updatedAt' => Yii::t("yiicom", "Updated At"),
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
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            'id',
            'parentId',
            'title',
            'status',
            'position',
        ];
    }

    /**
     * @inheritDoc
     */
    public function beforeDelete()
    {
        if (! parent::beforeDelete()) {
            return false;
        }

        Category::updateAll(['parentId' => null], ['parentId' => $this->id]);
        Page::updateAll(['categoryId' => null], ['categoryId' => $this->id]);

        return true;
    }

    /**
     * @return ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::class, ['id' => 'parentId'])
            ->alias('pages_categories_parent');
    }
}
