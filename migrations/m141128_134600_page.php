<?php

use yii\db\Schema;
use yii\db\Migration;

class m141128_134600_page extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            '{{%page}}',
            [
                'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'name' => 'varchar(64) NOT NULL DEFAULT \'\'',
                'title' => 'varchar(128) NOT NULL DEFAULT \'\'',
                'text' => 'longtext NOT NULL',
                'template' => 'varchar(32) NOT NULL DEFAULT \'\'',
                'description' => 'varchar(256) NOT NULL DEFAULT \'\'',
                'keywords' => 'varchar(256) NOT NULL DEFAULT \'\'',
                'active' => 'enum(\'0\',\'1\') NOT NULL DEFAULT \'0\'',
                'language' => 'varchar(8) NOT NULL DEFAULT \'\'',
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );

        $this->createIndex('UNIQUE', '{{%page}}', ['name', 'language'], true);
        $this->createIndex('language', '{{%page}}', ['language']);
        $this->createIndex('active', '{{%page}}', ['active']);

        $this->addForeignKey('page_ibfk_1', '{{%page}}', 'language', '{{%language}}', 'iso', 'CASCADE', 'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropForeignKey('page_ibfk_1', '{{%page}}');
        $this->dropTable('{{%page}}');
    }
}
