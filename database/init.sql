-- ----------------------------
-- Table: Role
-- ----------------------------
CREATE TABLE Role (
  id_role INT NOT NULL AUTO_INCREMENT,
  name_role VARCHAR(60) NOT NULL,
  CONSTRAINT Role_PK PRIMARY KEY (id_role)
) ENGINE=InnoDB;

-- ----------------------------
-- Table: Contact
-- ----------------------------
CREATE TABLE Contact (
  id_contact INT NOT NULL AUTO_INCREMENT,
  id_user INT NOT NULL,
  title_contact VARCHAR(32) NOT NULL,
  email_contact VARCHAR(320) NOT NULL,
  content_contact VARCHAR(1024) NOT NULL,
  is_admin_seen BOOLEAN DEFAULT FALSE,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  seen_at DATETIME DEFAULT NULL,
  CONSTRAINT Contact_PK PRIMARY KEY (id_contact),
  CONSTRAINT Contact_id_user_FK FOREIGN KEY (id_user) REFERENCES User (id_user) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ----------------------------
-- Table: User
-- ----------------------------
CREATE TABLE User (
  id_user INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(32) NOT NULL,
  email VARCHAR(320) NOT NULL,
  password VARCHAR(60) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  id_role INT NOT NULL,
  CONSTRAINT User_PK PRIMARY KEY (id_user),
  CONSTRAINT User_id_role_FK FOREIGN KEY (id_role) REFERENCES Role (id_role)
) ENGINE=InnoDB;

-- ----------------------------
-- Table: Categorie
-- ----------------------------
CREATE TABLE Categorie (
  id_categorie INT NOT NULL AUTO_INCREMENT,
  name_categorie VARCHAR(32) NOT NULL,
  CONSTRAINT Categorie_PK PRIMARY KEY (id_categorie)
)ENGINE=InnoDB;

-- ----------------------------
-- Table: Review
-- ----------------------------
CREATE TABLE Review (
  id_review INT NOT NULL AUTO_INCREMENT,
  stars INT NOT NULL,
  comment VARCHAR(1024) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  id_user INT NOT NULL,
  CONSTRAINT Review_PK PRIMARY KEY (id_review),
  CONSTRAINT Review_id_user_FK FOREIGN KEY (id_user) REFERENCES User (id_user) ON DELETE CASCADE
)ENGINE=InnoDB;

-- ----------------------------
-- Table: Item
-- ----------------------------
CREATE TABLE Item (
  id_item INT NOT NULL AUTO_INCREMENT,
  name_item VARCHAR(32) NOT NULL,
  description_item VARCHAR(1024) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  id_user INT NOT NULL,
  id_categorie INT,
  path VARCHAR(255) NOT NULL,
  CONSTRAINT Item_PK PRIMARY KEY (id_item),
  CONSTRAINT Item_id_user_FK FOREIGN KEY (id_user) REFERENCES User (id_user) ON DELETE CASCADE,
  CONSTRAINT Item_id_categorie_FK FOREIGN KEY (id_categorie) REFERENCES Categorie (id_categorie)
) ENGINE=InnoDB;


-- ----------------------------
-- Table: To_Create
-- ----------------------------
CREATE TABLE To_Create (
  id_user INT NOT NULL,
  id_categorie INT NOT NULL,
  color VARCHAR(7) NOT NULL,
  CONSTRAINT To_Hold_PK PRIMARY KEY (id_user, id_categorie),
  CONSTRAINT To_Hold_id_user_FK FOREIGN KEY (id_user) REFERENCES User (id_user) ON DELETE CASCADE,
  CONSTRAINT To_Hold_id_categorie_FK FOREIGN KEY (id_categorie) REFERENCES Categorie (id_categorie)
)ENGINE=InnoDB;