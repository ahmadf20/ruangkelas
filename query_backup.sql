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

create table course(
    course_id int not null auto_increment,
    course_name varchar(32) not null,
    course_desc varchar(200) null,
    teacher_id varchar(20) not null,
    image varchar(250) DEFAULT 'default.jpg',
    icon varchar(50) DEFAULT '<i class="fa fa-tasks" aria-hidden="true"></i>',
    FOREIGN KEY (teacher_id) REFERENCES account(user_id) ON Delete cascade,
    PRIMARY KEY (course_id)
);

create table enroll(
    student_id varchar(12) not null,
    course_id int not null,
    FOREIGN KEY (student_id) REFERENCES account(user_id) ON Delete cascade,
    FOREIGN KEY (course_id) REFERENCES course(course_id) ON Delete cascade
);

create table material(
    material_id int not null auto_increment, 
    course_id int not null,
    title varchar(200) not null,
    `desc` varchar(200) null,
    date_created varchar(30) DEFAULT NULL,
    FOREIGN KEY (course_id) REFERENCES course(course_id) ON Delete cascade,
    PRIMARY KEY(material_id)
);

create table files(
    id int not null auto_increment,
    material_id int not null,
    file_name varchar(200) not null,
    date_uploaded varchar(30) DEFAULT NULL,
    extension varchar(20) not null,
    FOREIGN KEY (material_id) REFERENCES material(material_id) ON Delete cascade,
    PRIMARY KEY(id)
);

create table assignment(
    id int not null auto_increment,
    material_id int not null,
    title varchar(200) not null,
    `desc` varchar(200) not null,
    date_created varchar(30) DEFAULT NULL,
    due_date varchar(30) DEFAULT NULL,
    is_late_accepted int default 1,
    PRIMARY KEY(id),
    FOREIGN KEY (material_id) REFERENCES material(material_id) ON Delete cascade
);

create table userfiles(
    id int not null auto_increment,
    assignment_id int not null,
    student_id varchar(12) not null,
    file_name varchar(200) not null,
    date_uploaded varchar(30) DEFAULT NULL,
    extension varchar(20) not null,
    FOREIGN KEY (assignment_id) REFERENCES assignment(id) ON Delete cascade,
    FOREIGN KEY (student_id) REFERENCES account(user_id) ON Delete cascade,
    PRIMARY KEY(id)
);
