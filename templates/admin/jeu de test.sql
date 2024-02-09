CREATE TABLE role (
    responsabilite VARCHAR(20), PRIMARY KEY (responsabilite)
);

CREATE TABLE STAGIAIRE (
    id INT, email VARCHAR(255) NOT NULL, password VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, num_de_telephone VARCHAR(10), type_de_presence VARCHAR(50) NOT NULL, url_du_cv VARCHAR(255), datestage DATE, is_validated BOOLEAN NOT NULL, is_archived BOOLEAN NOT NULL, PRIMARY KEY (id)
);

CREATE TABLE COMPETENCE ( nom VARCHAR(50), PRIMARY KEY (nom) );

CREATE TABLE EQUIPE (
    id INT, nom VARCHAR(50), dater DATE NOT NULL, datefin DATE NOT NULL, PRIMARY KEY (id)
);

CREATE TABLE REUNION (
    id INT, dater DATE NOT NULL, lieu VARCHAR(50) NOT NULL, comments VARCHAR(8000), id_1 INT NOT NULL, PRIMARY KEY (id), FOREIGN KEY (id_1) REFERENCES EQUIPE (id)
);

CREATE TABLE RESPONSABLE (
    id INT, email VARCHAR(255) NOT NULL, password VARCHAR(50), prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, num_de_telephone VARCHAR(10), is_validated BOOLEAN NOT NULL, is_archived BOOLEAN, responsabilite VARCHAR(20), PRIMARY KEY (id), FOREIGN KEY (responsabilite) REFERENCES role (responsabilite)
);

CREATE TABLE COMMENTAIRE (
    id INT, datecommentaire DATE NOT NULL, texte VARCHAR(8000), datemodification DATE, id_1 INT, id_2 INT, PRIMARY KEY (id), FOREIGN KEY (id_1) REFERENCES RESPONSABLE (id), FOREIGN KEY (id_2) REFERENCES EQUIPE (id)
);

CREATE TABLE EVALUER (
    id INT, id_1 INT, commentaires VARCHAR(8000), date_evaluation DATE NOT NULL, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES RESPONSABLE (id), FOREIGN KEY (id_1) REFERENCES STAGIAIRE (id)
);

CREATE TABLE posseder (
    id INT, nom VARCHAR(50), PRIMARY KEY (id, nom), FOREIGN KEY (id) REFERENCES RESPONSABLE (id), FOREIGN KEY (nom) REFERENCES COMPETENCE (nom)
);

CREATE TABLE posseder_2 (
    id INT, nom VARCHAR(50), PRIMARY KEY (id, nom), FOREIGN KEY (id) REFERENCES STAGIAIRE (id), FOREIGN KEY (nom) REFERENCES COMPETENCE (nom)
);

CREATE TABLE INTEGRER (
    id INT, id_1 INT, date_entree DATE NOT NULL, date_sortie DATE NOT NULL, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES STAGIAIRE (id), FOREIGN KEY (id_1) REFERENCES EQUIPE (id)
);

CREATE TABLE utiliser (
    nom VARCHAR(50), id INT, PRIMARY KEY (nom, id), FOREIGN KEY (nom) REFERENCES COMPETENCE (nom), FOREIGN KEY (id) REFERENCES EQUIPE (id)
);

CREATE TABLE organiser (
    id INT, id_1 INT, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES RESPONSABLE (id), FOREIGN KEY (id_1) REFERENCES EQUIPE (id)
);

CREATE TABLE gerer (
    id INT, id_1 INT, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES RESPONSABLE (id), FOREIGN KEY (id_1) REFERENCES REUNION (id)
);

CREATE TABLE assister (
    id INT, id_1 INT, PRIMARY KEY (id, id_1), FOREIGN KEY (id) REFERENCES STAGIAIRE (id), FOREIGN KEY (id_1) REFERENCES REUNION (id)
);

INSERT INTO
    role (responsabilite)
VALUES ('ROLE_ADMIN'),
    ('ROLE_RESPONSABLE');

INSERT INTO
    RESPONSABLE (
        id, email, password, prenom, nom, num_de_telephone, is_validated, is_archived, responsabilite
    )
VALUES (
        1, 'responsable1@example.com', 'mdp123', 'Jean', 'Dupont', '0612345678', true, false, 'ROLE_ADMIN'
    ),
    (
        2, 'responsable2@example.com', 'mdp456', 'Marie', 'Martin', '0687654321', true, false, 'ROLE_ADMIN'
    ),
    (
        3, 'responsable3@example.com', 'mdp789', 'Pierre', 'Dubois', '0643219876', true, false, 'ROLE_ADMIN'
    ),
    (
        4, 'responsable4@example.com', 'mdp101', 'Sophie', 'Lefèvre', '0678901234', true, false, 'ROLE_ADMIN'
    ),
    (
        5, 'responsable5@example.com', 'mdp112', 'Thomas', 'Robert', '0601234567', true, false, 'ROLE_ADMIN'
    ),
    (
        6, 'responsable6@example.com', 'mdp131', 'Camille', 'Richard', '0698765432', true, false, 'ROLE_RESPONSABLE'
    ),
    (
        7, 'responsable7@example.com', 'mdp415', 'Nicolas', 'Petit', '0632145678', true, false, 'ROLE_RESPONSABLE'
    ),
    (
        8, 'responsable8@example.com', 'mdp516', 'Charlotte', 'Durand', '0612345678', true, false, 'ROLE_RESPONSABLE'
    ),
    (
        9, 'responsable9@example.com', 'mdp617', 'Luc', 'Leroy', '0687654321', true, false, 'ROLE_RESPONSABLE'
    );

