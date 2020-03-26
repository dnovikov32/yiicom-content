<?php

use yii\web\View;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\bootstrap4\LinkPager;
use yiicom\content\common\models\Category;
use yiicom\content\common\models\Page;
use yiicom\files\common\widgets\ImageWidget;

/**
 * @var View $this
 * @var Category $category
 * @var Page[] $pages
 * @var Pagination $pagination
 */

$this->params['breadcrumbs'][] = Html::encode($category->title ? $category->title : $category->name);

?>

<h1><?php echo Html::encode($category->title ? $category->title : $category->name); ?></h1>

<?php if (! $pages) : ?>

    <p>Пока нет</p>

<?php else : ?>

    <?php foreach ($pages as $page) : ?>

        <div class="mb-5 page-card">

            <h2 class="page-card__title">
                <a href="/<?= $page->url->alias; ?>"><?= $page->title ? Html::encode($page->title) : $page->name; ?></a>
            </h2>

            <div class="page-card__date"><?= \Yii::$app->formatter->asDate($page->createdAt, 'short') ?></div>

            <div class="row mb-5">

                <div class="col-md-3 mb-3">
                    <?php if ($page->files) : ?>
                        <?php echo ImageWidget::widget([
                            'images' => $page->files[0],
                            'preset' => '266x220',
                            'options' => ['class' => 'img-fluid'],
                            'linkOptions' => [
                                'href' => $page->url->alias,
                            ],

                        ]); ?>
                    <?php endif; ?>
                </div>

                <div class="col-md-9 mb-3">
                    <div class="page-card__teaser">
                        <?= $page->teaser; ?>
                    </div>

                    <a class="page-card__link" href="/<?= $page->url->alias; ?>">Подробнее &rarr;</a>
                </div>


            </div>

        </div>

    <?php endforeach; ?>

<?php endif; ?>

<?= LinkPager::widget([
    'pagination' => $pagination
]); ?>
