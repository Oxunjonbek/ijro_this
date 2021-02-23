<?php

use yii\db\Migration;

/**
 * Class m200310_204133_many_tables
 */
class m200310_204133_many_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //maktab
        $this->execute("
        ALTER TABLE `role` 
        CHANGE COLUMN `name` `name` VARCHAR(255) NOT NULL ,
        ADD UNIQUE INDEX `name_UNIQUE` (`name` ASC),
        DROP INDEX `name` ;
        
        
        CREATE TABLE IF NOT EXISTS `region` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          PRIMARY KEY (`id`))
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `district` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `region_id` INT(10) UNSIGNED NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_district_region1_idx` (`region_id` ASC),
          CONSTRAINT `fk_district_region1`
            FOREIGN KEY (`region_id`)
            REFERENCES `region` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `town` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `district_id` INT(10) UNSIGNED NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_town_district1_idx` (`district_id` ASC),
          CONSTRAINT `fk_town_district1`
            FOREIGN KEY (`district_id`)
            REFERENCES `district` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `school` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `town_id` INT(10) UNSIGNED NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_school_town1_idx` (`town_id` ASC),
          CONSTRAINT `fk_school_town1`
            FOREIGN KEY (`town_id`)
            REFERENCES `town` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `teacher` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `full_name` VARCHAR(255) NOT NULL,
          PRIMARY KEY (`id`))
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `school_teacher` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `school_id` INT(10) UNSIGNED NOT NULL,
          `teacher_id` INT(10) UNSIGNED NOT NULL,
          INDEX `fk_school_has_teacher_teacher1_idx` (`teacher_id` ASC),
          INDEX `fk_school_has_teacher_school1_idx` (`school_id` ASC),
          PRIMARY KEY (`id`),
          CONSTRAINT `fk_school_has_teacher_school1`
            FOREIGN KEY (`school_id`)
            REFERENCES `school` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
          CONSTRAINT `fk_school_has_teacher_teacher1`
            FOREIGN KEY (`teacher_id`)
            REFERENCES `teacher` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `blog` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `user_id` INT(10) UNSIGNED NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_blogs_user1_idx` (`user_id` ASC),
          CONSTRAINT `fk_blogs_user1`
            FOREIGN KEY (`user_id`)
            REFERENCES `user` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = DEFAULT;
        
        
        CREATE TABLE IF NOT EXISTS `shift` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `school_id` INT(10) UNSIGNED NOT NULL,
          `name` VARCHAR(45) NOT NULL,
          `time_from` TIME NOT NULL,
          `time_to` TIME NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_shift_school1_idx` (`school_id` ASC),
          CONSTRAINT `fk_shift_school1`
            FOREIGN KEY (`school_id`)
            REFERENCES `school` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `grade` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `school_id` INT(10) UNSIGNED NOT NULL,
          `shift_id` INT(10) UNSIGNED NOT NULL,
          `teacher_id` INT(10) UNSIGNED NULL DEFAULT NULL,
          `name` VARCHAR(45) NOT NULL,
          `began_year` INT(4) NOT NULL,
          `end_year` INT(4) NOT NULL,
          `camera_url` VARCHAR(45) NULL DEFAULT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_grades_school_idx` (`school_id` ASC),
          INDEX `fk_grades_teacher1_idx` (`teacher_id` ASC),
          INDEX `fk_grades_shift1_idx` (`shift_id` ASC),
          CONSTRAINT `fk_grades_school`
            FOREIGN KEY (`school_id`)
            REFERENCES `school` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
          CONSTRAINT `fk_grades_teacher1`
            FOREIGN KEY (`teacher_id`)
            REFERENCES `teacher` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
          CONSTRAINT `fk_grades_shift1`
            FOREIGN KEY (`shift_id`)
            REFERENCES `shift` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `parent` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `full_name` VARCHAR(255) NOT NULL,
          PRIMARY KEY (`id`))
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `pupil` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `grade_id` INT(10) UNSIGNED NOT NULL,
          `full_name` VARCHAR(255) NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_pupil_grades1_idx` (`grade_id` ASC),
          CONSTRAINT `fk_pupil_grades1`
            FOREIGN KEY (`grade_id`)
            REFERENCES `grade` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `pupil_parent` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `pupil_id` INT(10) UNSIGNED NOT NULL,
          `parent_id` INT(10) UNSIGNED NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_parents_has_pupil_parents1_idx` (`parent_id` ASC),
          INDEX `fk_parents_has_pupil_pupil1_idx` (`pupil_id` ASC),
          CONSTRAINT `fk_parents_has_pupil_parents1`
            FOREIGN KEY (`parent_id`)
            REFERENCES `parent` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
          CONSTRAINT `fk_parents_has_pupil_pupil1`
            FOREIGN KEY (`pupil_id`)
            REFERENCES `pupil` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        
        CREATE TABLE IF NOT EXISTS `come_out` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `pupil_id` INT(10) UNSIGNED NOT NULL,
          `come` TINYINT(1) NOT NULL,
          `action_time` DATETIME NULL DEFAULT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_come_out_pupil1_idx` (`pupil_id` ASC),
          CONSTRAINT `fk_come_out_pupil1`
            FOREIGN KEY (`pupil_id`)
            REFERENCES `pupil` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `payment` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `pupil_id` INT(10) UNSIGNED NOT NULL,
          `how_much` DECIMAL(20,2) NOT NULL,
          `paid_time` DATETIME NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_payment_pupil1_idx` (`pupil_id` ASC),
          CONSTRAINT `fk_payment_pupil1`
            FOREIGN KEY (`pupil_id`)
            REFERENCES `pupil` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        
        CREATE TABLE IF NOT EXISTS `service` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `name` VARCHAR(45) NOT NULL,
          PRIMARY KEY (`id`))
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `pupil_service` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `pupil_id` INT(10) UNSIGNED NOT NULL,
          `service_id` INT(10) UNSIGNED NOT NULL,
          `active` TINYINT(1) NOT NULL,
          `active_time` DATETIME NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_pupil_has_services_pupil1_idx` (`pupil_id` ASC),
          INDEX `fk_pupil_has_services_services1_idx` (`service_id` ASC),
          CONSTRAINT `fk_pupil_has_services_pupil1`
            FOREIGN KEY (`pupil_id`)
            REFERENCES `pupil` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
          CONSTRAINT `fk_pupil_has_services_services1`
            FOREIGN KEY (`service_id`)
            REFERENCES `service` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `service_cost` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `service_id` INT(10) UNSIGNED NOT NULL,
          `how_much` DECIMAL(20,2) NOT NULL,
          `fixed_time` DATETIME NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_service_cost_services1_idx` (`service_id` ASC),
          CONSTRAINT `fk_service_cost_services1`
            FOREIGN KEY (`service_id`)
            REFERENCES `service` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `log` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `user_id` INT(10) UNSIGNED NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_logs_user1_idx` (`user_id` ASC),
          CONSTRAINT `fk_logs_user1`
            FOREIGN KEY (`user_id`)
            REFERENCES `user` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `chat` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `user_id` INT(10) UNSIGNED NOT NULL,
          `user_id1` INT(10) UNSIGNED NOT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_chat_user1_idx` (`user_id` ASC),
          INDEX `fk_chat_user2_idx` (`user_id1` ASC),
          CONSTRAINT `fk_chat_user1`
            FOREIGN KEY (`user_id`)
            REFERENCES `user` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
          CONSTRAINT `fk_chat_user2`
            FOREIGN KEY (`user_id1`)
            REFERENCES `user` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `forum_category` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          PRIMARY KEY (`id`))
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        CREATE TABLE IF NOT EXISTS `forum` (
          `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `forum_category_id` INT(10) UNSIGNED NOT NULL,
          `user_id` INT(10) UNSIGNED NOT NULL,
          `reply_id` INT(10) UNSIGNED NULL DEFAULT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_forum_forum_category1_idx` (`forum_category_id` ASC),
          INDEX `fk_forum_user1_idx` (`user_id` ASC),
          INDEX `fk_forum_forum1_idx` (`reply_id` ASC),
          CONSTRAINT `fk_forum_forum_category1`
            FOREIGN KEY (`forum_category_id`)
            REFERENCES `forum_category` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
          CONSTRAINT `fk_forum_user1`
            FOREIGN KEY (`user_id`)
            REFERENCES `user` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
          CONSTRAINT `fk_forum_forum1`
            FOREIGN KEY (`reply_id`)
            REFERENCES `forum` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8;
        
        
        ");

        //media
        $this->execute("
            
            CREATE TABLE IF NOT EXISTS `subject` (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              PRIMARY KEY (`id`))
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8;
            
            CREATE TABLE IF NOT EXISTS `chapter` (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `subject_id` INT(10) UNSIGNED NOT NULL,
              `user_id` INT(10) UNSIGNED NOT NULL,
              PRIMARY KEY (`id`),
              INDEX `fk_chapter_subject1_idx` (`subject_id` ASC),
              INDEX `fk_chapter_user1_idx` (`user_id` ASC),
              CONSTRAINT `fk_chapter_subject1`
                FOREIGN KEY (`subject_id`)
                REFERENCES `subject` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
              CONSTRAINT `fk_chapter_user1`
                FOREIGN KEY (`user_id`)
                REFERENCES `user` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8;
            
            CREATE TABLE IF NOT EXISTS `topic` (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `chapter_id` INT(10) UNSIGNED NOT NULL,
              PRIMARY KEY (`id`),
              INDEX `fk_topic_chapter1_idx` (`chapter_id` ASC),
              CONSTRAINT `fk_topic_chapter1`
                FOREIGN KEY (`chapter_id`)
                REFERENCES `chapter` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8;
            
            CREATE TABLE IF NOT EXISTS `material` (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `owner_id` INT(10) UNSIGNED NOT NULL,
              `topic_id` INT(10) UNSIGNED NOT NULL,
              `confirmed` TINYINT(1) NOT NULL DEFAULT 0,
              `confirmed_by` INT(10) UNSIGNED NULL DEFAULT NULL,
              PRIMARY KEY (`id`),
              INDEX `fk_material_user_idx` (`owner_id` ASC),
              INDEX `fk_material_user1_idx` (`confirmed_by` ASC),
              INDEX `fk_material_topic1_idx` (`topic_id` ASC),
              CONSTRAINT `fk_material_user`
                FOREIGN KEY (`owner_id`)
                REFERENCES `user` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
              CONSTRAINT `fk_material_user1`
                FOREIGN KEY (`confirmed_by`)
                REFERENCES `user` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
              CONSTRAINT `fk_material_topic1`
                FOREIGN KEY (`topic_id`)
                REFERENCES `topic` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8;
            
            CREATE TABLE IF NOT EXISTS `favorite` (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `user_id` INT(10) UNSIGNED NOT NULL,
              `material_id` INT(10) UNSIGNED NOT NULL,
              PRIMARY KEY (`id`),
              INDEX `fk_faworities_user1_idx` (`user_id` ASC),
              INDEX `fk_faworities_material1_idx` (`material_id` ASC),
              CONSTRAINT `fk_faworities_user1`
                FOREIGN KEY (`user_id`)
                REFERENCES `user` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
              CONSTRAINT `fk_faworities_material1`
                FOREIGN KEY (`material_id`)
                REFERENCES `material` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8;
            
            CREATE TABLE IF NOT EXISTS `question` (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `material_id` INT(10) UNSIGNED NOT NULL,
              `user_id` INT(10) UNSIGNED NOT NULL,
              `reply_id` INT(10) UNSIGNED NULL DEFAULT NULL,
              `content` TEXT NULL DEFAULT NULL,
              PRIMARY KEY (`id`),
              INDEX `fk_questions_material1_idx` (`material_id` ASC),
              INDEX `fk_questions_user1_idx` (`user_id` ASC),
              INDEX `fk_questions_questions1_idx` (`reply_id` ASC),
              CONSTRAINT `fk_questions_material1`
                FOREIGN KEY (`material_id`)
                REFERENCES `material` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
              CONSTRAINT `fk_questions_user1`
                FOREIGN KEY (`user_id`)
                REFERENCES `user` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
              CONSTRAINT `fk_questions_questions1`
                FOREIGN KEY (`reply_id`)
                REFERENCES `question` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8;
        ");

        //ad
        $this->execute("
            
            CREATE TABLE IF NOT EXISTS `ad_type` (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `name` VARCHAR(45) NOT NULL,
              PRIMARY KEY (`id`),
              UNIQUE INDEX `name_UNIQUE` (`name` ASC))
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8;
            
            CREATE TABLE IF NOT EXISTS `ad` (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `ad_type_id` INT(10) UNSIGNED NOT NULL,
              `title` VARCHAR(200) NULL DEFAULT NULL,
              `content` TEXT NOT NULL,
              `created_at` TIMESTAMP NULL DEFAULT NULL,
              `updated_at` TIMESTAMP NULL DEFAULT NULL,
              PRIMARY KEY (`id`),
              INDEX `fk_ads_ads_type_idx` (`ad_type_id` ASC),
              CONSTRAINT `fk_ads_ads_type`
                FOREIGN KEY (`ad_type_id`)
                REFERENCES `ad_type` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8
            COMMENT = 'Masalan notification bosilganda url ni ochilishi';
            
            CREATE TABLE IF NOT EXISTS `ad_time` (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `ad_id` INT(10) UNSIGNED NOT NULL,
              PRIMARY KEY (`id`),
              INDEX `fk_ads_time_ads1_idx` (`ad_id` ASC),
              CONSTRAINT `fk_ads_time_ads1`
                FOREIGN KEY (`ad_id`)
                REFERENCES `ad` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8;
            
            CREATE TABLE IF NOT EXISTS `ad_user` (
              `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              `ad_id` INT(10) UNSIGNED NOT NULL,
              `user_id` INT(10) UNSIGNED NOT NULL,
              INDEX `fk_ads_has_user_user1_idx` (`user_id` ASC),
              INDEX `fk_ads_has_user_ads1_idx` (`ad_id` ASC),
              PRIMARY KEY (`id`),
              CONSTRAINT `fk_ads_has_user_ads1`
                FOREIGN KEY (`ad_id`)
                REFERENCES `ad` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION,
              CONSTRAINT `fk_ads_has_user_user1`
                FOREIGN KEY (`user_id`)
                REFERENCES `user` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION)
            ENGINE = InnoDB
            DEFAULT CHARACTER SET = utf8;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200310_204133_many_tables cannot be reverted.\n";

        return false;
    }
}
