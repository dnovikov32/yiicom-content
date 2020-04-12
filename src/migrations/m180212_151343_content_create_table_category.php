<?php

use yii\db\Migration;

class m180212_151343_content_create_table_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%content_category}}', [
            'id' => $this->primaryKey(),
            'parentId' => $this->integer(),
            'name' => $this->string()->notNull(),
            'title' => $this->string(),
            'status' => $this->tinyInteger(1)->defaultValue(1),
            'position' => $this->tinyInteger(3)->defaultValue(0),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->addForeignKey('{{%fk-content_category-content_category}}',
            '{{%content_category}}', 'parentId',
            '{{%content_category}}', 'id',
            'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-content_category-content_category}}', '{{%content_category}}');

        $this->dropTable('{{%content_category}}');
    }
}
