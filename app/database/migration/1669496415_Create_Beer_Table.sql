CREATE TABLE beer (
    id INT auto_increment PRIMARY KEY,
    name VARCHAR(255),
    style_id INT,
    from_id INT,
    created DATETIME,
    last_updated DATETIME,
    FOREIGN KEY (style_id) REFERENCES style(id),
    FOREIGN KEY (from_id) REFERENCES ref_from(id)
);
