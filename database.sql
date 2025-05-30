CREATE TABLE etudiant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    `Nom` VARCHAR(100),
    `Prenoms` VARCHAR(150),
    `Naissance` DATE,
    `Genre` VARCHAR(10),
    `Entree` DATE,
    `Besoin` TEXT
);