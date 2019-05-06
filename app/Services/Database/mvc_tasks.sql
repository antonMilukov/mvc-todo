create database mvc;
use mvc;
create table tasks
(
    id         int(10) auto_increment,
    username   varchar(20)       null,
    email      varchar(50)       null,
    text       text              null,
    status     int(2) default 10 null,
    updated_at timestamp         null,
    created_at timestamp         null,
    constraint tasks_id_uindex
        unique (id)
);

alter table tasks
    add primary key (id);

INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (1, 'test', 'email@example.com', 'Need to do', 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (2, '1', null, null, 20, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (3, '2', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (4, '3', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (5, '4', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (6, '5', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (7, '6', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (8, '7', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (9, '8', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (10, '9', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (11, '10', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (12, '11', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (13, '12', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (14, '13', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (15, '14', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (16, '15', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (17, '16', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (18, '17', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (19, '18', null, null, 10, null, null);
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (20, null, null, null, 10, '2019-05-05 19:59:04', '2019-05-05 19:59:04');
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (21, '123', '123@123.ru', '123', 10, '2019-05-05 19:59:54', '2019-05-05 19:59:54');
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (22, '', '', '', 10, '2019-05-05 20:05:25', '2019-05-05 20:05:25');
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (23, 'dasdasd', '', 'asdasd', 10, '2019-05-05 20:05:30', '2019-05-05 20:05:30');
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (24, 'dsad', 'asd@dasd.ru', 'sdasd', 10, '2019-05-05 21:57:11', '2019-05-05 21:57:11');
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (25, '', '', '', 10, '2019-05-05 23:21:08', '2019-05-05 23:21:08');
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (26, 'dasd', 'anton.milukov@gmail.com', 'dasd', 20, '2019-05-05 23:43:30', '2019-05-05 23:21:15');
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (27, '123', 'anton.milukov@gmail.com', '132', 10, '2019-05-05 23:21:35', '2019-05-05 23:21:35');
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (28, 'sdsad', '123@123.ru', 'adsad', 10, '2019-05-05 23:23:52', '2019-05-05 23:23:52');
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (29, 'asdsad', 'anton.milukov@gmail.com', 'adsad', 10, '2019-05-05 23:26:42', '2019-05-05 23:26:42');
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (30, 'dasdasd', 'asd@dasd.ru', 'adsdas', 10, '2019-05-05 23:28:08', '2019-05-05 23:28:08');
INSERT INTO tasks (id, username, email, text, status, updated_at, created_at) VALUES (31, 'dasd', 'asdsad@sdasd.ru', 'asdasd', 20, '2019-05-05 23:44:03', '2019-05-05 23:43:49');