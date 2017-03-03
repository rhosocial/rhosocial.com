<?php

namespace common\migrations;

use common\components\mysql\Migration;

class M170303080503CreateUserTable extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = "ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='User'";
        }
        $this->createTable('{{%user}}', [
            'guid' => $this->varbinary(16)->comment('User GUID')->notNull(),
            'id' => $this->varchar(16)->notNull()->comment('User ID No.')->append('COLLATE utf8_unicode_ci'),
            'pass_hash' => $this->varchar(80)->notNull()->comment('Password Hash')->append('COLLATE utf8_unicode_ci'),
            'ip' => $this->varbinary(16)->notNull()->defaultValue(0)->comment('IP Address'),
            'ip_type' => $this->integer(3)->unsigned()->notNull()->defaultValue(4)->comment('IP Address Type'),
            'created_at' => $this->dateTime()->notNull()->defaultValue('1970-01-01 00:00:00')->comment('Created At'),
            'updated_at' => $this->dateTime()->notNull()->defaultValue('1970-01-01 00:00:00')->comment('Updated At'),
            'auth_key' => $this->varchar(255)->notNull()->defaultValue('')->comment('Authentication Key')->append('COLLATE utf8_unicode_ci'),
            'access_token' => $this->varchar(255)->notNull()->defaultValue('')->comment('Access Token')->append('COLLATE utf8_unicode_ci'),
            'password_reset_token' => $this->varchar(255)->notNull()->defaultValue('')->comment('Password Reset Token')->append('COLLATE utf8_unicode_ci'),
            'status' => $this->integer(3)->unsigned()->notNull()->defaultValue(1)->comment('Status'),
            'type' => $this->integer(3)->unsigned()->notNull()->defaultValue(0)->comment('Type'),
            'source' => $this->varchar(255)->notNull()->defaultValue('')->comment('Source')->append('COLLATE utf8_unicode_ci'),
        ], $tableOptions);
        $this->addPrimaryKey('user_guid_pk', '{{%user}}', 'guid');
        $this->createIndex('user_id_unique', '{{%user}}', 'id', true);
        $this->createIndex('user_auth_key_normal', '{{%user}}', 'auth_key');
        $this->createIndex('user_access_token_normal', '{{%user}}', 'access_token');
        $this->createIndex('user_password_reset_token_normal', '{{%user}}', 'password_reset_token');
        $this->createIndex('user_created_at_normal', '{{%user}}', 'created_at');
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