INSERT INTO
    COMPETENCE (nom)
VALUES ('Informatique'),
    ('Finance'),
    ('Marketing'),
    ('Ressources Humaines'),
    ('Développement Web'),
    ('Design graphique'),
    ('Communication'),
    ('Gestion de projet'),
    ('Vente'),
    ('Analyse de données'),
    ('Relations publiques'),
    ('Ingénierie'),
    ('Événementiel'),
    ('Traduction'),
    ('Santé');

INSERT INTO
    STAGIAIRE (
        id, email, password, prenom, nom, num_de_telephone, type_de_presence, url_du_cv, datestage, is_validated, is_archived
    )
VALUES (
        1, 'stagiaire1@example.com', 'mdp123', 'Laura', 'Martinez', '0612345678', 'temps plein', 'url_cv_1', '2024-02-08', true, false
    ),
    (
        2, 'stagiaire2@example.com', 'mdp456', 'Maxime', 'Lefebvre', '0687654321', 'temps partiel', 'url_cv_2', '2024-02-10', true, false
    ),
    (
        3, 'stagiaire3@example.com', 'mdp789', 'Emma', 'Dubois', '0643219876', 'temps plein', 'url_cv_3', '2024-02-12', true, false
    ),
    (
        4, 'stagiaire4@example.com', 'mdp101', 'Thomas', 'Leroy', '0678901234', 'temps plein', 'url_cv_4', '2024-02-15', true, false
    ),
    (
        5, 'stagiaire5@example.com', 'mdp112', 'Camille', 'Robert', '0601234567', 'temps plein', 'url_cv_5', '2024-02-20', true, false
    ),
    (
        6, 'stagiaire6@example.com', 'mdp131', 'Lucie', 'Garcia', '0698765432', 'temps plein', 'url_cv_6', '2024-02-25', true, false
    ),
    (
        7, 'stagiaire7@example.com', 'mdp415', 'Antoine', 'Morin', '0632145678', 'temps partiel', 'url_cv_7', '2024-02-27', true, false
    ),
    (
        8, 'stagiaire8@example.com', 'mdp516', 'Clara', 'Laurent', '0612345678', 'temps plein', 'url_cv_8', '2024-03-01', true, false
    ),
    (
        9, 'stagiaire9@example.com', 'mdp617', 'Louis', 'Girard', '0687654321', 'temps plein', 'url_cv_9', '2024-03-05', true, false
    ),
    (
        10, 'stagiaire10@example.com', 'mdp718', 'Chloé', 'Richard', '0643219876', 'temps plein', 'url_cv_10', '2024-03-10', true, false
    ),
    (
        11, 'stagiaire11@example.com', 'mdp819', 'Emma', 'Martel', '0678901234', 'temps plein', 'url_cv_11', '2024-03-15', true, false
    ),
    (
        12, 'stagiaire12@example.com', 'mdp920', 'Mathis', 'Gagnon', '0601234567', 'temps plein', 'url_cv_12', '2024-03-20', true, false
    ),
    (
        13, 'stagiaire13@example.com', 'mdp1020', 'Léa', 'Roy', '0698765432', 'temps partiel', 'url_cv_13', '2024-03-25', true, false
    ),
    (
        14, 'stagiaire14@example.com', 'mdp1120', 'Lucas', 'Caron', '0632145678', 'temps plein', 'url_cv_14', '2024-03-27', true, false
    ),
    (
        15, 'stagiaire15@example.com', 'mdp1220', 'Manon', 'Legrand', '0612345678', 'temps plein', 'url_cv_15', '2024-03-30', true, false
    );

INSERT INTO
    EQUIPE (id, nom, dater, datefin)
VALUES (
        1, 'Équipe 1', '2024-02-08', '2024-05-08'
    ),
    (
        2, 'Équipe 2', '2024-02-10', '2024-05-10'
    ),
    (
        3, 'Équipe 3', '2024-02-12', '2024-05-12'
    ),
    (
        4, 'Équipe 4', '2024-02-15', '2024-05-15'
    ),
    (
        5, 'Équipe 5', '2024-02-20', '2024-05-20'
    );

INSERT INTO
    COMMENTAIRE (
        id, datecommentaire, texte, id_1, id_2
    )
VALUES (
        1, '2024-02-08', 'Premier commentaire sur l\'équipe 1.', 1, 1
    ),
    (
        2, '2024-02-10', 'Deuxième commentaire sur l\'équipe 1.', 1, 1
    ),
    (
        3, '2024-02-12', 'Commentaire sur l\'équipe 2.', 2, 2
    ),
    (
        4, '2024-02-15', 'Commentaire sur l\'équipe 3.', 3, 3
    ),
    (
        5, '2024-02-20', 'Dernier commentaire sur l\'équipe 1.', 1, 1
    );

INSERT INTO
    REUNION (
        id, dater, lieu, comments, id_1
    )
VALUES (
        1, '2024-02-08', 'Salle de conférence A', 'Première réunion de l\'équipe 1.', 1
    ),
    (
        2, '2024-02-10', 'Salle de réunion B', 'Réunion hebdomadaire de l\'équipe 2.', 2
    ),
    (
        3, '2024-02-12', 'Salle de conférence C', 'Réunion de planification de l\'équipe 3.', 3
    ),
    (
        4, '2024-02-15', 'Salle de réunion D', 'Réunion de suivi de projet de l\'équipe 4.', 4
    ),
    (
        5, '2024-02-20', 'Salle de conférence E', 'Réunion de bilan trimestriel de l\'équipe 5.', 5
    );