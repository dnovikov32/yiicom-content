<?php

use yii\helpers\Html;
use yiicom\content\common\models\Category;

/**
 * @var \yii\web\View $this
 * @var Category $category
 */
$this->params['breadcrumbs'][] = Html::encode($category->title ? $category->title : $category->name);
?>

<h1><?php echo Html::encode($category->title ? $category->title : $category->name); ?></h1>

<?php //echo $category->teaser; ?>
