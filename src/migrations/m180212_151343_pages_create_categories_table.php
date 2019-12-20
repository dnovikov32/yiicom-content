<?php

use yii\db\Migration;

/**
 * Class m180212_151343_pages_create_categories_table
 */
class m180212_151343_pages_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pages_categories}}', [
            'id' => $this->primaryKey(),
            'parentId' => $this->integer(),
            'name' => $this->string()->notNull(),
            'title' => $this->string(),
            'status' => $this->tinyInteger(1)->defaultValue(1),
            'position' => $this->tinyInteger(3)->defaultValue(0),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->addForeignKey('{{%fk-pages_categories-pages_categories}}',
            '{{%pages_categories}}', 'parentId',
            '{{%pages_categories}}', 'id',
            'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-pages_categories-pages_categories}}', '{{%pages_categories}}');

        $this->dropTable('{{%pages_categories}}');
    }
}
