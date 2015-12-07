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

alter table pictures add column comments_enabled boolean;

alter table pictures_albums drop constraint pictures_albums_album_id_fkey;

alter table pictures_albums add constraint pictures_albums_album_id_fkey foreign key (album_id) 
references albums(id) on update cascade on delete cascade;

alter table pictures_albums drop constraint pictures_albums_picture_id_fkey;

alter table pictures_albums add constraint pictures_albums_picture_id_fkey foreign key (picture_id) 
references pictures(id) on update cascade on delete cascade;

alter table pictures_tags add constraint pictures_tags_picture_id_fkey foreign key (picture_id)
references pictures(id) on update cascade on delete cascade;

alter table pictures_tags drop id;

alter table pictures add column publicpic boolean;

alter table pictures add column colored boolean,
	add column created integer,
	add column kihelkond character varying(20),
	add column koht character varying(40),
	add column digifoto boolean,
	add column kordinaadid character varying(40),
	add column fotograaf character varying(30),
	add column omanik character varying(30),
	add column varasem_omanik character varying(30),
	add column kvaliteet character varying(9),
	add column isikud_fotol character varying(2000),
    add column isikud_fotol character varying(2000),
	add column ligikaudne_aeg character varying(400),
	add column kuupaev character varying(15);

alter table users drop column company,
    drop column phone,
    add column telephone integer,
    add column location varchar(256);
	
alter table albums add column created integer;

create table if not exists people(
    id serial primary key not null,
    name varchar(100) not null,
    birthday date,
    location varchar(25),
    life text,
    enabled boolean
);

create table lifestory(
    comment text not null,
    person_id integer,
    constraint lifestory_people_person_id_fkey foreign key (person_id) REFERENCES people(id) on delete cascade
);

alter table albums ADD column varasem_omanik CHARACTER VARYING(64);

ALTER TABLE albums ADD column kihelkond CHARACTER VARYING(30);

alter table albums ADD column koht CHARACTER VARYING(40);

alter table albums add column ligikaudne_aeg character varying(400);

