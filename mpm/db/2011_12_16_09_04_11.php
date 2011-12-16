<?php

class Migration_2011_12_16_09_04_11 extends MpmMigration
{

	public function up(PDO &$pdo)
	{
        $pdo->exec("
          DROP TABLE IF EXISTS money
        ");

        $sql = "
            CREATE TABLE `money` (
                  `id` INT(10) NOT NULL AUTO_INCREMENT,
                  `user_id` INT(10) NOT NULL DEFAULT '0',
                  `amount` DECIMAL(10,2) NOT NULL DEFAULT '0',
                  `category_id` INT(10) NOT NULL DEFAULT '0',
                  `trans_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                  PRIMARY KEY (`id`)
            )
            ENGINE=InnoDB
            CHARACTER SET utf8 COLLATE utf8_general_ci
        ";
        $pdo->exec($sql);
	}

	public function down(PDO &$pdo)
	{
        $pdo->exec("
          DROP TABLE IF EXISTS money
        ");

        $sql = "CREATE TABLE `money` (
                  `id` INT(10) NOT NULL AUTO_INCREMENT,
                  `user_id` INT(10) NOT NULL DEFAULT '0',
                  `amount` DECIMAL(10,2) NOT NULL DEFAULT '0',
                  `category_id` INT(10) NOT NULL DEFAULT '0',
                  `trans_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                  PRIMARY KEY (`id`) ) ENGINE=InnoDB";
        $pdo->exec($sql);
	}

}

?>