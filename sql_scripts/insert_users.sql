use curacao_db_test;

insert into users (name, email, password, access_level) values 
(
    'Adviser',
    'adviser@user',
    'password',
    1
),
(
    'Supervisor',
    'supervisor@user',
    'password',
    2
),
(
    'Administrator',
    'admin@user',
    'password',
    3
);
