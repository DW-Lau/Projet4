-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 07 mars 2018 à 08:17
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet4`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_billets` int(11) NOT NULL,
  `billetitre` text NOT NULL,
  `commbillet` text NOT NULL,
  `date_ecrit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `id_billets`, `billetitre`, `commbillet`, `date_ecrit`) VALUES
(1, 1, 'Le Début', 'Duis bibendum, tortor sed maximus aliquam, sapien metus pretium purus, et efficitur lectus libero ac nulla. Duis luctus ut enim eu porttitor. Duis mauris est, bibendum eget finibus nec, volutpat mollis nunc. Praesent nec tempor mi, sed iaculis felis. Donec in est quis leo elementum tempor nec in lectus. Ut nisl mauris, maximus eu lorem id, consectetur elementum dui. Pellentesque nisi quam, placerat nec ornare in, laoreet volutpat lorem. Aenean sem sapien, suscipit at ultricies sit amet, maximus non nulla. Nulla tempor nulla ac odio ullamcorper tincidunt. Proin lobortis luctus magna, sit amet ultrices enim vehicula sit amet. Nullam ac egestas metus. Proin tempor nibh quis eros pulvinar porta. Donec ornare sapien justo. Etiam bibendum euismod tellus non ultrices. Vivamus mattis efficitur lobortis. Vivamus convallis nisl vel posuere hendrerit.', '2018-03-02 10:21:30'),
(2, 2, 'La suite', 'Vivamus gravida ultrices leo, et varius nisl pulvinar vestibulum. Sed varius finibus turpis, eget lacinia nisi convallis in. Praesent aliquet eleifend eros, vitae volutpat dolor laoreet vel. Proin a purus finibus, gravida lorem vitae, euismod arcu. Praesent velit urna, molestie sed risus quis, tempus interdum sapien. Donec varius ante urna, quis accumsan ligula egestas eget. Aliquam ut maximus est, et egestas felis. Praesent hendrerit ligula at nunc molestie interdum. Vestibulum nec facilisis augue. Etiam varius ullamcorper risus, lacinia consectetur velit volutpat at.\r\n\r\n', '2018-03-02 12:27:39');

-- --------------------------------------------------------

--
-- Structure de la table `chapitres`
--

DROP TABLE IF EXISTS `chapitres`;
CREATE TABLE IF NOT EXISTS `chapitres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chap` int(11) NOT NULL,
  `titre` text NOT NULL,
  `textchap` text NOT NULL,
  `date_edition` datetime NOT NULL,
  `comms` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapitres`
--

