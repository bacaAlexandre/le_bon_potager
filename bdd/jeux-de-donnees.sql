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