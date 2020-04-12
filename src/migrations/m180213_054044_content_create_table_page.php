<?php

use yii\db\Migration;

class m180213_054044_content_create_table_page extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%content_page}}', [
            'id' => $this->primaryKey(),
            'categoryId' => $this->integer(),
            'name' => $this->string()->notNull(),
            'title' => $this->string(),
            'teaser' => $this->text(),
            'body' => $this->text(),
            'template' => $this->string(64),
            'status' => $this->tinyInteger(1)->defaultValue(1),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->addForeignKey('{{%fk-content_page-content_category}}',
            '{{%content_page}}', 'categoryId',
            '{{%content_category}}', 'id',
            'RESTRICT', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-content_page-content_category}}', '{{%content_page}}');

        $this->dropTable('{{%content_page}}');
    }
}