INSERT INTO `chapitres` (`id`, `id_chap`, `titre`, `textchap`, `date_edition`, `comms`) VALUES
(1, 1, 'Chapitre 1: Le commencement', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque mollis ac urna eu accumsan. Duis sagittis, magna id accumsan pretium, nibh ante venenatis neque, vel tincidunt felis massa id arcu. Mauris vitae erat et lacus bibendum semper sit amet vel leo. Sed eu felis turpis. Duis vel arcu ex. Sed felis mi, pharetra vitae ipsum vitae, ullamcorper facilisis nisi. In tempus dictum odio, eu imperdiet libero malesuada a. Praesent vel metus ornare, viverra nunc a, vehicula velit. Vestibulum in nisl venenatis, convallis turpis at, dignissim ligula. Ut congue ut dolor vel sodales.\r\n\r\nDonec diam justo, malesuada pellentesque risus tempus, placerat facilisis felis. Aliquam non justo facilisis mi vehicula mattis ac in nunc. Nam tempor luctus enim a consectetur. Sed dignissim leo at magna tristique, scelerisque tincidunt neque condimentum. Nulla ex nibh, scelerisque non nisl at, pharetra scelerisque dolor. Nam arcu purus, imperdiet eget luctus sit amet, luctus in arcu. Sed quis dui tortor. Proin hendrerit ligula odio, in eleifend odio fermentum eu.\r\n\r\nQuisque fermentum magna ut ligula laoreet porta. Proin fermentum ex at purus fermentum porttitor vitae efficitur elit. Mauris mattis condimentum feugiat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam tristique lacinia risus sit amet venenatis. Aliquam ut nunc nisi. Etiam nisl erat, pretium nec maximus vitae, tristique sed est. Aenean et leo eu metus pretium sollicitudin nec posuere turpis. Pellentesque cursus auctor urna, at vestibulum risus euismod quis.\r\n\r\nNam sit amet bibendum nulla. Ut in feugiat dolor, eget congue sem. Proin quis massa iaculis, molestie tellus auctor, sagittis metus. Pellentesque dignissim, turpis interdum tincidunt vestibulum, lectus ipsum aliquam metus, quis feugiat nisl leo in metus. Nunc fermentum nec ipsum venenatis congue. Ut rutrum orci cursus efficitur rutrum. Phasellus ultrices convallis velit in molestie. Donec sollicitudin ante non augue dapibus lobortis sit amet eu dolor. Quisque ornare metus et feugiat aliquet. Maecenas semper sem odio, non efficitur elit egestas vel. Vivamus ipsum mauris, mattis non consectetur ac, congue et leo. Integer convallis nisl odio, at laoreet neque pharetra vitae. Nullam a euismod mauris. Pellentesque tincidunt elit eu erat lobortis molestie ac non nibh. Donec quis erat sit amet tortor lobortis efficitur.\r\n\r\nVivamus aliquet varius ornare. Phasellus cursus tincidunt quam, vel tempor ipsum iaculis id. Maecenas nec felis scelerisque, viverra urna tristique, viverra velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non cursus tellus, ac blandit dui. Fusce purus erat, lobortis vel venenatis id, semper ac tortor. Maecenas pharetra neque in quam bibendum, elementum feugiat augue hendrerit. Donec quis odio sed diam elementum consequat et ut nibh. Proin eget dui volutpat, aliquam lectus vel, elementum felis. Sed suscipit rutrum nisl, eget luctus leo vulputate sit amet. Cras nec interdum nibh. Nunc quis lorem sit amet lacus posuere porttitor a a nisi. Sed fringilla turpis tellus, id tincidunt lacus dignissim sed.\r\n\r\nVivamus urna velit, lacinia pulvinar lacinia ut, cursus a augue. Donec eu pellentesque erat. Aliquam viverra efficitur arcu et vestibulum. Donec in mi elit. Aliquam tempor sapien ut ante euismod feugiat. In maximus et orci in pulvinar. Nullam non orci et neque ullamcorper tincidunt sit amet id elit. Aliquam vel lorem non nisl iaculis tempus quis vel nibh. Vivamus enim massa, interdum ac vestibulum ut, interdum eget nibh. Vestibulum urna turpis, tempor tincidunt gravida vel, imperdiet ac augue. Quisque justo felis, molestie eget enim nec, convallis sodales metus. Sed id diam ipsum. Cras tempor vestibulum faucibus. Mauris lorem justo, porttitor vel finibus eget, efficitur ullamcorper turpis.\r\n\r\nNunc et rhoncus tellus. Nulla ac viverra tortor, et imperdiet massa. Donec pulvinar in magna at congue. Donec condimentum sem in feugiat iaculis. Pellentesque finibus risus a massa blandit malesuada. Aliquam varius sem at felis ornare interdum. Nullam ac efficitur elit. Nam libero neque, placerat ut eros eu, fringilla blandit neque. Suspendisse sed eros at metus scelerisque imperdiet.', '2018-03-02 15:31:38', ''),
(2, 2, 'Chapitre 2: La suite de chap1', 'Cras eu gravida ipsum. Phasellus sit amet enim at dui viverra tincidunt ac quis lorem. Nulla eget faucibus orci. Donec tortor velit, imperdiet vitae magna at, sodales facilisis sapien. Fusce placerat nulla diam, nec consequat nunc venenatis et. Sed eu ultricies nisi, tristique condimentum ex. Suspendisse mauris urna, elementum et sagittis ut, auctor at lorem.\r\n\r\nNullam id sem blandit, dictum massa non, sodales augue. Nunc quis viverra lacus. Duis vitae commodo lacus. Sed tortor turpis, venenatis vitae laoreet a, gravida gravida lorem. Phasellus posuere molestie dolor interdum efficitur. Pellentesque sagittis magna eget est tristique, id pulvinar odio scelerisque. Etiam quis arcu et magna malesuada tincidunt non id nisl. Etiam in accumsan nulla, finibus dapibus ex. Vestibulum efficitur, nisl quis pretium dapibus, arcu elit congue nulla, quis pharetra lectus tellus eu metus. Nullam consectetur vitae tellus vitae aliquet. Nullam consectetur orci ac tellus facilisis feugiat. Mauris justo lacus, pellentesque in ante tempor, pretium tincidunt augue. Cras vel urna tempor nisl placerat tempus. Nullam sit amet sodales tortor. Aenean semper ante eu est vestibulum, tristique aliquam nibh facilisis.\r\n\r\nAliquam posuere in leo vitae cursus. Phasellus ut eros mauris. Quisque sit amet neque faucibus, tempor ex laoreet, ultrices augue. Vestibulum luctus facilisis turpis. Praesent consectetur, ligula eu aliquam sollicitudin, neque elit posuere risus, et vehicula mauris ante condimentum felis. Pellentesque quis porta mauris. Ut vestibulum hendrerit mi facilisis rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed vel nibh risus. Nam vehicula mi in nibh vehicula, eget malesuada tortor malesuada. Nulla aliquet nisl dictum nulla pulvinar tincidunt.\r\n\r\nMaecenas quis pulvinar augue. Duis malesuada consequat lorem sagittis egestas. Duis leo arcu, scelerisque et lacinia eget, ultrices eu eros. Phasellus ullamcorper massa et ultrices consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tempus, erat nec fringilla consequat, orci velit condimentum urna, in consequat lorem nisl id tortor. Suspendisse fringilla lectus id magna vehicula ullamcorper. Vestibulum sed imperdiet lacus. Phasellus lacinia, ligula in bibendum scelerisque, enim nisl sollicitudin turpis, ac ultrices lacus augue sit amet nibh. Vestibulum sodales lacinia nunc non eleifend. Sed vel blandit sapien. Nullam quis vehicula sapien. Praesent quis fringilla nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet purus lacus.\r\n\r\nNullam sollicitudin et neque bibendum efficitur. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam vitae sem sed urna placerat venenatis. Fusce hendrerit diam dui, eu malesuada metus venenatis quis. Vivamus ut ornare felis. Mauris commodo, ipsum quis pharetra malesuada, mi dolor placerat mauris, eget finibus ipsum nisl non risus. Nam vulputate lacinia dolor a porttitor. Sed quis eleifend lorem, id tincidunt ex. Quisque ultrices mollis velit at varius. Mauris nec massa in arcu imperdiet pretium. Aliquam ut laoreet est. Nam lobortis at velit ac varius. Aenean aliquam, ligula non vehicula molestie, arcu velit semper diam, id bibendum ante nisi nec sem. Ut auctor dui erat, nec faucibus velit sodales in.\r\n\r\nInteger quis aliquam nunc. Ut dictum dictum ligula, a pulvinar ligula hendrerit a. Praesent vitae turpis facilisis, maximus nunc eu, pharetra sem. Pellentesque sodales tincidunt risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus non enim purus. Duis sit amet orci magna. Sed vitae massa id velit commodo convallis. Donec erat neque, lacinia in est non, commodo euismod orci.\r\n\r\nMaecenas in massa dolor. Donec accumsan efficitur diam facilisis lacinia. Pellentesque at purus et nisl porttitor ultricies. Nullam varius ante purus, placerat consequat felis bibendum sed. Sed auctor, lectus id tempor fringilla, metus nisl molestie tortor, non blandit tortor leo non felis. Aenean rutrum finibus erat sed hendrerit. Maecenas sed viverra risus, a pretium nisl. Fusce est ante, suscipit sit amet sem eget, tincidunt scelerisque sapien. Phasellus convallis tellus eu accumsan accumsan. Aenean sit amet nibh dapibus, gravida lectus ac, molestie velit.', '2018-03-03 11:23:44', '');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comm` int(11) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  `date_poste` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `signature` text,
  `date_ins` datetime NOT NULL,
  `nbre_postes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
