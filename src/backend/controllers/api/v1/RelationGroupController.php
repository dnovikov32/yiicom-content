<?php

namespace yiicom\content\backend\controllers\api\v1;

use Yii;
use yii\helpers\Html;
use yii\web\ServerErrorHttpException;
use yiicom\backend\base\ApiController;
use yiicom\common\traits\ModelTrait;
use yiicom\common\collection\Collection;
use yiicom\content\backend\models\RelationGroupSearch;
use yiicom\content\common\models\RelationGroup;
use yiicom\content\common\relations\RelationModelFinder;

class RelationGroupController extends ApiController
{
    use ModelTrait;

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RelationGroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->route = '#/content/relation-group/index';

        return $this->renderPartial('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'columns' => $this->getGridColumns(),
        ]);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getGridColumns()
    {
        $relationModels = (new RelationModelFinder(\Yii::$app))->findInVendorModules();

        return [
            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'wpx-70'],
            ],
            [
                'attribute' => 'title',
            ],
            [
                'attribute' => 'name',
            ],
            [
                'attribute' => 'modelClass',
                'filter' => $relationModels,
                'value' => function(RelationGroupSearch $model) use ($relationModels) {
                    return $relationModels[$model->modelClass] ?? '';
                }
            ],
            [
                'attribute' => 'relationClass',
                'filter' => $relationModels,
                'value' => function(RelationGroupSearch $model) use ($relationModels) {
                    return $relationModels[$model->relationClass] ?? '';
                }
            ],
            [
                'attribute' => 'position',
            ],
        ];
    }

    public function actionFind(int $id = null)
    {
        try {
            /* @var RelationGroup $model */
            $model = $this->findOrNewModel(RelationGroup::class, $id);

            return $model;

        } catch (\Throwable $e) {
            throw new ServerErrorHttpException(Yii::t("yiicom", "Server error: ") . $e->getMessage());
        }
    }

    public function actionSave()
    {
        try {
            /* @var RelationGroup $model */
            $id = Yii::$app->request->post('id');
            $model = $this->findOrNewModel(RelationGroup::class, $id);

            if ($model->load(Yii::$app->request->post(), '') && $model->validate()) {
                if (! $model->save()) {
                    throw new ServerErrorHttpException(Yii::t("yiicom", "Can't save model"));
                }
            }

            return $model;

        } catch (\Throwable $e) {
            throw new ServerErrorHttpException(Yii::t("yiicom", "Server error: ") . $e->getMessage());
        }
    }

    /**
     * @return array
     * @throws ServerErrorHttpException
     */
    public function actionDelete()
    {
        try {
            /* @var RelationGroup $model */
            $id = Yii::$app->request->post('id');
            $model = $this->findModel(RelationGroup::class, $id);

            if ($model->delete()) {
                return ['status' => 'success'];
            }

            throw new ServerErrorHttpException(Yii::t("yiicom", "Can't delete model"));

        } catch (\Throwable $e) {
            throw new ServerErrorHttpException(Yii::t("yiicom", "Server error: ") . $e->getMessage());
        }
    }

    public function actionList()
    {
        return RelationGroup::find()
            ->orderBy('position')
            ->all();
    }

}
