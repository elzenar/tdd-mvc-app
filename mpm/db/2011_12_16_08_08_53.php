<?php

class Migration_2011_12_16_08_08_53 extends MpmMigration
{

	public function up(PDO &$pdo)
	{
		$pdo->exec("
            create table `categories` (
              `id` INT NOT NULL,
              `name` char(255) NOT NULL,
              PRIMARY KEY (`id`)
            )
            ENGINE=InnoDB
		");
	}

	public function down(PDO &$pdo)
	{
        $pdo->exec("
            DROP TABLE `categories`
        ");
	}
}

?>