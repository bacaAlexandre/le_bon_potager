INSERT INTO `T_DEPARTEMENT` (`id_departement`, `depLibelle`) VALUES
(76, 'Seine-maritime');

INSERT INTO `T_VILLE` (`id_ville`, `vilLibelle`, `vilDepartement_id`) VALUES
(1, 'Rouen', 76);

INSERT INTO `T_CODE_POSTAL` (`id_code_postal`, `cpLibelle`, `cpVille_id`) VALUES
(1, '76000', 1);

INSERT INTO `T_ROLES` (`id_role`, `rolNom`) VALUES
(1, 'Admin'),
(100, 'Utilisateur');

INSERT INTO `T_UTILISATEURS` (`id_utilisateur`, `utiPseudo`, `utiEmail`, `utiMdp`, `utiAdresse`, `utiRole_id`, `utiCp_id`) VALUES
(1, 'admin', 'cesi@viacesi.fr', '933370d0a9ea06922ca41c093bb27fcdd7104cf1', '17 rue des moches', 1, 1);

INSERT INTO `T_UTILISATEURS` (`id_utilisateur`, `utiPseudo`, `utiEmail`, `utiMdp`, `utiValide`, `utiToken`, `utiTelAffiche`, `utiTel`, `utiDesactive`, `utiDateDesactive`, `utiDescription`, `utiAdresse`, `utiRole_id`, `utiCp_id`, `utiAdresseAffiche`, `utiLatitude`, `utiLongitude`) VALUES
('2', 'Brise Massue', 'briseMassue@mail.com', '933370d0a9ea06922ca41c093bb27fcdd7104cf1', '0', NULL, '0', NULL, '0', NULL, NULL, 'vdvdvd', '100', '1', '0', '49.4773', '1.09151');

INSERT INTO `T_CATEGORIE` (`id_categorie`, `catNom`) VALUES
('1', 'Fruit'),
('2', 'Légume');

INSERT INTO `T_UNITE` (`id_unite`, `uniLibelle`) VALUES
('1', 'Kg'),
('2', 'Piece');

INSERT INTO `T_PRODUITS` (`id_produit`, `proNom`, `proCategorie_id`, `proImg`) VALUES
(1, 'Tomate', 1, 'tomate.png'),
(2, 'Haricot vert', 2, 'haricot_vert.jpg'),
(3, 'Radis', 2, 'radis.jpg'),
(4, 'Banane', 1, 'banane.png'),
(5, 'concombre', 1, 'concombre.jpg'),
(6, 'Fraise', 1, 'fraise.jpg'),
(7, 'orange', 1, 'orange.jpg'),
(8, 'pomme', 1, 'pomme.jpg'),
(9, 'salade', 2, 'salade.jpg');

INSERT INTO `T_PRODUITS_UTILISATEURS` (`id_produit_utilisateur`, `puVendeur_id`, `puProduit_id`, `puCommentaire`, `puQuantite`, `puUnite_id`, `puDesactive`) VALUES
(1, 2, 1, NULL, 5, 1, 0),
(2, 2, 2, NULL, 3, 1, 1),
(3, 2, 2, 'haricottttttttttttttttttttttttttt', 5, 1, 0),
(4, 2, 1, NULL, 10, 1, 0),
(5, 2, 2, NULL, 15, 1, 0),
(6, 2, 1, 'Pomodoro', 10, 1, 0),
(7, 2, 3, NULL, 1, 1, 0),
(8, 2, 4, NULL, 5, 1, 0),
(9, 2, 5, NULL, 5, 1, 0),
(10, 2, 7, NULL, 3, 1, 0),
(11, 2, 6, NULL, 5, 1, 0),
(12, 2, 6, NULL, 5, 1, 0),
(13, 2, 8, NULL, 5, 1, 0);
