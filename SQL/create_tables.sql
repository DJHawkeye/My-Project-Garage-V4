CREATE TABLE
    users (
        user_id INT(10) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        user_type VARCHAR(10) NOT NULL,
        PRIMARY KEY (user_id),

    );

CREATE TABLE
    services (
        service_id INT(10) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        PRIMARY KEY (service_id)
    );

CREATE TABLE
    review (
        review_id INT(10) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        rating INT(5) NOT NULL,
        comment VARCHAR(255) NOT NULL,
        approved CHAR(1),
        PRIMARY KEY (review_id)
    );

CREATE TABLE
    contact (
        contac_id INT(10) NOT NULL AUTO_INCREMENT,
        firstname VARCHAR(100) NOT NULL,
        lastname VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(10) NOT NULL,
        subject VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        acknowledged TINYINT(1),
        PRIMARY KEY (contac_id),
    );

CREATE TABLE
    car (
        car_id INT(10) NOT NULL AUTO_INCREMENT,
        price INT(6) NOT NULL,
        make VARCHAR(100) NOT NULL,
        model VARCHAR(100) NOT NULL, 
        year INT(4) NOT NULL,
        kilometers INT(6) NOT NULL,
        fueltype VARCHAR(50),
        bodytype VARCHAR(100),
        color VARCHAR(100),
        transmission VARCHAR(100),
        doors INT(1),
        created DATETIME,
        image1 LONGBLOB,
        image2 LONGBLOB,
        image3 LONGBLOB,
        image4 LONGBLOB,
        PRIMARY KEY (id_vehicle),

    );
