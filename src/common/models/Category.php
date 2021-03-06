<?php

namespace yiicom\content\common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yiicom\common\traits\ModelRelationsTrait;
use yiicom\common\interfaces\ModelRelations;
use yiicom\common\interfaces\ModelStatus;
use yiicom\common\interfaces\ModelList;
use yiicom\common\traits\ModelStatusTrait;
use yiicom\common\traits\ModelListTrait;
use yiicom\content\common\behaviors\PageUrlBehavior;
use yiicom\content\common\interfaces\ModelPageUrl;
use yiicom\content\common\traits\ModelPageUrlTrait;

/**
 * @property integer $id
 * @property integer $parentId
 * @property string $name
 * @property string $title
 * @property integer $status
 * @property integer $position
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property PageUrl $url
 * @property Category $parent
 */
class Category extends ActiveRecord implements ModelStatus, ModelList, ModelRelations, ModelPageUrl
{
    use ModelStatusTrait, ModelListTrait, ModelRelationsTrait, ModelPageUrlTrait;

    /**
     * @return string
     */
	public static function tableName()
	{
		return '{{%content_category}}';
	}

    /**
     * @return array
     */
	public function rules()
	{
		return array_merge(parent::rules(), [
		    ['parentId', 'integer'],

            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'string', 'max' => 255],

			['title', 'filter', 'filter' => 'trim'],
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
            'id' => Yii::t('yiicom', 'ID'),
			'parentId' => Yii::t('yiicom', 'Parent category'),
            'name' => Yii::t('yiicom', 'Name'),
			'title' => Yii::t('yiicom', 'Title'),
            'status' => Yii::t('yiicom', 'Status'),
            'position' => Yii::t('yiicom', 'Position'),
            'createdAt' => Yii::t('yiicom', 'Created At'),
            'updatedAt' => Yii::t('yiicom', 'Updated At'),
		]);
	}

    /**
     * @inheritDoc
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
            'PageUrlBehavior' => [
                'class' => PageUrlBehavior::class,
            ],
        ]);
    }

    /**
     * @inheritDoc
     */
    public function route()
    {
        return 'content/category/view';
    }

    /**
     * @return array
     */
    public function relations()
    {
        return [
            'PageUrl' => [
                'class' => PageUrl::class,
                'attribute' => 'url',
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            'id',
            'parentId',
            'name',
            'title',
            'status',
            'position',
            'url',
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
            ->alias('content_category_parent');
    }
}
