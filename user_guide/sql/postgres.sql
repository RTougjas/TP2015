CREATE TABLE IF NOT EXISTS "users" (
    "id" SERIAL NOT NULL,
    "ip_address" varchar(15),
    "username" varchar(100) NOT NULL,
    "password" varchar(255) NOT NULL,
    "salt" varchar(255),
    "email" varchar(100) NOT NULL,
    "activation_code" varchar(40),
    "forgotten_password_code" varchar(40),
    "forgotten_password_time" int,
    "remember_code" varchar(40),
    "created_on" int NOT NULL,
    "last_login" int,
    "active" int4,
    "first_name" varchar(50),
    "last_name" varchar(50),
    "company" varchar(100),
    "phone" varchar(20),
  PRIMARY KEY("id"),
  CONSTRAINT "check_id" CHECK(id >= 0),
  CONSTRAINT "check_active" CHECK(active >= 0)
);


CREATE TABLE IF NOT EXISTS "groups" (
    "id" SERIAL NOT NULL,
    "name" varchar(20) NOT NULL,
    "description" varchar(100) NOT NULL,
  PRIMARY KEY("id"),
  CONSTRAINT "check_id" CHECK(id >= 0)
);


CREATE TABLE IF NOT EXISTS "users_groups" (
    "id" SERIAL NOT NULL,
    "user_id" integer NOT NULL,
    "group_id" integer NOT NULL,
  PRIMARY KEY("id"),
  CONSTRAINT "uc_users_groups" UNIQUE (user_id, group_id),
  CONSTRAINT "users_groups_check_id" CHECK(id >= 0),
  CONSTRAINT "users_groups_check_user_id" CHECK(user_id >= 0),
  CONSTRAINT "users_groups_check_group_id" CHECK(group_id >= 0)
);


CREATE TABLE IF NOT EXISTS "login_attempts" (
    "id" SERIAL NOT NULL,
    "ip_address" varchar(15),
    "login" varchar(100) NOT NULL,
    "time" int,
  PRIMARY KEY("id"),
  CONSTRAINT "check_id" CHECK(id >= 0)
);

CREATE TABLE IF NOT EXISTS "ci_sessions" (
        "id" varchar(40) NOT NULL,
        "ip_address" varchar(45) NOT NULL,
        "timestamp" bigint DEFAULT 0 NOT NULL,
        "data" text DEFAULT '' NOT NULL
);

CREATE INDEX "ci_sessions_timestamp" ON "ci_sessions" ("timestamp");

create table IF NOT EXISTS pictures(
	id serial not null primary key,
	title character varying(64),
	description text,
	location character varying(128) not null,
	user_id integer references users(id),
	comments_enabled boolean 
);


create table IF NOT EXISTS tags(
	id serial primary key not null,
	tag character varying(30) not null
);

create table IF NOT EXISTS pictures_tags(
	picture_id integer not null,
	tag_id integer not null,
	constraint unique_picture_tag unique (picture_id, tag_id)
);

create table IF NOT EXISTS comments(
	id serial primary key not null,
	user_id integer not null,
	picture_id integer not null,
	comment text,
	created integer not null
);

CREATE TABLE IF NOT EXISTS albums(
    id serial primary key not null,
    title varchar(64),
    description text,
    user_id integer not null references users(id)
);

CREATE TABLE IF NOT EXISTS pictures_albums(
	picture_id integer not null references pictures(id),
	album_id integer not null references albums(id),
	constraint unique_picture_album unique (picture_id, album_id)
);

CREATE VIEW v_photo_search AS
SELECT pictures.id, title, description, location, user_id, tag FROM 
pictures
LEFT JOIN pictures_tags
ON pictures.id = pictures_tags.picture_id
LEFT JOIn tags
ON pictures_tags.tag_id = tags.id;

CREATE VIEW v_pictures_in_albums AS
SELECT pictures.id AS picture_id, pictures.title AS picture_title, pictures.description AS picture_description, pictures.location, pictures.user_id AS uploader_id,
albums.id AS album_id, albums.title AS album_title, albums.description AS album_description, albums.user_id AS album_owner_id FROM pictures
LEFT JOIN pictures_albums
ON pictures.id = pictures_albums.picture_id
RIGHT JOIN albums
ON albums.id = pictures_albums.album_id;

alter table pictures_albums drop constraint pictures_albums_album_id_fkey;

alter table pictures_albums add constraint pictures_albums_album_id_fkey foreign key (album_id) 
references albums(id) on update cascade on delete cascade;

alter table pictures_albums drop constraint pictures_albums_picture_id_fkey;

alter table pictures_albums add constraint pictures_albums_picture_id_fkey foreign key (picture_id) 
references pictures(id) on update cascade on delete cascade;

alter table pictures_tags add constraint pictures_tags_picture_id_fkey foreign key (picture_id)
references pictures(id) on update cascade on delete cascade;

alter table pictures_tags drop column id;