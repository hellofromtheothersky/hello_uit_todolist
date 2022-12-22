-- Exported from QuickDBD: https://www.quickdatabasediagrams.com/
-- Link to schema: https://app.quickdatabasediagrams.com/#/d/mwOJxJ
-- NOTE! If you have used non-SQL datatypes in your design, you will have to change these here.

-- Exported from QuickDBD: https://www.quickdatabasediagrams.com/
-- Link to schema: https://app.quickdatabasediagrams.com/
-- NOTE! If you have used non-SQL datatypes in your design, you will have to change these here.

-- database name: hellouit_todolist

CREATE TABLE `users` (
    `user_id` char(5)   ,
    `username` varchar(15)   ,
    `email` varchar(30)   ,
    PRIMARY KEY (
        `user_id`
    )
);

CREATE TABLE `lists` (
    `list_id` char(5)   ,
    `listname` varchar(20)   ,
    `user_create_id` char(5)   ,
    PRIMARY KEY (
        `list_id`
    )
);

CREATE TABLE `todos` (
    `todo_id` char(5)   ,
    `todoname` varchar(50)   ,
    `content` varchar(500)   ,
    `createday` datetime   ,
    `deadline` datetime   ,
    `done` boolean   ,
    `list_id` char(5)   ,
    `todo_parent_id` char(5),
    `user_handle` char(5)   ,
    PRIMARY KEY (
        `todo_id`
    )
);

CREATE TABLE `participations` (
    `user_id` char(5)   ,
    `list_id` char(5)   ,
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

