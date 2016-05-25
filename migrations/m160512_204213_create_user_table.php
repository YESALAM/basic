<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user_table`.
 */
class m160512_204213_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

        $this->dropTable('{{%user}}');
        $this->dropTable('{{%faculty}}');
        $this->dropTable('{{%batch}}');
        $this->dropTable('{{%student}}');
        $this->dropTable('{{%subject}}');
        $this->dropTable('{{%attendance}}');
        $this->dropTable('{{%facultyAllotment}}');

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'user_level' => $this->integer(1)->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%faculty}}',[
            'email' => $this->string()->notNull()->unique(),
            'name' => $this->string()->notNull(),
            'department' => $this->string(5),
        ],$tableOptions);

        $this->createTable('{{%class}}',[
            'class_id' => $this->primaryKey(),
            'course' => $this->string(),
            'semester' => $this->integer(1),
            'section' => $this->char(1),
        ],$tableOptions);

        $this->createTable('{{%student}}',[
            'enroll' => $this->string()->unique()->notNull(),
            'class_id' => $this->integer(),
            'name' => $this->string(),
        ],$tableOptions);

        $this->createTable('{{%subject}}',[
            'subject_id' => $this->string(5),
            'subject_name' => $this->string(),
        ],$tableOptions);

        $this->createTable('{{%attendance}}',[
            'date' => $this->date(),
            'email' => $this->string(),
            'enroll' => $this->string(),
            'status' => $this->char(1),
            'remark' => $this->string(),
        ],$tableOptions);

        $this->createTable('{{%facultyAllotment}}',[
            'id' => $this->primaryKey() ,
            'email' => $this->string(),
            'class_id' => $this->integer(),
            'subject_id' => $this->string(5),
        ],$tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%faculty}}');
        $this->dropTable('{{%batch}}');
        $this->dropTable('{{%student}}');
        $this->dropTable('{{%subject}}');
        $this->dropTable('{{%attendance}}');
        $this->dropTable('{{%facultyAllotment}}');
    }
}
