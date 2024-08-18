CREATE TABLE exchanges (
    id int NOT NULL auto_increment,
    name VARCHAR(255) NOT NULL,
    domain VARCHAR(255) NOT NULL,
    counrty VARCHAR(255),
    usd Boolean,
    spot Boolean,
    futures Boolean,
    margin Boolean,
    staking Boolean,
    api Boolean
    PRIMARY KEY (id)
);

CREATE TABLE symbols (
    id int NOT NULL auto_increment,
    exchange_id int NOT NULL,
    name VARCHAR(255) NOT NULL,
    min_size DECIMAL(16,8) NOT NULL,
    max_size DECIMAL(16,8) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (exchange_id) REFERENCES exchanges(id)
);