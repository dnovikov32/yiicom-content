<?php

namespace yiicom\content\backend\controllers\api\v1;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\ServerErrorHttpException;
use yiicom\backend\base\ApiController;
use yiicom\common\traits\ModelTrait;
use yiicom\content\common\models\Page;
use yiicom\content\common\models\Category;
use yiicom\content\backend\models\PageSearch;
use yiicom\content\common\grid\UrlAliasColumn;

class PageController extends ApiController
{
    use ModelTrait;

    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->route = '#/content/page/index';

        return $this->renderPartial('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'columns' => $this->getGridColumns(),
        ]);
    }

    /**
     * @return array
     */
    public function getGridColumns()
    {
        return [
            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'wpx-70'],
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function(Page $model) {
                    return Html::a($model->title, Url::to(['/#/content/page/update', 'id' => $model->id]));
                }
            ],
            [
                'attribute' => 'alias',
                'class' => UrlAliasColumn::class
            ],
            [
                'attribute' => 'categoryId',
                'format' => 'html',
                'filter' => (new Category)->getList(),
                'value' => function(Page $model) {
                    $category = $model->category;

                    return $category
                        ? Html::a($category->title, Url::to(['/#/content/category/update', 'id' => $category->id]))
                        : null;
                }
            ],
            'template',
        ];
    }

    public function actionFind(int $id = null)
    {
        try {
            return $this->findOrNewModel(Page::class, $id);
        } catch (\Throwable $e) {
            throw new ServerErrorHttpException(Yii::t("yiicom", "Server error: ") . $e->getMessage());
        }
    }

    public function actionSave()
    {
        try {
            /* @var Page $model */
            $id = Yii::$app->request->post('id');
            $model = $this->findOrNewModel(Page::class, $id);

            if ($model->loadAll(Yii::$app->request->post()) && $model->validateAll()) {
                if (! $model->save(false)) {
                    throw new ServerErrorHttpException(Yii::t("yiicom", "Can't save model"));
                }
            }

            return $model;

        } catch (\Throwable $e) {
            throw new ServerErrorHttpException(Yii::t("yiicom", "Server error: ") . $e->getMessage());
        }
    }

    public function actionDelete()
    {
        try {
            /* @var Page $model */
            $id = Yii::$app->request->post('id');
            $model = $this->findModel(Page::class, $id);

            if ($model->delete()) {
                return ['status' => 'success'];
            }

            throw new ServerErrorHttpException(Yii::t("yiicom", "Can't delete model"));

        } catch (\Throwable $e) {
            throw new ServerErrorHttpException(Yii::t("yiicom", "Server error: ") . $e->getMessage());
        }
    }


}
