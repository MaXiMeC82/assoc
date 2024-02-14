CREATE TABLE role (
    responsabilite VARCHAR(20), PRIMARY KEY (responsabilite)
);

CREATE TABLE STAGIAIRE (
    id INT, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, num_de_telephone VARCHAR(10), type_de_presence VARCHAR(50), url_du_cv VARCHAR(255), datestage DATE, is_validated BOOLEAN, is_archived BOOLEAN, PRIMARY KEY (id)
);

CREATE TABLE COMPETENCE (
    nom VARCHAR(50), id INT, PRIMARY KEY (nom)
);

CREATE TABLE EQUIPE (
    id INT, nom VARCHAR(50), dater DATE NOT NULL, datefin DATE NOT NULL, PRIMARY KEY (id)
);

CREATE TABLE REUNION (
    id INT, dater DATE NOT NULL, lieu VARCHAR(50) NOT NULL, comments VARCHAR(8000), id_1 INT NOT NULL, PRIMARY KEY (id), FOREIGN KEY (id_1) REFERENCES EQUIPE (id)
);

CREATE TABLE RESPONSABLE (
    id INT, email VARCHAR(255) NOT NULL, password VARCHAR(255), prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, num_de_telephone VARCHAR(10), is_validated BOOLEAN NOT NULL, is_archived BOOLEAN, responsabilite VARCHAR(20), roles VARCHAR(255), PRIMARY KEY (id), FOREIGN KEY (responsabilite) REFERENCES role (responsabilite)
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

-- INSERT INTO
--     RESPONSABLE (
--         id, email, password, prenom, nom, num_de_telephone, is_validated, is_archived, responsabilite
--     )
-- VALUES (
--         1, 'admin@admin.com', '123456', 'Kevin', 'Ubeda', '0612345678', true, false, 'ROLE_ADMIN', "ROLE_ADMIN"
--     );

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
    STAGIAIRE (
        id, email, password, prenom, nom, num_de_telephone, type_de_presence, url_du_cv, datestage, is_validated, is_archived
    )
VALUES (
        1, 'stagiaire1@example.com', 'mdp123', 'Laura', 'Martinez', '0612345678', 'temps plein', 'url_cv_1', '2024-02-08', true, false
    );

-- INSERT INTO
--     EQUIPE (id, nom, dater, datefin)
-- VALUES (
--         1, 'Équipe 1', '2024-02-08', '2024-05-08'
--     ),
--     (
--         2, 'Équipe 2', '2024-02-10', '2024-05-10'
--     ),
--     (
--         3, 'Équipe 3', '2024-02-12', '2024-05-12'
--     ),
--     (
--         4, 'Équipe 4', '2024-02-15', '2024-05-15'
--     ),
--     (
--         5, 'Équipe 5', '2024-02-20', '2024-05-20'
--     );

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
        3, '2024-02-12', 'Commentaire sur l\'équipe 2.', 1, 1
    ),
    (
        4, '2024-02-15', 'Commentaire sur l\'équipe 3.', 1, 1
    ),
    (
        5, '2024-02-20', 'Dernier commentaire sur l\'équipe 1.', 1, 1
    );

-- INSERT INTO
--     REUNION (
--         id, dater, lieu, comments, id_1
--     )
-- VALUES (
--         1, '2024-02-08', 'Salle de conférence A', 'Première réunion de l\'équipe 1.', 1
--     ),
--     (
--         2, '2024-02-10', 'Salle de réunion B', 'Réunion hebdomadaire de l\'équipe 2.', 2
--     ),
--     (
--         3, '2024-02-12', 'Salle de conférence C', 'Réunion de planification de l\'équipe 3.', 3
--     ),
--     (
--         4, '2024-02-15', 'Salle de réunion D', 'Réunion de suivi de projet de l\'équipe 4.', 4
--     ),
--     (
--         5, '2024-02-20', 'Salle de conférence E', 'Réunion de bilan trimestriel de l\'équipe 5.', 5
--     );