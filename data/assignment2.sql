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
-- International book
insert INTO product(name, author, type, url, price)
values(
        "A Madness of Sunshine",
        "Nalini singh",
        "International",
        "/assets/img/internationalbook/work-1.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "Novice Dragoneer",
        "Django Weller",
        "International",
        "/assets/img/internationalbook/work-2.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "Me before you",
        "Jojo Moyes",
        "International",
        "/assets/img/internationalbook/work-3.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "Forget You Know Me",
        "Jessica Strawser",
        "International",
        "/assets/img/internationalbook/work-4.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "The best of me",
        "Nicholas sparks",
        "International",
        "/assets/img/internationalbook/work-5.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "The wolf and the Watchman",
        "Niklas Natt obc Dag",
        "International",
        "/assets/img/internationalbook/work-6.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "The Good Guy",
        "Mark Mcallister",
        "International",
        "/assets/img/internationalbook/work-7.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "At the Going Down of the Sun",
        "Marius Oelschig",
        "International",
        "/assets/img/internationalbook/work-8.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "The Imperfections of Memory",
        "Angelina Aludo",
        "International",
        "/assets/img/internationalbook/work-9.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "The King of Drugs",
        "Nora Barrett",
        "International",
        "/assets/img/internationalbook/work-10.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "Leviathan Loch",
        "Mark Miller",
        "International",
        "/assets/img/internationalbook/work-11.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "Histories Cans",
        "Fleurs",
        "International",
        "/assets/img/internationalbook/work-12.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "The cerulean",
        "Amy Ewing",
        "International",
        "/assets/img/internationalbook/work-13.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "The book of Chaos",
        "Jessica Renwick",
        "International",
        "/assets/img/internationalbook/work-14.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "A Daydreamer's Utopia",
        "Louise Hunts",
        "International",
        "/assets/img/internationalbook/work-15.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "The priory of the Orange tree",
        "Samantha Shannon",
        "International",
        "/assets/img/internationalbook/work-16.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "A game of Thrones",
        "George R.R Martin",
        "International",
        "/assets/img/internationalbook/work-17.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "The edge of The Unknown",
        "Andrew Hamburg",
        "International",
        "/assets/img/internationalbook/work-18.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "Dark Space",
        "author name",
        "International",
        "/assets/img/internationalbook/work-19.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "Harry Potter and the Philosopher's Stone",
        "J.L.Rowling",
        "International",
        "/assets/img/internationalbook/work-20.jpg",
        "15"
    );
insert INTO product(name, author, type, url, price)
values(
        "Tess of the Road",
        "Rachel Hartman",
        "International",
        "/assets/img/internationalbook/work-21.jpg",
        "15"
    );
-- Domestic book
insert INTO product(name, author, type, url, price)
values (
        "Yêu trên từng ngón tay",
        "Trần Trà My",
        "Domestic book",
        "/assets/img/domesticbook/book1.jpg",
        "15"
    ),
    (
        "Ai từng là con nít",
        "Nhiều tác giả",
        "Domestic book",
        "/assets/img/domesticbook/book2.jpg",
        "15"
    ),
    (
        "Ái tình nơi đầu lưỡi",
        "Jo Kyung Ran",
        "Domestic book",
        "/assets/img/domesticbook/book3.jpg",
        "15"
    ),
    (
        "Xu Xu đừng khóc",
        "Hồng Sakura",
        "Domestic book",
        "/assets/img/domesticbook/book4.jpg",
        "15"
    ),
    (
        "Dịch COVID-19",
        "Giáo sư Trương Văn Hồng",
        "Domestic book",
        "/assets/img/domesticbook/book5.jpg",
        "15"
    ),
    (
        "Say sắc",
        "Lưu Tiểu Xuyên",
        "Domestic book",
        "/assets/img/domesticbook/book6.jpg",
        "15"
    ),
    (
        "Bộ luật dân sự",
        "Nhà xuất bản lao động",
        "Domestic book",
        "/assets/img/domesticbook/book7.jpg",
        "15"
    ),
    (
        "Đại cương về nhà nước và pháp luật",
        "GS Đào Trí Úc- GS. Hoàng Thị Kim Quế",
        "Domestic book",
        "/assets/img/domesticbook/book8.jpg",
        "15"
    ),
    (
        "Khoa học 5",
        "Bộ giáo dục và đào tạo",
        "Domestic book",
        "/assets/img/domesticbook/book9.jpg",
        "15"
    );
-- electronic
insert INTO product(name, author, type, url, price)
values (
        "Watch 1",
        "Apple",
        "Electronics",
        "/assets/img/electronics/watch-1.jpg",
        "15"
    ),
    (
        "Watch 2",
        "Apple",
        "Electronics",
        "/assets/img/electronics/watch-2.jpg",
        "15"
    ),
    (
        "Watch 3",
        "Apple",
        "Electronics",
        "/assets/img/electronics/watch-3.jpg",
        "15"
    ),
    (
        "Camera 1",
        "Apple",
        "Electronics",
        "/assets/img/electronics/camera-1.jpg",
        "15"
    ),
    (
        "Camera 2",
        "Apple",
        "Electronics",
        "/assets/img/electronics/camera-2.jpg",
        "15"
    ),
    (
        "Camera 3",
        "Apple",
        "Electronics",
        "/assets/img/electronics/camera-3.jpg",
        "15"
    );
-- souvenirs
insert INTO product(name, author, type, url, price)
values (
        "Hat 1",
        "Channel",
        "Souvenirs",
        "/assets/img/souvenirs/hat.jpg",
        "15"
    ),
    (
        "Hat 1",
        "Channel",
        "Souvenirs",
        "/assets/img/souvenirs/hat-1.jpg",
        "15"
    ),
    (
        "Packet",
        "Channel",
        "Souvenirs",
        "/assets/img/souvenirs/model.jpg",
        "15"
    ),
    (
        "Model",
        "Channel",
        "Souvenirs",
        "/assets/img/souvenirs/packet.jpg",
        "15"
    ),
    (
        "Pillow",
        "Channel",
        "Souvenirs",
        "/assets/img/souvenirs/pillow.jpg",
        "15"
    ),
    (
        "Shirt",
        "Channel",
        "Souvenirs",
        "/assets/img/souvenirs/shirt.jpg",
        "15"
    );
-- stationary
insert INTO product(name, author, type, url, price)
values (
        "eraser",
        "Thien Long",
        "Stationary",
        "/assets/img/stationary/eraser.jpg",
        "15"
    ),
    (
        "pen",
        "Thien Long",
        "Stationary",
        "/assets/img/stationary/pen.jpg",
        "15"
    ),
    (
        "ruler",
        "Thien Long",
        "Stationary",
        "/assets/img/stationary/ruler.jpg",
        "15"
    );
-- toys
insert INTO product(name, author, type, url, price)
values (
        "Teddy bear",
        "Channel",
        "Toys",
        "/assets/img/toys/toy-1.jpg",
        "15"
    ),
    (
        "Teddy bear",
        "Channel",
        "Toys",
        "/assets/img/toys/toy-2.jpg",
        "15"
    ),
    (
        "Hiep",
        "Channel",
        "Toys",
        "/assets/img/toys/toy-3.jpg",
        "15"
    ),
    (
        "Hai",
        "Channel",
        "Toys",
        "/assets/img/toys/toy-4.jpg",
        "15"
    ),
    (
        "Tri",
        "Channel",
        "Toys",
        "/assets/img/toys/toy-5.jpg",
        "15"
    ),
    (
        "Car model",
        "Channel",
        "Toys",
        "/assets/img/toys/toy-6.jpg",
        "15"
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