<?php

class Migration_2011_12_16_09_01_05 extends MpmMigration
{

	public function up(PDO &$pdo)
	{
        $pdo->exec("
            DROP TABLE `categories`
        ");

        $pdo->exec("
            create table `categories` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `name` char(255) NOT NULL,
            PRIMARY KEY (`id`)
            )
            ENGINE=InnoDB
            CHARACTER SET utf8 COLLATE utf8_general_ci
        ");
	}

	public function down(PDO &$pdo)
	{
        $pdo->exec("
            DROP TABLE `categories`
        ");
        $pdo->exec("
            create table `categories` (
            `id` INT NOT NULL,
            `name` char(255) NOT NULL,
            PRIMARY KEY (`id`)
            )
            ENGINE=InnoDB
        ");
	}

}

?>