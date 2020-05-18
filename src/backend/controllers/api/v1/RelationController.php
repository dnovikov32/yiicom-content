<?php

namespace yiicom\content\backend\controllers\api\v1;

use Yii;
use yii\helpers\Html;
use yii\web\ServerErrorHttpException;
use yiicom\backend\base\ApiController;
use yiicom\common\collection\Collection;

class RelationController extends ApiController
{
    /**
     * @param string $relationClass
     * @return array
     * @throws \ReflectionException
     */
    public function actionList(string $relationClass)
    {
        $collection = new Collection($relationClass);

        return $collection->asArray();
    }
}
