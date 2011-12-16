<?php

class Migration_2011_12_16_08_10_06 extends MpmMigration
{

	public function up(PDO &$pdo)
	{
        $sql = "CREATE TABLE `money` (
                  `id` INT(10) NOT NULL AUTO_INCREMENT,
                  `user_id` INT(10) NOT NULL DEFAULT '0',
                  `amount` DECIMAL(10,2) NOT NULL DEFAULT '0',
                  `category_id` INT(10) NOT NULL DEFAULT '0',
                  `trans_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                  PRIMARY KEY (`id`) ) ENGINE=InnoDB";
        $pdo->exec($sql);
	}

	public function down(PDO &$pdo)
	{
        $sql = "DROP TABLE IF EXISTS money";
        $pdo->exec($sql);
	}

}

?>