<?php

use yii\db\Migration;

class m200513_154952_content_create_table_relation_group extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%content_relation_group}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'modelClass' => $this->string()->notNull(),
            'relationClass' => $this->string()->notNull(),
            'position' => $this->tinyInteger(3)->defaultValue(0),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ], 'ENGINE=InnoDB CHARSET=utf8');
    }

    public function safeDown()
    {
        $this->dropTable('{{%content_relation_group}}');
    }
}
