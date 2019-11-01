create database ruangkelas;
use ruangkelas;
create table account (
    username varchar(12) not null,
    name varchar(32) not null,
    password varchar(128) not null,
    user_id varchar(12) not null,
    email varchar(30) not null,
    pic varchar(200) not null,
    role_id varchar(1) not null,
    date_created varchar(30) DEFAULT NULL,
    PRIMARY KEY (user_id)
);
-- create table student(
--     student_id varchar(12) not null,
--     name varchar(30) not null,
--     username varchar(12) not null,
--     PRIMARY KEY (student_id) 
-- );
-- create table teacher(
--     teacher_id varchar(20) not null,
--     name varchar(30) not null,
--     username varchar(12) not null,
--     PRIMARY KEY (teacher_id)
-- );
create table task(
    task_id varchar(12) not null,
    title varchar(200) not null,
    file_name varchar(200) not null,
    task_desc varchar(200) not null,
    PRIMARY KEY(task_id)
);
create table subject(
    subject_id varchar(15) not null,
    subject_name varchar(32) not null,
    subject_desc varchar(200) null,
    teacher_id varchar(20) not null,
    FOREIGN KEY (teacher_id) REFERENCES account(user_id),
    PRIMARY KEY (subject_id)
);
create table enroll(
    student_id varchar(12) not null,
    subject_id varchar(15)not null,
    FOREIGN KEY (student_id) REFERENCES account(user_id),
    FOREIGN KEY (subject_id) REFERENCES subject(subject_id)
);
create table assign(
    student_id varchar(12) not null,
    task_id varchar(12) not null,
    FOREIGN KEY (student_id) REFERENCES account(user_id),
    FOREIGN KEY (task_id) REFERENCES task(task_id)
);
create table material(
    material_id int not null, --Pertemuan ke
    subject_id varchar(15) not null,
    title varchar(200) not null,
    theory_desc varchar(200) null,
    date_created varchar(30) DEFAULT NULL,
    FOREIGN KEY (subject_id) REFERENCES subject(subject_id),
    PRIMARY KEY(material_id, subject_id)
);
create table files(
    id int not null auto_increment,
    material_id int not null,
    subject_id varchar(15) not null,
    file_name varchar(200) not null,
    date_uploaded varchar(30) DEFAULT NULL,
    extension varchar(20) not null;
    FOREIGN KEY (material_id, subject_id) REFERENCES material(material_id, subject_id),
    PRIMARY KEY(id)
);

