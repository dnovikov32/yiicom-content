<?php

use yii\helpers\Html;
use yiicom\content\common\models\Page;

/**
 * @var \yii\web\View $this
 * @var Page $page
 */

?>

<h1><?php echo Html::encode($page->title); ?></h1>

<?php echo $page->body; ?>
