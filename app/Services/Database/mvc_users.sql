create table users
(
    id         int(10) auto_increment,
    login      varchar(20) null,
    password   text        null,
    created_at timestamp   null,
    updated_at timestamp   null,
    constraint users_id_uindex
        unique (id)
);

alter table users
    add primary key (id);

INSERT INTO users (id, login, password, created_at, updated_at) VALUES (1, 'admin', '123', '2019-05-05 22:37:26', '2019-05-05 22:37:36');