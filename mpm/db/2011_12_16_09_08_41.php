<?php

class Migration_2011_12_16_09_08_41 extends MpmMigration
{

    public function up(PDO &$pdo)
   	{
        $pdo->exec("DROP TABLE `session`");

   		$sql = "
            CREATE TABLE IF NOT EXISTS `session` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `session_id` varchar(255) NOT NULL,
              `data` text NOT NULL,
              PRIMARY KEY (`id`)
            )
            ENGINE=InnoDB
            CHARACTER SET utf8 COLLATE utf8_general_ci
            AUTO_INCREMENT=1 ;
        ";

   		$pdo->exec($sql);
   	}

   	public function down(PDO &$pdo)
   	{
   		$sql = "DROP TABLE `session`";

   		$pdo->exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS `session` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `session_id` varchar(255) NOT NULL,
            `data` text NOT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

        $pdo->exec($sql);
   	}

}

?>