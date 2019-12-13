<?php

use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $name string
 * @var $message string
 * @var \Exception $exception
 */

$this->title = Html::encode($name);
$this->params['breadcrumbs'][] = \Yii::t('yiicom', 'Error');

?>

<h1><?php echo Html::encode($name); ?></h1>

<div><?php echo Html::encode($message); ?></div>