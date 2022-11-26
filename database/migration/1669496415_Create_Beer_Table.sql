create table beer (
    id int auto_increment primary key,
    name varchar(255),
    style_id int,
    FOREIGN KEY (style_id) REFERENCES style(id)
);
