<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subscriber}}`.
 */
class m230303_110509_create_subscriber_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subscriber}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->comment('Получатель')->notNull(),
            'event_id' => $this->integer()->unsigned()->notNull()->comment('Событие'),
            'is_blocked' => $this->integer(1)->unsigned()->notNull()->defaultValue(0)->comment('Заблокирован'),
            'created_at' => $this->dateTime()->comment('Дата добавления'),
            'updated_at' => $this->dateTime()->comment('Дата редактирования')
        ]);
        $this->createIndex('u_event_email', 'subscriber', ['email', 'event_id'], true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subscriber}}');
    }
}
