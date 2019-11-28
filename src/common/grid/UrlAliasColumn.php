<?php

namespace yiicom\content\common\grid;

use Yii;
use yii\grid\DataColumn;
use yii\helpers\Html;

class UrlAliasColumn extends DataColumn
{
    /**
     * {@inheritdoc}
     */
    public $header = 'Alias';

    public function init()
    {
        parent::init();

        $this->header = Yii::t('yiicom/content', 'Alias');
    }

    /**
     * {@inheritdoc}
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        $alias = $model->url->alias ?? null;

        if (! $alias) {
            return null;
        }

        return Html::a($alias, Yii::getAlias("@frontendWeb/$alias"), [
            'title' => Yii::t('yiicom/content', 'Open page in new window'),
            'target' => '_blank'
        ]);
    }
}
