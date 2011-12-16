<?php

class Migration_2011_12_16_08_41_22 extends MpmMigration
{

    private $tag_table = 'tag';
    private $tag2money_table = 'tag2money';

	public function up(PDO &$pdo)
	{
        $pdo->exec("DROP TABLE `".$this->tag_table."`");
        $pdo->exec("DROP TABLE `".$this->tag2money_table."`");
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS `".$this->tag_table."`
            (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `name` VARCHAR(150) NOT NULL,
                PRIMARY KEY ( `id` )
            )
            ENGINE=InnoDB
            CHARACTER SET utf8 COLLATE utf8_general_ci
        ");
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS `".$this->tag2money_table."`
            (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `tag_id` INT(11) NOT NULL,
                `money_id` INT(11) NOT NULL,
                PRIMARY KEY ( `id` )
            )
            ENGINE=InnoDB
            CHARACTER SET utf8 COLLATE utf8_general_ci
        ");

	}

	public function down(PDO &$pdo)
	{
        $pdo->exec("DROP TABLE `".$this->tag_table."`");
        $pdo->exec("DROP TABLE `".$this->tag2money_table."`");
        $pdo->exec("CREATE TABLE IF NOT EXISTS `".$this->tag_table."` ( `id` INT(11) NOT NULL AUTO_INCREMENT, `name` VARCHAR(150) NOT NULL, PRIMARY KEY ( `id` ) ) ENGINE=InnoDB");
        $pdo->exec("CREATE TABLE IF NOT EXISTS `".$this->tag2money_table."` ( `id` INT(11) NOT NULL AUTO_INCREMENT, `tag_id` INT(11) NOT NULL, `money_id` INT(11) NOT NULL, PRIMARY KEY ( `id` ) ) ENGINE=InnoDB");

	}

}

?>