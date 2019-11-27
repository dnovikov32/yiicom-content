<?php

use yii\web\View;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yiicom\content\backend\models\PageSearch;
use yiicom\backend\grid\ActionColumn;

/**
 * @var View $this
 * @var PageSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 * @var array $columns
 */

?>

<?php echo GridView::widget([
    'id' => 'grid-pages',
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => array_merge(
        $columns, [
        [
			'class' => ActionColumn::class,
			'template' => '{view} {update} {delete}',
			'controller' => '/#/content/page',
            'headerOptions' => ['class' => 'wpx-75'],
			'buttons' => [
				'view' => function($url, $model) {
                    $alias = $model->url->alias ?? null;
                    $link = $alias ? \Yii::getAlias("@frontendWeb/{$alias}") : $url;

					return Html::a('<i class="fa fa-eye"></i>', $link, ['target' => 'blank']);
				}
			]
        ]
    ]),
]); ?>
