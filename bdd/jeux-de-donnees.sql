INSERT INTO `t_departement` (`id_departement`, `depLibelle`) VALUES
(1, 'Seine-maritime');

INSERT INTO `t_ville` (`id_ville`, `vilLibelle`, `vilDepartement_id`) VALUES
(1, 'Rouen', 1);

INSERT INTO `t_code_postal` (`id_code_postal`, `cpLibelle`, `cpVille_id`) VALUES
(1, '76000', 1);

INSERT INTO `t_roles` (`id_role`, `rolNom`) VALUES
(1, 'Admin'),
(100, 'Utilisateur');

INSERT INTO `t_utilisateurs` (`id_utilisateur`, `utiPseudo`, `utiEmail`, `utiMdp`, `utiAdresse`, `utiRole_id`, `utiCp_id`) VALUES
(1, 'admin', 'cesi@viacesi.fr', 'viaCESI76', '17 rue des moches', 100, 1);

INSERT INTO `t_utilisateurs` (`id_utilisateur`, `utiPseudo`, `utiEmail`, `utiMdp`, `utiValide`, `utiToken`, `utilTelAffiche`, `utiTel`, `utiDesactive`, `utiDateDesactive`, `utiDescription`, `utiAdresse`, `utiRole_id`, `utiCp_id`, `utiAdresseAffiche`)
VALUES ('2', 'Brise Massue', 'briseMassue@mail.com', 'briseMassue76', '0', NULL, '0', NULL, '0', NULL, NULL, 'vdvdvd', '100', '1', '0');

INSERT INTO `t_categorie` (`id_categorie`, `catNom`) VALUES ('1', 'Fruit'), ('2', 'Légume');

INSERT INTO `t_unite` (`id_unite`, `uniLibelle`) VALUES ('1', 'Kg'), ('2', 'Piece');

INSERT INTO `t_produits` (`id_produit`, `proNom`, `proCategorie_id`, `proImg`, `proUnite_id`) VALUES ('1', 'Tomate', '1', NULL, '1'), ('2', 'haricot vert', '2', NULL, '1');

INSERT INTO `t_produits_utilisateurs` (`id_produit_utilisateur`, `puVendeur_id`, `puProduit_id`, `puCommentaire`, `puQuantite`) VALUES ('1', '2', '1', NULL, '5'), ('2', '2', '2', NULL, '3');