CREATE TABLE role (
    responsabilite VARCHAR(255), PRIMARY KEY (responsabilite)
);

CREATE TABLE STAGIAIRE (
    id INT AUTO_INCREMENT, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, numdetelephone VARCHAR(10), typedepresence VARCHAR(50), url_du_cv VARCHAR(255), datestage DATE, is_validated BOOLEAN, is_archived BOOLEAN, PRIMARY KEY (id)
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

INSERT INTO
    STAGIAIRE (
        email, password, prenom, nom, numdetelephone, typedepresence, url_du_cv, datestage, is_validated, is_archived
    )
VALUES (
        'stagiaire2@example.com', 'mdp123', 'Jean', 'Dupont', '0612345678', 'temps plein', 'url_cv_2', '2024-02-08', true, false
    ),
    (
        'stagiaire3@example.com', 'mdp123', 'Sophie', 'Lefevre', '0612345678', 'temps plein', 'url_cv_3', '2024-02-08', true, false
    ),
    (
        'stagiaire4@example.com', 'mdp123', 'Thomas', 'Martin', '0612345678', 'temps plein', 'url_cv_4', '2024-02-08', true, false
    ),
    (
        'stagiaire5@example.com', 'mdp123', 'Emilie', 'Dubois', '0612345678', 'temps plein', 'url_cv_5', '2024-02-08', true, false
    ),
    (
        'stagiaire6@example.com', 'mdp123', 'Nicolas', 'Moreau', '0612345678', 'temps plein', 'url_cv_6', '2024-02-08', true, false
    ),
    (
        'stagiaire7@example.com', 'mdp123', 'Manon', 'Laurent', '0612345678', 'temps plein', 'url_cv_7', '2024-02-08', true, false
    ),
    (
        'stagiaire8@example.com', 'mdp123', 'Camille', 'Petit', '0612345678', 'temps plein', 'url_cv_8', '2024-02-08', true, false
    ),
    (
        'stagiaire9@example.com', 'mdp123', 'Alexandre', 'Girard', '0612345678', 'temps plein', 'url_cv_9', '2024-02-08', true, false
    ),
    (
        'stagiaire10@example.com', 'mdp123', 'Emma', 'Durand', '0612345678', 'temps plein', 'url_cv_10', '2024-02-08', true, false
    ),
    (
        'stagiaire11@example.com', 'mdp123', 'Mathis', 'Leroy', '0612345678', 'temps plein', 'url_cv_11', '2024-02-08', true, false
    ),
    (
        'stagiaire12@example.com', 'mdp123', 'Chloe', 'Morel', '0612345678', 'temps plein', 'url_cv_12', '2024-02-08', true, false
    ),
    (
        'stagiaire13@example.com', 'mdp123', 'Antoine', 'Fournier', '0612345678', 'temps plein', 'url_cv_13', '2024-02-08', true, false
    ),
    (
        'stagiaire14@example.com', 'mdp123', 'Ines', 'Andre', '0612345678', 'temps plein', 'url_cv_14', '2024-02-08', true, false
    ),
    (
        'stagiaire15@example.com', 'mdp123', 'Hugo', 'Lefebvre', '0612345678', 'temps plein', 'url_cv_15', '2024-02-08', true, false
    );

INSERT INTO
    RESPONSABLE (
        email, password, prenom, nom, num_de_telephone, is_validated, is_archived, roles, responsabilite
    )
VALUES (
        'admin@admin.com', 'Fdplol59@1', 'Jean', 'Dupont', '0612345678', 1, 0, '["ROLE_ADMIN"]', 'ROLE_RESPONSABLE'
    ),
    (
        'responsable2@example.com', 'mot_de_passe_2', 'Marie', 'Martin', '0612345678', 1, 0, '["ROLE_RESPONSABLE"]', 'ROLE_RESPONSABLE'
    ),
    (
        'responsable3@example.com', 'mot_de_passe_3', 'Pierre', 'Durand', '0612345678', 1, 0, '["ROLE_RESPONSABLE"]', 'ROLE_RESPONSABLE'
    ),
    (
        'responsable4@example.com', 'mot_de_passe_4', 'Sophie', 'Lefevre', '0612345678', 1, 0, '["ROLE_RESPONSABLE"]', 'ROLE_RESPONSABLE'
    ),
    (
        'responsable5@example.com', 'mot_de_passe_5', 'Thomas', 'Girard', '0612345678', 1, 0, '["ROLE_RESPONSABLE"]', 'ROLE_RESPONSABLE'
    ),
    (
        'responsable6@example.com', 'mot_de_passe_6', 'Camille', 'Moreau', '0612345678', 1, 0, '["ROLE_RESPONSABLE"]', 'ROLE_RESPONSABLE'
    ),
    (
        'responsable7@example.com', 'mot_de_passe_7', 'Lucas', 'Leroy', '0612345678', 1, 0, '["ROLE_RESPONSABLE"]', 'ROLE_RESPONSABLE'
    ),
    (
        'responsable8@example.com', 'mot_de_passe_8', 'Emma', 'Roux', '0612345678', 1, 0, '["ROLE_RESPONSABLE"]', 'ROLE_RESPONSABLE'
    ),
    (
        'responsable9@example.com', 'mot_de_passe_9', 'Léa', 'André', '0612345678', 1, 0, '["ROLE_RESPONSABLE"]', 'ROLE_RESPONSABLE'
    ),
    (
        'responsable10@example.com', 'mot_de_passe_10', 'Hugo', 'Lefebvre', '0612345678', 1, 0, '["ROLE_ADMIN"]', 'ROLE_ADMIN'
    );