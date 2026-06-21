-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 21, 2026 at 08:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Kristina', 'Bobek', 'kbobek', '$2y$10$ubFbnqxQ2BKmSWH2HNcvKuebMW6Nkrxo7lYkpDpKskYfa48rPwc0C', 1),
(2, 'Pero', 'Perić', 'pperic', '$2y$10$d0Tjce1i.6X54CaJOm2L7./pJRkV2H6RqptXbEi3h1cyqKXTpHV6i', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(255) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `prikaz` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `prikaz`) VALUES
(1, '21.06.2026.', '« La culture chrétienne, la sécurité, la famille : voilà les valeurs que la Hongrie veut protéger »', 'Entretien  Les positions du gouvernement de Viktor Orbán sont-elles encore compatibles avec le Parti populaire européen ? Entretien avec Katalin Novák, secrétaire d’Etat à la Famille et vice-présidente du Fidesz, le parti du Premier ministre hongrois.', 'Alors qu’approchent les élections européennes, le Premier ministre hongrois Viktor Orbán se distancie de plus en plus du Parti populaire européen (PPE), dont son parti, le Fidesz, est membre au sein du Parlement européen, aux côtés de la CDU de la chancelière allemande Angela Merkel et de LR de Laurent Wauquiez. Les valeurs qu’il défend sont-elles encore compatibles avec le PPE ?\r\nKatalin Novák, secrétaire d’Etat à la Famille et vice-présidente du parti au pouvoir, répond à nos questions sur la politique familiale, fer de lance de la révolution conservatrice initiée par le gouvernement hongrois, et sur les tensions entre le Fidesz et le PPE.', 'p1.jpg', 'Politique', 0),
(3, '21.06.2026.', '« Les Européens, ce n’est pas le problème » : en Autriche, une extreme droite banalisé', 'Depuis que le FPÖ est entré au gouvernement, il diffuse son nationalisme identitaire partout, sans complexe, jusque dans les fêtes foraines.', 'La fête foraine bat son plein. Une grande roue domine le Danube. Les autotamponneuses se lancent furieusement les unes contre les autres. Les haut-parleurs crachent de la musique pop américaine. Les enfants promènent leurs parents. Ce 1er mai, en plein cœur de Linz, 200 000 habitants, capitale de la Haute-Autriche, berceau historique du nazisme, les Autrichiens fêtent les travailleurs en déambulant entre les stands de tir au pigeon et les vendeurs de knödels, sorte de quenelles de pommes de terre et de mie de pain, et de käsekrainers, des saucisses fumées et farcies au fromage.\r\nUne grande tente longe l’allée principale. Dehors, les pancartes du brasseur Kaiser semblent indiquer qu’il s’agit juste de l’endroit idéal pour étancher sa soif avec une pinte de bière. A l’intérieur, c’est une tout autre histoire : plus de 5 000 de sympathisants du FPÖ (le Parti de la liberté d’Au…\r\n\r\n', 'p2.jpg', 'Politique', 0),
(4, '21.06.2026.', 'L’Europe, proie des vampires du populisme', 'Salvini, Le Pen et leurs amis ne proposent rien d’autre que de nous offrir aux canines de nouveaux maîtres américains, chinois ou russes.', 'Ces deux-là s’échangent de brûlants serments, se promettent « d’écrire l’Histoire ensemble » et font campagne bras dessus, bras dessous. Le 18 mai prochain, à Milan, « Marine » a rendez-vous avec « Matteo ». A l’occasion d’un meeting commun, la présidente du Rassemblement national et le « ligueur » italien, ministre verrouillé de l’Intérieur, vanteront les mérites de leur « nouvelle Europe » et se lanceront à la conquête des électeurs dans l’espoir de devenir, avec le renfort de leurs amis démagogues de tout poil, la troisième force du prochain Parlement de Bruxelles, talonnant les cacochymes conservateurs ou sociaux-démocrates.\r\n\r\nBienvenue sur le continent des cadors du populisme ! Frontières fermées, nationalisme exacerbé et démocratie encadrée… Les marchands de désillusion ont pris la main à Budapest, à Varsovie, à Vienne. Ils progressent en Espagne dans le souvenir du franquisme, en Allemagne où 92 députés xénophobes déstabilisent la grande coalition d’Angela Merkel et, bien sûr, en France dans l’arrière-boutique de la PME Le Pen & Co. La fièvre touche aussi bien les pays du sud de l’Europe, broyés par la crise économique, que les nations du Nord, prospères et en plein redémarrage économique, comme la Suède, le Danemark, les Pays-Bas ou l’Autriche.', 'p3.jpeg', 'Politique', 0),
(5, '21.06.2026.', 'Haut-Rhin : entre Colmar et Mulhouse, les hauts et les bas du marché immobilier', 'La demande reste soutenue dans le département, avec des écarts de prix toujours gigantesques entre la cité cossue et touristique et la ville industrielle au centre paupérisé.', 'Plus de deux milliards… c’est le nombre, en comptant les replay, de spectateurs ayant découvert à l’été 2018 le Bistrot des Lavandières, situé au cœur de la Petite-Venise de Colmar, dans l’émission de téléréalité « Chinese Restaurant ». Depuis que les stars chinoises ont quitté les fourneaux, le nombre de leurs compatriotes venus visiter ce condensé d’Alsace, avec ses maisons à colombages le long des canaux, a plus que doublé. Un afflux de touristes, dans une ville qui en accueillait déjà 4 millions par an, qu’il faut donc héberger.\r\nEn conséquence, « l’acquéreur lambda ne peut plus espérer trouver un bien en hypercentre », constate Mathieu Klein, de Century 21. Les petites surfaces y sont à présent toutes réservées à Airbnb, comme ce 27-m2 bien situé dans une bâtisse avec ascenseur – une rareté –, vendu 80 000 € soit près de 3&…', 'i1.jpg', 'Immobilier', 0),
(6, '21.06.2026.', 'Dans la Meuse et les Vosges, la grisaille immobiliére', 'Le prix du mètre carré a beau baisser, les ventes ne repartent pas. Seuls les biens performants énergétiquement tirent leur épingle du jeu.', 'Dans la Meuse, « le marché semble reprendre doucement, mais l’offre et la demande restent faibles », souligne Rachel Friedrich, cogérante des agences Friedrich Immobilier. Les jeunes, notamment, demeurent pénalisés par la frilosité des banques et la baisse de leur pouvoir d’achat. Pourtant, les prix sont bas : en moyenne, il faut compter 1 000 €/m2 pour un appartement et 1 100 €/m2 pour une maison, selon notre baromètre. Ces prix sont en baisse de 5 % depuis 2022, et bien davantage quand les biens sont à rénover ou ont un mauvais DPE. « Les acquéreurs privilégient les maisons sans défaut. Même les biens étiquetés E sont boudés », note Rachel Friedrich.\r\nPour leur premier achat, les couples ont une enveloppe de 100 000 à 120 000 €, avec laquelle ils peuvent trouver une petite maison de village ancienne et mitoyenne. Pour s’installer dans un pavillon récent avec 1 000 à 2000 m2 de terrain, il faut disposer d’au moins 150 000 €. A Commercy, un pavillo…', 'i2.jpg', 'Immobilier', 0),
(7, '21.06.2026.', 'A Nancy, un horizon immobilier radieux', 'Le marché nancéien se porte toujours aussi bien. Et pour cause : les prix relativement bas et les taux bancaires attractifs permettent l’acquisition de biens qualitatifs sans pour autant perdre en pouvoir d’achat.', '« Il devrait y avoir des files d’attente dans les banques », affirme Eric Junger, courtier et directeur adjoint chez Crédit Expert, tant le marché nancéien est favorable. Un avis partagé par l’ensemble des acteurs du secteur immobilier, qui constatent que le volume des ventes est en constante hausse depuis 2016, « ce qui assure du mouvement sur le marché, autre indicateur de sa bonne forme », souligne Damien Gégout, notaire et membre de l’observatoire de l’immobilier de Meurthe-et-Moselle.\r\nLes taux bancaires, eux, « ne remontent pas, et restent à un niveau très bas », ajoute-t-il, ce qui séduit les jeunes actifs. Ainsi, les achats des primo-accédants représentent plus d’un tiers des transactions réalisées. « Aujourd’hui, un locataire peut acquérir un bien similaire à celui qu’il occup…', 'i3.jpg', 'Immobilier', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
