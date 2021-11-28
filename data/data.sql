drop schema if exists assignment;
create schema assignment;
use assignment;
drop table if exists product;
create table product(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(59),
    author varchar(50),
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
        "Apple Watch 7 Steel",
        "Apple",
        "Accessories",
        "/assets/img/watchs/watch-1.jpg",
        "899"
    ),
    (
        "Apple Watch 7 Aluminium",
        "Apple",
        "Accessories",
        "/assets/img/watchs/watch-2.jpg",
        "899"
    ),
    (
        "Apple Watch 5 Nike",
        "Apple",
        "Accessories",
        "/assets/img/watchs/watch-3.png",
        "499"
    ),
    (
        "AirPods (gen 3)",
        "Apple",
        "Accessories",
        "/assets/img/airpods/airpod-1.png",
        "259"
    ),
    (
        "AirPods Max",
        "Apple",
        "Accessories",
        "/assets/img/airpods/airpod-2.webp",
        "359"
    ),
    (
        "AirPods 2",
        "Apple",
        "Accessories",
        "/assets/img/airpods/airpod-3.png",
        "159"
    ),
    (
        "AirPods Pro",
        "Apple",
        "Accessories",
        "/assets/img/airpods/airpod-4.jpeg",
        "299"
    ),
    (
        "Apple AirTag",
        "Apple",
        "Accessories",
        "/assets/img/airtags/airtag-1.png",
        "29"
    ),
    (
        "AirTag Leather Key Ring",
        "Apple",
        "Accessories",
        "/assets/img/airtags/airtag-2.jpeg",
        "49"
    ),
    (
        "Apple Polishing Cloth",
        "Apple",
        "Accessories",
        "/assets/img/apple-polishing-cloth.jpg",
        "39"
    );

insert INTO product(name, author, type, url, price)
values 
(
    "iPhone 13 Pro Max",
    "Apple",
    "iPhone",
    "/assets/img/iphone/iphone-1.jpg",
    "1000"
),
(
    "iPhone 12 Pro Max",
    "Apple",
    "iPhone",
    "/assets/img/iphone/iphone-2.jpg",
    "900"
),
(
    "iPhone 11 Pro Max",
    "Apple",
    "iPhone",
    "/assets/img/iphone/iphone-3.jpg",
    "800"
),
(
    "iPhone XS Max",
    "Apple",
    "iPhone",
    "/assets/img/iphone/iphone-4.jpg",
    "700"
),
(
    "iPhone 8 Plus",
    "Apple",
    "iPhone",
    "/assets/img/iphone/iphone-5.jpg",
    "600"
),
(
    "Apple Magic Keyboard 2",
    "Apple",
    "accessories",
    "/assets/img/keyboard/keyboard-1.jpg",
    "600"
),
(
    "Apple Magic Keyboard 2 with Numpad",
    "Apple",
    "accessories",
    "/assets/img/keyboard/keyboard-2.jpg",
    "600"
),
(
    "Apple Magic Mouse 2 White",
    "Apple",
    "accessories",
    "/assets/img/mouse/mouse-1.jpg",
    "600"
),
(
    "iPhone SE (2nd generation)",
    "Apple",
    "iPhone",
    "/assets/img/iphone/iphone-6.jpg",
    "600"
),
(
    "iPhone 6s Plus",
    "Apple",
    "iPhone",
    "/assets/img/iphone/iphone-7.jpg",
    "600"
);

-- iMac
insert INTO product(name, author, type, url, price)
values 
(
    "iMac 24 2021 M1",
    "Apple",
    "imac",
    "/assets/img/imac/imac-24-icnh-2021-m1.jpg",
    "1500"
),
(
    "iMac 27 5K 2020",
    "Apple",
    "imac",
    "/assets/img/imac/imac-21-inch-2020.png",
    "1800"
);

-- iPad
insert INTO product(name, author, type, url, price)
values 
(
    "iPad Pro M1 12.9 inch 2021",
    "Apple",
    "iPad",
    "/assets/img/ipad/ipad-pro-2021.jpg",
    "1700"
),
(
    "iPad mini 6",
    "Apple",
    "iPad",
    "/assets/img/ipad/ipad-mini-6.jpg",
    "1100"
),
(
    "iPad Air 4",
    "Apple",
    "iPad",
    "/assets/img/ipad/ipad-4.jpg",
    "1000"
),
(
    "iPad 9",
    "Apple",
    "iPad",
    "/assets/img/ipad/ipad-gen-9.jpg",
    "800"
),
(
    "ipad 8",
    "Apple",
    "iPad",
    "/assets/img/ipad/ipad-gen-8.jpg",
    "500"
);

-- macbook
insert INTO product(name, author, type, url, price)
values 
(
    "MacBook Pro 14 M1 Pro 2021",
    "Apple",
    "macbook",
    "/assets/img/macbook/apple-macbook-pro-14-m1-pro-2021.jpg",
    "2400"
),
(
    "MacBook Pro 16 M1 Pro 2021",
    "Apple",
    "macbook",
    "/assets/img/macbook/apple-macbook-pro-16-m1-pro-2021.jpg",
    "3100"
),
(
    "MacBook Pro M1 2020",
    "Apple",
    "macbook",
    "/assets/img/macbook/apple-macbook-pro-m1-2020.jpg",
    "2200"
),
(
    "MacBook Air M1 2020",
    "Apple",
    "macbook",
    "/assets/img/macbook/macbook-air-m1-2020.jpg",
    "1400"
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
VALUES (1, 'vietduc', '2021-11-27', "Lorem ispum"),
    (1, 'vietduc', '2021-11-27', "Lorem ispum"),
    (1, 'vietduc', '2021-11-27', "Lorem ispum"),
    (1, 'vietduc', '2021-11-27', "Lorem ispum"),
    (1, 'vietduc', '2021-11-27', "Lorem ispum"),
    (1, 'vietduc', '2021-11-27', "Lorem ispum");
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
        "Thu Duc District, Ho Chi Minh City, Vietnam",
        '(+84) 81 647 7215',
        "duc.nguyen291@hcmut.edu.vn"
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
        "Huỳnh Tuấn Đạt",
        "Full stack developer",
        "dat.huynh05122001@hcmut.edu.vn",
        "(+84) 99 999 9999",
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
        "Nguyễn Việt Đức",
        "Full stack developer",
        "duc.nguyen291@hcmut.edu.vn",
        "(+84) 88 888 8888",
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
        "Trần Quốc Việt",
        "Full stack developer",
        "viet.tran544@hcmut.edu.vn",
        "(+84) 77 777 7777",
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
        "Phan Anh Tú",
        "Full stack developer",
        "tu.phananhtu12st@hcmut.edu.vn",
        "(+84) 66 666 6666",
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
        "dat.huynh05122001@hcmut.edu.vn",
        "Huỳnh Tuấn Đạt",
        "(+84) 99 999 9999"
    );
