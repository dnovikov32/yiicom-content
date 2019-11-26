<?php

use modules\commerce\common\helpers\BooleanHelper;
use yiicom\content\common\models\Page;

/* @var yii\web\View $this */
/* @var yii\bootstrap\ActiveForm $form */
/* @var Page $model */

?>

<div class="card">

	<div class="card-header">Seo настройки страницы</div>

	<div class="card-body">

		<?php echo $form->field($model->url, 'alias')->textInput(['class' => 'form-control js-field-url-alias']); ?>

		<a class="card-link" href="#collapse-params" data-toggle="collapse">Изменить параметры</a>

        <div class="collapse" id="collapse-params">
			<div class="row">
				<div class="col-md-3">
					<?php echo $form->field($model->url, 'route'); ?>
				</div>
				<div class="col-md-6">
					<?php echo $form->field($model->url, 'params'); ?>
				</div>
                <div class="col-md-3">
					<?php echo $form->field($model->url, 'sitemap')->dropDownList(BooleanHelper::getList()); ?>
				</div>
			</div>
		</div>

		<?php echo $form->field($model->url, 'seoTitle'); ?>
		<?php echo $form->field($model->url, 'seoKeywords'); ?>
		<?php echo $form->field($model->url, 'seoDescription')->textarea(); ?>

	</div>

</div>