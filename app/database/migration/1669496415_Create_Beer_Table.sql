create table beer (
    id int auto_increment primary key,
    name varchar(255),
    style_id int,
    from_id int,
    created datetime,
    last_updated datetime,
    FOREIGN KEY (style_id) REFERENCES style(id),
    FOREIGN KEY (from_id) REFERENCES ref_from(id)
);
