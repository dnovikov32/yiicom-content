<?php

namespace yiicom\content\common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yiicom\common\interfaces\ModelStatus;
use yiicom\common\traits\ModelStatusTrait;
use yiicom\content\common\validators\UrlValidator;

/**
 * @property string $alias
 * @property integer $modelId
 * @property string $modelClass
 * @property string $route
 * @property string $params
 * @property string $view
 * @property string $seoTitle
 * @property string $seoKeywords
 * @property string $seoDescription
 * @property integer $sitemap
 * @property integer $status
 * @property string $createdAt
 * @property string $updatedAt
 */
class PageUrl extends ActiveRecord implements ModelStatus
{
    use ModelStatusTrait;

    /**
     * @return string
     */
	public static function tableName()
	{
		return '{{%content_url}}';
	}

    /**
     * @return object|\yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public static function find()
    {
        return Yii::createObject(PageUrlQuery::class, [get_called_class()]);
    }

    /**
     * @return array
     */
	public function rules()
	{
		return [
            ['alias', 'string', 'max' => 255],
            ['alias', UrlValidator::class],
            ['alias', 'default', 'value' => ''],
			['alias', 'unique', 'targetClass' => self::class, 'skipOnEmpty' => false],

			['modelId', 'integer'],
			['modelId', 'default', 'value' => 0],

			['modelClass', 'string', 'max' => 255],

			['route', 'filter', 'filter' => 'trim'],
            ['route', 'filter', 'filter' => 'strtolower'],
//			['route', 'required'], // TODO: required on index page update
			['route', 'string', 'max' => 255],

			['params', 'filter', 'filter' => 'trim'],
			['params', 'string', 'max' => 255],

            ['view', 'filter', 'filter' => 'trim'],
            ['view', 'filter', 'filter' => 'strtolower'],
            ['view', 'string', 'max' => 255],

			['seoTitle', 'filter', 'filter' => 'trim'],
			['seoTitle', 'string', 'max' => 255],

			['seoKeywords', 'filter', 'filter' => 'trim'],
			['seoKeywords', 'string', 'max' => 255],

			['seoDescription', 'filter', 'filter' => 'trim'],
			['seoDescription', 'string', 'max' => 255],

            ['sitemap', 'boolean'],

			['status', 'in', 'range' => $this->statusesOptions()],

            [['createdAt', 'updatedAt'], 'safe'],
		];
	}

    /**
     * @return array
     */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'alias' => 'Адрес страницы',
			'route' => 'Путь в системе',
			'params' => 'Параметры',
            'view' => 'Шаблон',
			'seoTitle' => 'Заголовок страницы',
			'seoKeywords' => 'Ключевые слова',
			'seoDescription' => 'Описание страницы',
            'sitemap' => 'Добавлять в sitemap.xml',
			'status' => 'Статус',
            'createdAt' => 'Дата публикации',
			'updatedAt' => 'Дата обновления',
		];
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
            'alias',
            'route',
            'params',
            'seoTitle',
            'seoKeywords',
            'seoDescription',
        ];
    }

}