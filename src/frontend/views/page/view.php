<?php

use yii\web\View;
use yii\helpers\Html;
use yiicom\content\common\models\Page;
use yiicom\content\common\models\Category;

/**
 * @var View $this
 * @var Page $page
 * @var Page|null $prevPage
 * @var Page|null $nextPage
 * @var Category|null $category
 */

if ($category) {
    $this->params['breadcrumbs'][] = [
        'label' => Html::encode($category->title ?: $category->name),
        'url' => "/{$category->url->alias}"
    ];
}

$this->params['breadcrumbs'][] = Html::encode($page->title ?: $page->name);

?>

<h1><?php echo Html::encode($page->title ?: $page->name); ?></h1>

<?php echo $page->body; ?>

<?php if ($category) : ?>
    <div class="row mt-5">
        <div class="col-md-6 text-left">
            <?php if ($prevPage) : ?>
                <a href="/<?= $prevPage->url->alias; ?>">&larr; <?= $prevPage->title ? Html::encode($prevPage->title) : Html::encode($prevPage->name); ?></a>
            <?php endif; ?>
        </div>
        <div class="col-md-6 text-right">
            <?php if ($nextPage) : ?>
                <a href="/<?= $nextPage->url->alias; ?>"><?= $nextPage->title ? Html::encode($nextPage->title) : Html::encode($nextPage->name); ?> &rarr;</a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
