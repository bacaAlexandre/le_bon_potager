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

INSERT INTO `T_UTILISATEURS` (`id_utilisateur`, `utiPseudo`, `utiEmail`, `utiMdp`, `utiValide`, `utiToken`, `utiTelAffiche`, `utiTel`, `utiDesactive`, `utiDateDesactive`, `utiDescription`, `utiAdresse`, `utiRole_id`, `utiCp_id`, `utiAdresseAffiche`) VALUES
('2', 'Brise Massue', 'briseMassue@mail.com', '933370d0a9ea06922ca41c093bb27fcdd7104cf1', '0', NULL, '0', NULL, '0', NULL, NULL, 'vdvdvd', '100', '1', '0');

INSERT INTO `T_CATEGORIE` (`id_categorie`, `catNom`) VALUES
('1', 'Fruit'),
('2', 'Légume');

INSERT INTO `T_UNITE` (`id_unite`, `uniLibelle`) VALUES
('1', 'Kg'),
('2', 'Piece');

INSERT INTO `T_PRODUITS` (`id_produit`, `proNom`, `proCategorie_id`, `proImg`) VALUES
('1', 'Tomate', '1','tomate.png'),
('2', 'haricot vert', '2','haricot_vert.jpg');

INSERT INTO `T_PRODUITS_UTILISATEURS` (`id_produit_utilisateur`,`puVendeur_id`, `puProduit_id`, `puCommentaire`, `puQuantite`,  `puUnite_id`, `puDesactive`) VALUES
('1', '2', '1', NULL, '5', '1', '0'),
('2', '2', '2', NULL, '3', '1', '1');