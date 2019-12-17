<?php

namespace yiicom\content\common\validators;

use yii\validators\Validator;

/**
 * @inheritdoc
 */
class UrlValidator extends Validator
{
    /**
     * @var bool
     */
    public $filter = true;

    /**
     * @inheritdoc
     */
    public function validateAttribute($model, $attribute)
    {
        if ($this->filter) {
            $model->$attribute = $this->filter($model->$attribute);
        }

        if (! preg_match('/^[\w\-\.\/]+$/', $model->$attribute)) {
            $model->addError($attribute, 'Неверный формат (доступны: буквы, цифры, "-", ".", "/"');

            return false;
        }

        return true;
    }

    /**
     * @param string $value
     * @return string
     */
    public function filter(string $value)
    {
        $value = mb_strtolower($value);
        $value = trim($value);
        $value = str_replace(['_', ' '], '-', $value);
        $value = preg_replace('/(\/+)/', '/', $value);
        $value = trim($value, '/');

        return $value;
    }
}
