-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 15, 2016 at 11:41 PM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.6.23-1+deprecated+dontuse+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_w3f`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date_add` int(11) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date_add`, `author`) VALUES
(1, 'Doloribus vel ipsum et qui.', 'Repellendus tenetur et nam ratione nostrum temporibus. Doloremque quia provident voluptates sunt illum. Doloremque quod nesciunt quo vel.\n\nId dolorem id cumque sed sunt. Doloribus voluptates tempora ipsum non cumque atque. Saepe eius id et consectetur iusto. Deleniti qui nisi nihil quod eligendi sed.', 100496638, 'Éléonore du Lebreton'),
(2, 'Ea est aut voluptatibus voluptas consequuntur.', 'Aut et inventore dignissimos voluptatibus accusamus et iusto. Temporibus delectus libero voluptatibus reiciendis assumenda qui quia. Exercitationem animi molestiae perspiciatis voluptates et laudantium. Molestiae delectus esse voluptatem nemo et eos libero.\n\nConsequuntur enim autem illum magnam quaerat nisi. Laboriosam quidem id voluptas mollitia laboriosam non quia. Aut veritatis aperiam quis. Optio corporis quia recusandae eligendi dolore nam sit.', 52803011, 'Olivie du Gaillard'),
(3, 'Quod esse blanditiis velit.', 'Natus cupiditate repellendus distinctio sed nihil modi. Voluptatem quaerat quis beatae a rerum vel recusandae. Unde est quia voluptatem et voluptates.\n\nId omnis aut fuga autem. Nisi natus non ut assumenda rerum dolorum. Incidunt sed odit aut. Perferendis iure numquam sed id.', 504959862, 'Théodore Lucas-Denis'),
(4, 'Maiores et omnis atque ducimus tenetur.', 'Omnis sit iste quam modi illo architecto. Facere ut eius consequatur non perferendis. Dolor reprehenderit necessitatibus numquam et voluptas totam vitae.\n\nEnim in suscipit cumque sit id. Neque impedit dolorum asperiores officiis. Non expedita aut veritatis et est. Similique ea possimus labore fugit autem est reiciendis.', 504297951, 'Anne Dufour'),
(5, 'Quo eum velit facilis sunt et commodi.', 'Nesciunt aliquid assumenda vel. Dignissimos voluptas consequatur aut numquam molestias voluptatem et ipsum. Accusantium dolor qui voluptas est sed praesentium nihil. Non eaque sit reprehenderit et.\n\nSit iusto non quia. Eligendi eius voluptas sit similique quis officia dolorem ut. Molestiae aliquid ex non nisi vitae esse. Ex hic modi odit pariatur est illo est.', 1155337000, 'Agathe Loiseau'),
(6, 'Sit eius adipisci quia sed dolores fuga rerum.', 'Suscipit qui esse perspiciatis qui facilis consequuntur. Voluptatibus accusantium iure sit voluptatum labore est eum nihil. Laborum illo ipsum ab quos facere harum.\n\nExpedita praesentium ut praesentium reiciendis incidunt. Sed aut quaerat ut mollitia. Non cumque laborum beatae quo esse saepe eius eos. Et debitis quia alias beatae velit in maiores.', 87282378, 'Guillaume-Michel Arnaud'),
(7, 'At doloremque id ullam officia voluptatibus.', 'Ex libero sapiente quis et explicabo est sunt. Dolor corrupti in non cumque. Quaerat harum temporibus officiis ad dicta sit facere. Aperiam est quisquam voluptatem in iusto.\n\nAutem delectus et earum et minima. Nisi quo quia odio nemo est culpa deleniti aperiam. Exercitationem sed error corrupti qui voluptatem. Quibusdam ut aut quasi modi ut ut qui.', 918378385, 'Victoire Dupont'),
(8, 'Iste consequatur magnam quisquam occaecati.', 'Voluptatem cupiditate blanditiis consequuntur dolorem repellendus unde sit libero. Odio vel vel ut blanditiis. Eum molestiae quasi et sunt sunt. Ipsa sunt rerum a soluta.\n\nEt officiis consequatur aut tempore ratione fugiat. Quam asperiores et hic provident magni quaerat enim repellendus. Vero aut atque quia velit dolorem.', 37482963, 'Anaïs Coste'),
(9, 'Accusamus aut quaerat itaque qui nobis odio.', 'Tempora nemo aut maiores dolore architecto omnis iure. Ipsam aut et tenetur voluptates dolorem dolores tempore. Et officiis culpa facilis expedita excepturi. Minima minus nesciunt repellat reiciendis nisi.\n\nSed officia quia modi et. Sequi cum nam at tempora voluptas dolor fugiat. Similique ipsam tempora aut qui. Dolorum culpa quam et debitis.', 948384822, 'Camille Morin'),
(10, 'Id eum laudantium et ab cum libero rerum.', 'Omnis sint et quidem voluptas. Voluptas qui debitis aut sed culpa necessitatibus quia autem. Nihil sint magnam neque dolorum quia ut consequatur. Dicta corporis dignissimos atque et.\n\nVoluptatem cupiditate molestiae qui dolor expedita qui ipsum repellendus. Dolores officia sunt voluptas quae. Repudiandae quaerat dolorem aperiam tenetur. Itaque impedit sed rerum sed nisi labore.', 677773302, 'Luc de la Baron'),
(11, 'Tempore tempore et non sit in soluta.', 'Et in facere ad quisquam adipisci voluptatem. Hic iste voluptas eum. In laborum sed asperiores dolorem.\n\nMollitia numquam beatae nisi accusantium ratione officia sed. Ab ut assumenda nemo placeat. Optio officia vitae officia dolorem nam fugit nulla. Aut laudantium ipsum quibusdam enim rerum et.', 1324163672, 'Victoire Moulin-Pons'),
(12, 'Atque et aut est modi impedit id.', 'Commodi ut quisquam ut dolorem expedita ratione voluptatem. Ipsam quisquam eos blanditiis nisi aut. Est architecto similique quia. Quae libero non delectus ut aspernatur perspiciatis.\n\nOdit ut qui nobis unde ullam. Sint ad impedit inventore error. Consequatur id modi delectus qui commodi. In enim nostrum delectus perferendis officia ut ut.', 435355010, 'Bernard Petitjean'),
(13, 'Qui minus explicabo sunt quo.', 'Rerum cumque non eveniet. Consequatur autem delectus corporis sit autem ut ad. Eligendi amet esse temporibus itaque beatae sapiente voluptatem.\n\nAliquid aut nihil aut. Ut sit dolores qui et provident. Asperiores optio dolor fugiat vitae. Facilis et eius quam perspiciatis quo ea. Commodi qui quos voluptas omnis quia ex.', 1130882222, 'Margaret-Éléonore Jacquot'),
(14, 'Esse suscipit possimus velit aut voluptatibus.', 'At neque veritatis nisi aut rem aut. Quo est eum architecto aperiam aliquam. Consequatur enim sunt vitae quia provident debitis. Voluptatem et illo nulla est aut at.\n\nPraesentium ullam non dolorem asperiores ut rerum. Culpa excepturi necessitatibus porro vel necessitatibus officiis sed. Molestiae ipsa cupiditate expedita similique.', 1159742890, 'Noël de la Dijoux'),
(15, 'Quo sed non ut.', 'Modi ut veritatis odio asperiores consectetur. Exercitationem sit vero est aut consequatur rerum quo.\n\nDistinctio quasi impedit error velit eum possimus. Ut doloremque ea ut aut est illum. Ut et eum iure veritatis. Quos nihil recusandae non earum.', 1280621571, 'Olivie Lemaitre'),
(16, 'Eaque dolorum nulla explicabo molestiae.', 'Qui reprehenderit quibusdam ut. Quam molestias maiores non occaecati. Et laboriosam voluptas amet ea reiciendis maxime iusto.\n\nPariatur et beatae commodi voluptas et necessitatibus incidunt. Et at voluptate omnis et placeat. Neque et eos sed dolorum. Aut eos cum amet.', 1445678537, 'Hugues de Bodin'),
(17, 'Id temporibus qui vero vel alias autem non.', 'Rerum odit nihil molestiae adipisci possimus at maiores. Pariatur in ut velit at. Inventore vel excepturi maiores aut sed aut eos. Voluptatem non quaerat neque fugit minima.\n\nVoluptatem dolorem ad maiores eum saepe. Perspiciatis fuga necessitatibus dolor neque. Suscipit harum et dolore maxime. Dolorum esse est est nobis in voluptas.', 694220050, 'Aimé Loiseau'),
(18, 'Officiis est debitis beatae porro vero enim vel.', 'Expedita quidem nihil et nobis excepturi eos earum. Eos in est veniam veritatis dolor dolore. Eum dolore odio est. Quia vero quia qui eveniet.\n\nProvident ad enim delectus tenetur sit delectus. Qui laudantium blanditiis dolores impedit. Nobis excepturi voluptatibus earum recusandae.', 455610022, 'René Gay'),
(19, 'Saepe temporibus quo et corrupti odio illo atque.', 'Illo eius molestiae est eos est ab porro. Assumenda ut itaque nulla maxime. Repellat nihil minima quo qui earum amet. Nemo blanditiis voluptas similique est exercitationem est.\n\nOmnis inventore voluptates tempore exercitationem enim ut sint alias. Molestiae magni perferendis et nobis quasi quia. Odit est in aut qui dolore cumque.', 274050929, 'Théophile-Gilles Lefevre'),
(20, 'Quisquam similique ipsa iure.', 'Accusantium eligendi voluptate odio quibusdam. Aut rem iusto explicabo accusantium unde enim. Vero totam aut molestias quae minima dolorem fuga. Sed et laboriosam ab dolorum cumque dolorum.\n\nEt nemo illum atque est. Voluptatum consequatur aliquam voluptatem et temporibus officiis accusantium. Autem earum eos atque perspiciatis est porro. Hic aut autem qui.', 393607557, 'René Simon'),
(21, 'Qui dolores quis et iure perferendis ipsum.', 'Commodi pariatur aliquam cum in enim rerum vel est. Est similique quisquam quaerat molestiae tenetur.\n\nIure animi officia libero. Amet voluptatem modi aut doloribus. Voluptatem voluptatibus qui quos autem dolore. Consectetur debitis architecto animi labore occaecati est.', 324550355, 'Nathalie Pelletier'),
(22, 'Consequatur nostrum et similique sit a aut et.', 'Qui cupiditate dolorem quia quos optio eligendi. Deserunt placeat repellendus rerum et. Cumque a et quia.\n\nEt voluptate dolore voluptatem laborum nulla. Exercitationem ratione aut maiores voluptas quia quia rerum.', 1185613155, 'Timothée Lebreton'),
(23, 'Quis sit molestiae fuga.', 'Minima voluptas voluptatem error ipsum aliquid dignissimos. Saepe et eaque laboriosam sit non dignissimos. Sint atque minima voluptatibus aut voluptatum tempore quo. Non sit quas dignissimos blanditiis voluptas ut.\n\nVoluptas cum asperiores maiores explicabo. Non at omnis sapiente consequatur cumque dolorum. Sit ut perspiciatis velit.', 580985181, 'Nicolas Bernier'),
(24, 'Quos consequatur possimus quae pariatur.', 'Dolor enim sed voluptatem saepe doloribus. Consectetur cum qui aut quasi enim aut adipisci eum. Praesentium laboriosam ab amet et dolorum.\n\nQuae et non expedita totam. Dolores quia ullam quas accusantium iusto deleniti dolores aperiam. Minima impedit exercitationem eum delectus tenetur.', 1447363196, 'Claire-Diane Gaillard'),
(25, 'Delectus hic velit consequatur ut quos quo.', 'Commodi quo et perferendis consequuntur est alias rerum ab. Eius sit laboriosam corrupti dolorum deleniti.\n\nBlanditiis nihil consequatur expedita suscipit sit. Debitis cum qui nulla facere ut error. Nemo voluptas qui dolores.', 1448225319, 'Josette Monnier'),
(26, 'Nisi est voluptate et incidunt porro.', 'Tempore cupiditate ut magni ut. Repellendus eum sunt delectus. Praesentium ab id et quia. Accusantium vero quo quod sit.\n\nQuam libero officiis vero veniam. Deleniti assumenda adipisci corporis et aut qui aut. Sit corporis omnis ea nisi voluptatum. Veniam aut perspiciatis enim eligendi.', 1046281540, 'Gilles Roussel'),
(27, 'Aut hic amet fugiat eum sit quod maiores.', 'Beatae modi dolorem omnis accusantium. Commodi a quia harum. Reiciendis tenetur inventore unde beatae nobis amet ex quia. Sit cupiditate tempora et officia.\n\nNostrum officiis quae sequi ut reprehenderit. Expedita magni incidunt voluptas et aut. Consequuntur nam ipsam quo sint dolores qui neque.', 1305194368, 'Gabriel Schneider'),
(28, 'Architecto deserunt animi maxime inventore ipsum.', 'Expedita sit et eum. Molestiae sint nostrum quo et. Repellendus fugit architecto rerum ad.\n\nAut dolor dolores inventore. Consequatur rerum assumenda qui aut aperiam doloribus. Praesentium ea delectus nemo dolorem tenetur consequuntur vel. Quae dolor et soluta.', 1001168194, 'Nath Gomez'),
(29, 'Sunt impedit qui aliquam incidunt.', 'Impedit et vel inventore odit ratione molestiae amet. Voluptatem modi modi autem quis culpa. Velit dolor enim iusto. Repellat quasi occaecati et sunt. Molestias rerum tenetur nesciunt fugiat eum dolore doloribus.\n\nMaxime dolorum sed itaque at vel praesentium. Aperiam omnis ut quasi esse voluptatem. Quisquam laborum totam ipsa porro sunt voluptate. Officia dolores inventore sed eum autem labore.', 192186587, 'Antoine du Meunier'),
(30, 'Excepturi molestiae id sint in odio.', 'Sunt tempora in atque architecto. Et non consequatur nihil quae dolor. Ratione dolores aut eos ipsum.\n\nSit voluptatibus quaerat doloribus et dolorum doloribus. Id rem quos sit. Nihil sunt dolorum sunt velit ut. Et dolore illo aspernatur magni id.', 1038035771, 'Adélaïde Chauvet-Maillard');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_uniq` (`username`),
  ADD UNIQUE KEY `email_uniq` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
