INSERT INTO groups (id, name, description) VALUES
    (1,'admin','Administrator'),
    (2,'members','General User');

alter sequence groups_id_seq restart with 3;

INSERT INTO users (ip_address, username, password, salt, email, activation_code, forgotten_password_code, created_on, last_login, active, first_name, last_name, company, phone) VALUES
    ('127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,'1268889823','1268889823','1','Admin','istrator','ADMIN','0');

INSERT INTO users_groups (user_id, group_id) VALUES
    (1,1),
    (1,2);