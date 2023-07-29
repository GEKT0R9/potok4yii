<?php

use yii\db\Migration;

/**
 * Class m230729_120618_FileTable
 */
class m230729_120618_FileTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('files', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'type' => $this->string(100)->notNull(),
            'size' => $this->integer()->notNull(),
            'content' => $this->binary()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('files');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230729_120618_FileTable cannot be reverted.\n";

        return false;
    }
    */
}
