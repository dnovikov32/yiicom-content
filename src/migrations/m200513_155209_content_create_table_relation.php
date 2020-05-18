<?php

use yii\db\Migration;

class m200513_155209_content_create_table_relation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%content_relation}}', [
            'id' => $this->primaryKey(),
            'groupId' => $this->integer()->notNull(),
            'modelId' => $this->integer()->notNull(),
            'modelClass' => $this->string()->notNull(),
            'relationId' => $this->integer()->notNull(),
            'position' => $this->tinyInteger(3)->defaultValue(0),
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->addForeignKey('{{%fk-content_relation-content_relation_group}}',
            '{{%content_relation}}', 'groupId',
            '{{%content_relation_group}}', 'id',
            'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('{{%fk-content_relation-content_relation_group}}', '{{%content_relation}}');

        $this->dropTable('{{%content_relation}}');
    }
}
