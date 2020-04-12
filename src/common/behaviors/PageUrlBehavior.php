<?php

namespace yiicom\content\common\behaviors;

use yii\base\Behavior;
use yii\db\ActiveQuery;
use yii\helpers\Json;
use yiicom\common\models\ActiveRecord;
use yiicom\content\common\interfaces\ModelPageUrl;
use yiicom\content\common\models\PageUrl;

class PageUrlBehavior extends Behavior
{
    /**
     * @inheritdoc
     */
	public function events()
	{
		return [
			ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
			ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
			ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete'
		];
	}

    /**
     * @return int
     */
	public function afterDelete()
	{
        /* @var ActiveRecord|ModelPageUrl $owner */
        $owner = $this->owner;

 		return PageUrl::deleteAll([
            'modelId' => $owner->id,
			'modelClass' => $owner->getModelClass(),
        ]);
	}

	/**
	 * @return boolean
	 */
	public function afterSave()
	{
	    /* @var ActiveRecord|ModelPageUrl $owner */
        $owner = $this->owner;
        $url = $owner->url;

        $url->modelId = $owner->id;
        $url->modelClass = $owner->getModelClass();

		if (empty($url->route)) {
            $url->route = $owner->route();
		}

		if (empty($url->params)) {
            $url->params = Json::encode(['id' => $owner->id]);
		}

		if (false === $url->save()) {
            $owner->addErrors($url->getErrors());

			return false;
		}

		return true;
	}

    /**
     * @return ActiveQuery
     */
    public function getUrl()
    {
        /* @var ActiveRecord|ModelPageUrl $owner */
        $owner = $this->owner;

        return $owner->hasOne(PageUrl::class, ['modelId' => 'id'])
            ->onCondition(['{{%content_url}}.modelClass' => $owner->getModelClass()]);
    }

    /**
     * TODO: setter doesn't need with populateRelations?
     * @param PageUrl $value
     */
    public function setUrl(PageUrl $value)
    {
        $this->url = $value;
    }

}