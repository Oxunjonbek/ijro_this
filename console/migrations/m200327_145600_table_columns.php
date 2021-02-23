<?php

use yii\db\Migration;

/**
 * Class m200327_145600_table_columns
 */
class m200327_145600_table_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            
            ALTER TABLE `region` 
            CHANGE COLUMN `name` `name` VARCHAR(255) NOT NULL ,
            ADD UNIQUE INDEX `name_UNIQUE` (`name` ASC);
            
            ALTER TABLE `town` 
            CHANGE COLUMN `name` `name` VARCHAR(255) NOT NULL ;
            
            ALTER TABLE `school` 
            ADD COLUMN `phone` TEXT NULL DEFAULT NULL AFTER `address`,
            ADD COLUMN `location` TEXT NULL DEFAULT NULL COMMENT \'get location\' AFTER `phone`;
            
            CREATE TABLE IF NOT EXISTS `gender` (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `name` VARCHAR(45) NOT NULL,
              PRIMARY KEY (`id`),
              UNIQUE INDEX `name_UNIQUE` (`name` ASC))
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8;
            
            
            ALTER TABLE `teacher` 
            ADD COLUMN `birth_date` DATE NULL DEFAULT NULL AFTER `full_name`,
            ADD COLUMN `gender_id` INT(10) UNSIGNED NULL DEFAULT NULL AFTER `birth_date`,
            ADD INDEX `fk_teacher_gender1_idx` (`gender_id` ASC);
            
            
            ALTER TABLE `blog` 
            ADD COLUMN `title` VARCHAR(255) NOT NULL AFTER `user_id`,
            ADD COLUMN `content` TEXT NULL DEFAULT NULL AFTER `title`,
            ADD COLUMN `author` TEXT NULL DEFAULT NULL AFTER `content`,
            ADD COLUMN `date` DATE NULL DEFAULT NULL AFTER `author`,
            ADD COLUMN `seen` INT(11) NOT NULL DEFAULT 0 AFTER `date`;
            
            ALTER TABLE `parent` 
            ADD COLUMN `gender_id` INT(10) UNSIGNED NULL DEFAULT NULL AFTER `full_name`,
            ADD COLUMN `birth_date` DATE NULL DEFAULT NULL AFTER `gender_id`,
            ADD INDEX `fk_parent_gender1_idx` (`gender_id` ASC);
            
            
            ALTER TABLE `pupil` 
            ADD COLUMN `gender_id` INT(10) UNSIGNED NULL DEFAULT NULL AFTER `full_name`,
            ADD COLUMN `birth_date` DATE NOT NULL AFTER `gender_id`,
            ADD INDEX `fk_pupil_gender1_idx` (`gender_id` ASC);
            
            
            ALTER TABLE `forum_category` 
            ADD COLUMN `name` VARCHAR(255) NOT NULL AFTER `id`,
            ADD COLUMN `status` TINYINT(1) NOT NULL DEFAULT 1 AFTER `name`;
            
            DROP TABLE IF EXISTS `log` ;
            
            ALTER TABLE `teacher` 
            ADD CONSTRAINT `fk_teacher_gender1`
              FOREIGN KEY (`gender_id`)
              REFERENCES `gender` (`id`)
              ON DELETE NO ACTION
              ON UPDATE NO ACTION;
            
            ALTER TABLE `parent` 
            ADD CONSTRAINT `fk_parent_gender1`
              FOREIGN KEY (`gender_id`)
              REFERENCES `gender` (`id`)
              ON DELETE NO ACTION
              ON UPDATE NO ACTION;
            
            ALTER TABLE `pupil` 
            ADD CONSTRAINT `fk_pupil_gender1`
              FOREIGN KEY (`gender_id`)
              REFERENCES `gender` (`id`)
              ON DELETE NO ACTION
              ON UPDATE NO ACTION;        
        ');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200327_145600_table_columns cannot be reverted.\n";

        return false;
    }
}
