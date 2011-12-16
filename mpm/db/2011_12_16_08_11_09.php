<?php

class Migration_2011_12_16_08_11_09 extends MpmMigration
{

	public function up(PDO &$pdo)
	{
        $pdo->exec('CREATE TABLE `users` (
`id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT \'Идентификатор пользователя\',
`name` VARCHAR( 32 ) NOT NULL COMMENT \'Имя пользователя\',
`email` VARCHAR( 32 ) NOT NULL COMMENT \'Кэп :)\'
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT = \'Пользователи\'');
    }

	public function down(PDO &$pdo)
	{
        $pdo->exec('DROP TABLE `users`');
	}

}

?>