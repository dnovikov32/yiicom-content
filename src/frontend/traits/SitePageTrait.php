<?php

namespace yiicom\content\frontend\traits;

use Yii;
use yii\db\ActiveRecord;
use yiicom\content\common\models\PageUrl;

trait SitePageTrait
{
    /**
     * Returns Entity model
     * @param string $class
     * @param integer $id
     * @return ActiveRecord
     */
    public abstract function findModel(string $class, int $id);

    /**
     * Returns Entity model and set view seo page params
     * @param string $class
     * @param int $id
     * @return ActiveRecord
     */
    public function loadModel(string $class, int $id)
    {
        $model = $this->findModel($class, $id);

        $this->setMetaParams($model);

        return $model;
    }

    /**
     * Sets page seo meta params (title, keywords and description)
     * @param ActiveRecord $model PageUrl or ActiveRecord class object with PageUrl relation
     * @return bool
     */
    public function setMetaParams(ActiveRecord $model)
    {
        /* @var PageUrl $url */
        $url = null;

        if ($model instanceof PageUrl) {
            $url = $model;
        } elseif (isset($model->url) && $model->url instanceof PageUrl) {
            $url = $model->url;
        }

        if (null === $url) {
            return false;
        }

        $seoTitle = $url->seoTitle;
        if ($seoTitle == false) {
            $seoTitle = $model->title ?? '';
        }

        $this->view->title = $seoTitle;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $url->seoKeywords]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => $url->seoDescription]);

        return true;
    }

    /**
     * @param ActiveRecord $model
     * @param string $default
     * @return string
     */
	public function getTemplate(ActiveRecord $model, string $default = 'view')
	{
	    if (! $model->hasAttribute('template') || empty($model->template)) {
	        return $default;
        }

        $controller = Yii::$app->controller;
        $module = $controller->module;
        $template = "@app/themes/{$module->id}/frontend/views/{$controller->id}/{$model->template}";
        $file = Yii::getAlias("$template.php");

        if (! file_exists($file)) {
            return $default;
        }

        return (string) $model->template;
	}

}
