<?php

use yii\db\Migration;

class m180213_064044_content_create_table_url extends Migration
{
    public function up()
    {
        $this->createTable('{{%content_url}}', [
            'id' => $this->primaryKey(),
            'alias' => $this->string()->unique()->notNull(),
            'modelId' => $this->integer()->defaultValue(0),
            'modelClass' => $this->string(),
            'route' => $this->string(),
            'params' => $this->string(),
            'view' => $this->string(),
            'seoTitle' => $this->string(),
            'seoKeywords' => $this->string(),
            'seoDescription' => $this->string(),
            'sitemap' => $this->boolean()->defaultValue(false),
            'status' => $this->tinyInteger(1)->defaultValue(1),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ], 'ENGINE=InnoDB CHARSET=utf8');
    }

    public function down()
    {
        $this->dropTable('{{%content_url}}');
    }
}
