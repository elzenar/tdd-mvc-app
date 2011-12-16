<?php

class Migration_2011_12_16_08_24_52 extends MpmMigration
{

	public function up(PDO &$pdo)
	{
		$sql = "CREATE TABLE IF NOT EXISTS `session` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`session_id` varchar(255) NOT NULL,
					`data` text NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
					
		$pdo->exec($sql);
	}

	public function down(PDO &$pdo)
	{
		$sql = "DROP TABLE `session`";
					
		$pdo->exec($sql);
	}

}

?>