<?php

use yii\db\Migration;

class m180213_054044_pages_create_pages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(),
            'categoryId' => $this->integer(),
            'title' => $this->string(),
            'teaser' => $this->text(),
            'body' => $this->text(),
            'template' => $this->string(64),
            'status' => $this->tinyInteger(1)->defaultValue(1),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->addForeignKey('{{%fk-pages-pages_categories}}',
            '{{%pages}}', 'categoryId',
            '{{%pages_categories}}', 'id',
            'RESTRICT', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-pages-pages_categories}}', '{{%pages}}');

        $this->dropTable('{{%pages}}');
    }
}
