<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m200414_195530_add_access_token_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%user}}', 'access_token', $this->string()->defaultValue(null));
        $this->createIndex('{{%user_access_token}}', '{{%user}}', 'access_token', true);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropIndex(
            '{{%user_access_token}}',
            '{{%user}}'
        );
        $this->dropColumn('{{%user}}', 'access_token');
    }
}
