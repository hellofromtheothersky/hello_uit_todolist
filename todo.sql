-- Exported from QuickDBD: https://www.quickdatabasediagrams.com/
-- Link to schema: https://app.quickdatabasediagrams.com/#/d/mwOJxJ
-- NOTE! If you have used non-SQL datatypes in your design, you will have to change these here.

-- Exported from QuickDBD: https://www.quickdatabasediagrams.com/
-- Link to schema: https://app.quickdatabasediagrams.com/
-- NOTE! If you have used non-SQL datatypes in your design, you will have to change these here.

CREATE TABLE `users` (
    `user_id` int AUTO_INCREMENT   ,
    `username` varchar(15),
    `email` varchar(30)   ,
    `password` varchar(50) ,
    PRIMARY KEY (
        `user_id`
    )
);

CREATE TABLE `lists` (
    `list_id` int AUTO_INCREMENT   ,
    `listname` varchar(20)   ,
    `user_create_id` int   ,
    PRIMARY KEY (
        `list_id`
    )
);

CREATE TABLE `todos` (
    `todo_id` int AUTO_INCREMENT   ,
    `todoname` varchar(50)   ,
    `content` varchar(500)   ,
    `createday` datetime   ,
    `deadline` datetime   ,
    `done` boolean   ,
    `list_id` int   ,
    `todo_parent_id` int,
    `user_handle` int   ,
    PRIMARY KEY (
        `todo_id`
    )
);

CREATE TABLE `participations` (
    `user_id` int   ,
    `list_id` int   ,
    PRIMARY KEY (
        `user_id`,`list_id`
    )
);

ALTER TABLE `lists` ADD CONSTRAINT `fk_lists_user_create_id` FOREIGN KEY(`user_create_id`)
REFERENCES `users` (`user_id`);

ALTER TABLE `todos` ADD CONSTRAINT `fk_todos_list_id` FOREIGN KEY(`list_id`)
REFERENCES `lists` (`list_id`);

ALTER TABLE `todos` ADD CONSTRAINT `fk_todos_todo_parent_id` FOREIGN KEY(`todo_parent_id`)
REFERENCES `todos` (`todo_id`);

ALTER TABLE `todos` ADD CONSTRAINT `fk_todos_user_handle` FOREIGN KEY(`user_handle`)
REFERENCES `users` (`user_id`);

ALTER TABLE `participations` ADD CONSTRAINT `fk_participations_user_id` FOREIGN KEY(`user_id`)
REFERENCES `users` (`user_id`);

ALTER TABLE `participations` ADD CONSTRAINT `fk_participations_list_id` FOREIGN KEY(`list_id`)
REFERENCES `lists` (`list_id`);

DELIMITER $$
CREATE TRIGGER Create_first_list
    AFTER INSERT ON users FOR EACH ROW    
        BEGIN    
        	INSERT INTO lists(listname, user_create_id)
            VALUES('Danh sách đầu tiên', new.user_id);
        END;$$
DELIMITER ;

INSERT INTO `users`(`username`, `email`, `password`) VALUES ('hieu','hieu@gmail.com','123');
INSERT INTO `users`(`username`, `email`, `password`) VALUES ('duy','duy@gmail.com','456');
INSERT INTO `users`(`username`, `email`, `password`) VALUES ('hoanganh','hoanganh@gmail.com','789');
INSERT INTO `users`(`username`, `email`, `password`) VALUES ('baokhanh','baokanh@gmail.com','123');


