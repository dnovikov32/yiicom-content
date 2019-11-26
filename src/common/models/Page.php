<?php

namespace yiicom\content\common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\db\ActiveQuery;
use yii\behaviors\TimestampBehavior;
use yiicom\common\interfaces\ModelStatus;
use yiicom\common\interfaces\ModelList;
use yiicom\common\interfaces\ModelRelations;
use yiicom\common\traits\ModelStatusTrait;
use yiicom\common\traits\ModelListTrait;
use yiicom\common\traits\ModelRelationsTrait;
use yiicom\content\common\interfaces\ModelPageUrl;
use yiicom\content\common\traits\ModelPageUrlTrait;
use yiicom\content\common\behaviors\PageUrlBehavior;
use yiicom\files\common\models\File;
use yiicom\files\common\behaviors\FilesBehavior;

/**
 * @property integer $id
 * @property integer $categoryId
 * @property string $title
 * @property string $teaser
 * @property string $body
 * @property string $template
 * @property integer $status
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property PageUrl $url
 * @property File[] $files
 * @property Category $category
 */
class Page extends ActiveRecord implements ModelStatus, ModelList, ModelRelations, ModelPageUrl
{
    use ModelStatusTrait, ModelListTrait, ModelRelationsTrait, ModelPageUrlTrait;

    /**
     * @return string
     */
	public static function tableName()
	{
		return '{{%pages}}';
	}

    /**
     * @return array
     */
	public function rules()
	{
		return array_merge(parent::rules(), [
		    ['categoryId', 'integer'],

			['title', 'filter', 'filter' => 'trim'],
			['title', 'required'],
			['title', 'string', 'max' => 255],

            ['teaser', 'safe'],

            ['body', 'safe'],

			['template', 'filter', 'filter' => 'trim'],
			['template', 'string', 'max' => 64],

            ['status', 'in', 'range' => $this->statusesOptions()],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],

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
			'categoryId' => Yii::t("yiicom", "Category ID"),
			'title' => Yii::t("yiicom", "Title"),
			'teaser' => Yii::t("yiicom", "Teaser"),
			'body' => Yii::t("yiicom", "Content"),
			'template' => Yii::t("yiicom", "Template"),
            'status' => Yii::t("yiicom", "Status"),
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
            ],
            'PageUrlBehavior' => [
                'class' => PageUrlBehavior::class,
            ],
            'FilesBehavior' => [
                'class' => FilesBehavior::class,
            ]
        ]);
    }

    /**
     * @return string
     */
    public function route()
    {
        return 'content/page/view';
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
            'Files' => [
                'class' => File::class,
                'attribute' => 'files',
                'multiple' => true,
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
            'categoryId',
            'title',
            'teaser',
            'body',
            'template',
            'status',
            'url',
            'files'
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'categoryId']);
    }
}
