create database curacao_db_test; 

use curacao_db_test;

/* USERS TABLE */
create table users (

    id int not null primary key auto_increment,

    name varchar(50),
    email varchar(20),
    password varchar(50),

    /* access level, can be 1, 2 or 3 */
    access_level int(1)
);

/* SERVICES TABLE */
create table services (

    id int not null primary key auto_increment,

    /* service info */
    service_type varchar(20),
    service_date timestamp default current_timestamp,
    delivery_date timestamp,
    order_num varchar(20),
    client_account_num varchar(50),
    sale_store varchar(50),

    /* client info */
    client_sender_name varchar(50),
    client_receiver_name varchar(50),
    local_tel int(20),
    cel_tel int(20),

    /* place */
    country varchar(50),
    state varchar(50),
    city varchar(50),
    suburb varchar(50),
    street varchar(50),
    zip_code varchar(20),
    exterior_num int(20),
    interior_num int(20),

    /* product info */
    article varchar(50),
    brand varchar(50),
    model varchar(50),
    warranty varchar(50),
    coverage varchar(50),
    n_a boolean,
    problem_description text,
    associated varchar(50),
    supervisor varchar(50),

    active boolean default true,
    notes text
);


