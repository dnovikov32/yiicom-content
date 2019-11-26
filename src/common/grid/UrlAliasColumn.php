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

        $this->header = Yii::t('pages', 'Alias');
    }

    /**
     * {@inheritdoc}
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        $alias = $model->url->alias ?? null;

        if (null === $alias) {
            return null;
        }

        return Html::a($alias, Yii::getAlias("@frontendWeb/$alias"), [
            'title' => Yii::t('pages', 'Open page in new window'),
            'target' => '_blank'
        ]);
    }
}
