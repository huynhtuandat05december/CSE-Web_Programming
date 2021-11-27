drop schema if exists assignment2;
create schema assignment2;
use assignment2;
drop table if exists product;
create table product(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(59),
    author varchar(50),
    -- author name for book and producer for another products
    type varchar(50),
    url varchar(100),
    price int
);
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    full_name VARCHAR(255),
    url VARCHAR(255),
    telephone VARCHAR(255),
    date_of_birth DATE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

insert INTO product(name, author, type, url, price)
values (
        "Apple Watch 7 Thép",
        "Apple",
        "Watch",
        "/assets/img/watchs/watch-1.jpg",
        "899"
    ),
    (
        "Apple Watch 7 Nhôm",
        "Apple",
        "Watch",
        "/assets/img/watchs/watch-2.jpg",
        "899"
    ),
    (
        "Apple Watch 5 Nike",
        "Apple",
        "Watch",
        "/assets/img/watchs/watch-3.png",
        "499"
    ),
    (
        "AirPods (gen 3)",
        "Apple",
        "Airpod",
        "/assets/img/airpods/airpod-1.png",
        "259"
    ),
    (
        "AirPods Max",
        "Apple",
        "Airpod",
        "/assets/img/airpods/airpod-2.webp",
        "359"
    ),
    (
        "AirPods 2",
        "Apple",
        "Airpod",
        "/assets/img/airpods/airpod-3.png",
        "159"
    ),
    (
        "AirPods Pro",
        "Apple",
        "Airpod",
        "/assets/img/airpods/airpod-4.jpeg",
        "299"
    ),
    (
        "Apple AirTag",
        "Apple",
        "Airtag",
        "/assets/img/airtags/airtag-1.png",
        "29"
    ),
    (
        "AirTag Leather Key Ring",
        "Apple",
        "Airtag",
        "/assets/img/airtags/airtag-2.jpeg",
        "49"
    ),
    (
        "Apple Polishing Cloth",
        "Apple",
        "Airtag",
        "/assets/img/apple-polishing-cloth.jpg",
        "39"
    );
DROP TABLE IF EXISTS comment;
CREATE TABLE comment (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_id INT NOT NULL,
    username VARCHAR(50) NOT NULL,
    time DATE NOT NULL,
    detail TEXT(100) NOT NULL
);
INSERT INTO comment(product_id, username, time, detail)
VALUES (1, 'tri.hobknetid', '2020-12-27', "Lorem ispum"),
    (1, 'tri.hobknetid', '2020-12-27', "Lorem ispum"),
    (1, 'tri.hobknetid', '2020-12-27', "Lorem ispum"),
    (1, 'tri.hobknetid', '2020-12-27', "Lorem ispum"),
    (1, 'tri.hobknetid', '2020-12-27', "Lorem ispum"),
    (1, 'tri.hobknetid', '2020-12-27', "Lorem ispum");
drop table if exists contact;
create table contact(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    email varchar(255),
    subject varchar(255),
    message varchar(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
-- information for get in touch
drop table if exists information;
create table information(
    detail longtext,
    address varchar(255),
    phone varchar(255),
    email varchar(255)
);
INSERT INTO information(detail, address, phone, email)
VALUES (
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum dolorem soluta quidem expedita aperiam aliquid at. Totam magni ipsum suscipit amet? Autem nemo esse laboriosam ratione nobis mollitia inventore?",
        "Dormitory Zone A - Linh Trung Ward - Thu Duc District -
Ho Chi Minh City - Vietnam",
        '(+84) 81 647 7215',
        "tinh.hoangbknetid@hcmut.edu.vn"
    );
-- about
drop table if exists staff;
create table staff(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    profile varchar(255),
    email varchar(255),
    phone varchar(255),
    detail longtext,
    url varchar(255)
);
insert into staff(
        name,
        profile,
        email,
        phone,
        detail,
        url
    )
values (
        "Huỳnh Công Hải",
        "Full stack developer",
        "hai.huynh.2101@hcmut.edu.vn",
        "(+84) 94 223 9400",
        "Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla porttitor accumsan tincidunt.
 enim. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.",
        "/assets/img/testimonial-1.jpg"
    );
insert into staff(
        name,
        profile,
        email,
        phone,
        detail,
        url
    )
values (
        "Trương Minh Hiệp",
        "Full stack developer",
        "hiep.truongminh@hcmut.edu.vn",
        "(+84) 39 907 0916",
        "Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla porttitor accumsan tincidunt.

Ma Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.",
        "/assets/img/testimonial-2.jpg"
    );
insert into staff(
        name,
        profile,
        email,
        phone,
        detail,
        url
    )
values (
        "Hoàng Vũ Tĩnh ",
        "Back-end developer",
        "tinh.hoangbknetid@hcmut.edu.vn",
        "(+84) 81 647 7215",
        "Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla porttitor accumsan tincidunt.
etium ut lacinia in, elementum id enim. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.",
        "/assets/img/testimonial-3.jpg"
    );
insert into staff(
        name,
        profile,
        email,
        phone,
        detail,
        url
    )
values (
        "Hồ Ngọc Trí",
        "Back-end developer",
        "tri.hobknetid@hcmut.edu.vn",
        "(+84) 97 757 0593",
        "Curabitur nisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.",
        "/assets/img/testimonial-4.jpg"
    );
-- admin
DROP TABLE IF EXISTS admin;
CREATE TABLE admin (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    full_name VARCHAR(255),
    url VARCHAR(255),
    telephone VARCHAR(255),
    date_of_birth DATE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
insert into admin(id, username, password, email, full_name, telephone)
values (
        "1",
        "admin",
        "admin",
        "hai.huynh.2101@hcmut.edu.vn",
        "Huỳnh Công Hải",
        "(+84) 94 223 9400"
    );