<?php

use yii\web\View;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yiicom\backend\grid\ActionColumn;
use yiicom\content\backend\models\RelationGroupSearch;

/**
 * @var View $this
 * @var RelationGroupSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 * @var array $columns
 */

?>

<?php echo GridView::widget([
    'id' => 'grid-relation-group',
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => array_merge(
        $columns, [
        [
			'class' => ActionColumn::class,
			'template' => '{update} {delete}',
			'controller' => '/#/content/relation-group',
            'headerOptions' => ['class' => 'wpx-75'],
        ]
    ]),
]); ?>
