<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m170822_150410_create_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
            'date' => $this->date(),
            'user_id' => $this->integer(),
            'article_id' => $this->integer(),
            'status' => $this->integer()
        ]);

        $this->createIndex(
            'inx-post-user-id',
            'comment',
            'user_id'
        );

        $this->addForeignKey(
            'fk-post-user-id',
            'comment',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'inx-post-article-id',
            'comment',
            'article_id'
        );

        $this->addForeignKey(
            'fk-article-id',
            'comment',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comment');
    }
}
