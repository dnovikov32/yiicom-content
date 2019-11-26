<?php

namespace yiicom\content\common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\db\ActiveQuery;
use yii\behaviors\TimestampBehavior;
use modules\commerce\common\interfaces\ModelStatus;
use modules\commerce\common\interfaces\ModelList;
use modules\commerce\common\interfaces\ModelRelations;
use modules\commerce\common\traits\ModelStatusTrait;
use modules\commerce\common\traits\ModelListTrait;
use modules\commerce\common\traits\ModelRelationsTrait;
use yiicom\content\common\interfaces\ModelPageUrl;
use yiicom\content\common\traits\ModelPageUrlTrait;
use yiicom\content\common\behaviors\PageUrlBehavior;
use modules\files\common\models\File;
use modules\files\common\behaviors\FilesBehavior;

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
            'id' => Yii::t("commerce", "ID"),
			'categoryId' => Yii::t("commerce", "Category ID"),
			'title' => Yii::t("commerce", "Title"),
			'teaser' => Yii::t("commerce", "Teaser"),
			'body' => Yii::t("commerce", "Content"),
			'template' => Yii::t("commerce", "Template"),
            'status' => Yii::t("commerce", "Status"),
            'createdAt' => Yii::t("commerce", "Created At"),
            'updatedAt' => Yii::t("commerce", "Updated At"),
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
        return 'pages/page/view';
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
