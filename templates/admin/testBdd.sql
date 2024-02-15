CREATE TABLE role (
    responsabilite VARCHAR(255), PRIMARY KEY (responsabilite)
);

CREATE TABLE STAGIAIRE (
    id INT AUTO_INCREMENT, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, num_de_telephone VARCHAR(10), type_de_presence VARCHAR(50), url_du_cv VARCHAR(255), datestage DATE, is_validated BOOLEAN, is_archived BOOLEAN, PRIMARY KEY (id)
);

CREATE TABLE COMPETENCE (
    id INT AUTO_INCREMENT, nom VARCHAR(50) NOT NULL, PRIMARY KEY (id)
);

CREATE TABLE EQUIPE (
    id INT AUTO_INCREMENT, nom VARCHAR(50), dater DATE NOT NULL, datefin DATE NOT NULL, PRIMARY KEY (id)
);

CREATE TABLE REUNION (
    id INT AUTO_INCREMENT, dater DATE NOT NULL, lieu VARCHAR(50) NOT NULL, comments VARCHAR(8000), id_1 INT NOT NULL, PRIMARY KEY (id), FOREIGN KEY (id_1) REFERENCES EQUIPE (id)
);

CREATE TABLE RESPONSABLE (
    id INT AUTO_INCREMENT, email VARCHAR(255) NOT NULL, password VARCHAR(255), prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, num_de_telephone VARCHAR(10), is_validated BOOLEAN NOT NULL, is_archived BOOLEAN, roles VARCHAR(255), responsabilite VARCHAR(255), PRIMARY KEY (id), FOREIGN KEY (responsabilite) REFERENCES role (responsabilite)
);

CREATE TABLE COMMENTAIRE (
    id INT AUTO_INCREMENT, datecommentaire DATE NOT NULL, texte VARCHAR(8000), datemodification DATE, id_1 INT, id_2 INT, PRIMARY KEY (id), FOREIGN KEY (id_1) REFERENCES RESPONSABLE (id), FOREIGN KEY (id_2) REFERENCES EQUIPE (id)
);

CREATE TABLE EVALUER (
    id INT AUTO_INCREMENT, id_1 INT, commentaires VARCHAR(8000), date_evaluation DATE NOT NULL, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES RESPONSABLE (id), FOREIGN KEY (id_1) REFERENCES STAGIAIRE (id)
);

CREATE TABLE posseder (
    id INT AUTO_INCREMENT, id_1 INT, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES RESPONSABLE (id), FOREIGN KEY (id_1) REFERENCES COMPETENCE (id)
);

CREATE TABLE posseder_2 (
    id INT AUTO_INCREMENT, id_1 INT, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES STAGIAIRE (id), FOREIGN KEY (id_1) REFERENCES COMPETENCE (id)
);

CREATE TABLE INTEGRER (
    id INT AUTO_INCREMENT, id_1 INT, date_entree DATE NOT NULL, date_sortie DATE NOT NULL, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES STAGIAIRE (id), FOREIGN KEY (id_1) REFERENCES EQUIPE (id)
);

CREATE TABLE utiliser (
    id INT AUTO_INCREMENT, id_1 INT, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES COMPETENCE (id), FOREIGN KEY (id_1) REFERENCES EQUIPE (id)
);

CREATE TABLE organiser (
    id INT AUTO_INCREMENT, id_1 INT, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES RESPONSABLE (id), FOREIGN KEY (id_1) REFERENCES EQUIPE (id)
);

CREATE TABLE gerer (
    id INT AUTO_INCREMENT, id_1 INT, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES RESPONSABLE (id), FOREIGN KEY (id_1) REFERENCES REUNION (id)
);

CREATE TABLE assister (
    id INT AUTO_INCREMENT, id_1 INT, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES STAGIAIRE (id), FOREIGN KEY (id_1) REFERENCES REUNION (id)
);


INSERT INTO
    COMPETENCE (nom, id)
VALUES ('Informatique', 1),
    ('Finance', 2),
    ('Marketing', 3),
    ('Ressources Humaines', 4),
    ('Développement Web', 5),
    ('Design graphique', 6),
    ('Communication', 7),
    ('Gestion de projet', 8),
    ('Vente', 9),
    ('Analyse de données', 10),
    ('Relations publiques', 11),
    ('Ingénierie', 12),
    ('Événementiel', 13),
    ('Traduction', 14),
    ('Santé', 15);


    INSERT INTO
    role (responsabilite)
VALUES ('ROLE_ADMIN'),
    ('ROLE_RESPONSABLE');