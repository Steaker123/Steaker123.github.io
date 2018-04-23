-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: esco_ocean
-- ------------------------------------------------------
-- Server version	5.1.73-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `db_back`
--

DROP TABLE IF EXISTS `db_back`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_back` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `bank` double NOT NULL DEFAULT '5900',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_back`
--

LOCK TABLES `db_back` WRITE;
/*!40000 ALTER TABLE `db_back` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_back` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_back_temp`
--

DROP TABLE IF EXISTS `db_back_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_back_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `bank` double NOT NULL DEFAULT '5900',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_back_temp`
--

LOCK TABLES `db_back_temp` WRITE;
/*!40000 ALTER TABLE `db_back_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_back_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_bonus`
--

DROP TABLE IF EXISTS `db_bonus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_bonus`
--

LOCK TABLES `db_bonus` WRITE;
/*!40000 ALTER TABLE `db_bonus` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_bonus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_competition`
--

DROP TABLE IF EXISTS `db_competition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_competition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `1m` double NOT NULL DEFAULT '0',
  `2m` double NOT NULL DEFAULT '0',
  `3m` double NOT NULL DEFAULT '0',
  `4m` double NOT NULL DEFAULT '0',
  `5m` double NOT NULL DEFAULT '0',
  `user_1` varchar(10) NOT NULL,
  `user_2` varchar(10) NOT NULL,
  `user_3` varchar(10) NOT NULL,
  `user_4` varchar(10) NOT NULL,
  `user_5` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_end` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_competition`
--

LOCK TABLES `db_competition` WRITE;
/*!40000 ALTER TABLE `db_competition` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_competition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_competition_users`
--

DROP TABLE IF EXISTS `db_competition_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_competition_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_competition_users`
--

LOCK TABLES `db_competition_users` WRITE;
/*!40000 ALTER TABLE `db_competition_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_competition_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_conabrul`
--

DROP TABLE IF EXISTS `db_conabrul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_conabrul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rules` text NOT NULL,
  `about` text NOT NULL,
  `contacts` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_conabrul`
--

LOCK TABLES `db_conabrul` WRITE;
/*!40000 ALTER TABLE `db_conabrul` DISABLE KEYS */;
INSERT INTO `db_conabrul` VALUES (1,'<p>1. Общие положения.<br />1.1. Настоящее Пользовательское соглашение (далее &laquo;Соглашение&raquo;) регламентирует порядок и условия предоставления услуг сайтом http://cripto.biz/, именуемой далее по тексту &laquo;Организатор&raquo;, и адресовано физическому лицу, желающему получать услуги указанного сайта (далее &laquo;Участник&raquo;.)<br />1.2. Для начала получения услуг участник явно, полно и безоговорочно принимает все условия настоящего Соглашения, и, если вы не согласны с каким-либо условием соглашения, Организатор предлагает вам отказаться от использования его услуг.<br />1.3. Организатор и участник признают порядок и форму заключения настоящего соглашения равнозначным по юридической силе соглашению, заключенному в письменной форме.<br />1.4. Администрация проекта http://cripto.biz/ оставляет за собой право вносить любые изменения и дополнения в Пользовательское соглашение и на сайте, без предупреждения пользователей.<br /><br /><br />2. Термины и Определения.<br />Игра &mdash; вид деятельности, направленный на удовлетворение потребностей человека в развлечении, удовольствии, снятию напряжения, а также на развитие определенных навыков и умений в форме свободного самовыражения человека, не связанных с достижением утилитарных целей и доставляющих радость сами по себе.<br />Игровая площадка &mdash; программно-аппаратный комплекс физических устройств и программного обеспечения, расположенный в глобальной сети Интернет, предназначенный для организации проведения досуга и отдыха.<br />Игра http://cripto.biz/ - экономическая онлайн-игра с &laquo;Виртуальными онлайн деньгами &raquo; - обособленное и уникальное название игровой площадки, принадлежащей организатору и находящейся по адресам в сети интернет http://cripto.biz/, на которой Организатором предоставляются услуги участнику по организации его развлечения, досуга и отдыха в порядке и на условиях, изложенных в настоящем соглашении.<br />Игровой инвентарь &mdash; условная игровая единица для участия в игре, именуемая &laquo;рубли&raquo;, местом учета и хранения которой является игровой счет участника в электронном виде в формате учетной системы игровой площадки &laquo;http://cripto.biz/&raquo;.<br />Игровой счет &mdash; виртуальный счет участника игры, предоставляемый организатором каждому участнику на игровой площадке для учета игрового инвентаря (рублей).<br /><br /><br />3. Предмет соглашения.<br />3.1. Предметом настоящего Соглашения является предоставление организатором участнику услуг по организации досуга и отдыха в игре &laquo;http://cripto.biz/&raquo; в соответствии с условиями настоящего Соглашения. Под такими услугами, в частности, понимаются следующие: услуги по покупке-продаже игрового инвентаря (рублей), ведение учета значимой информации: движения по игровому счету, обеспечение мер по идентификации и безопасности участников, разработка программного обеспечения, интегрируемого в игровую площадку и внешние приложения, информационные и другие услуги, необходимые для организации игры и обслуживания участника в ее процессе на площадке организатора..<br />3.2. Игра в целом, а равно любой ее элемент или любое сопряженное внешнее игровое приложение, созданы исключительно для развлечений. Участник признает, что все виды деятельности в игре на игровой площадке являются для него развлечением. Участник соглашается с тем, что в зависимости от характеристик его аккаунта, степень его участия в игре будет доступна в различной мере.<br />3.3. Участник соглашается, что он несет персональную ответственность за все действия, произведенные с игровым инвентарем (рубли): покупкой, продажей, вводом и выводом, а также за игровые действия на игровой площадке: создание, покупку-продажу, операции со всеми игровыми элементами и другими игровыми атрибутами и объектами, используемыми для игрового процесса.<br />3.4. Участник признает, что степень и возможность участия в развлечениях на сервере игры \"cripto.biz\", являются главными качествами оказываемой ему услуги.<br /><br /><br />4.Права и обязанности сторон.<br />4.1 Права и обязанности участника.<br />4.1.1. Принимать участие в игре &nbsp;могут только лица, достигшие гражданской дееспособности по законодательству страны своей резиденции. Все последствия неисполнения данного условия возлагаются на участника.<br />4.1.2. Степень и способ участия в игре определяются самим участником, но не могут противоречить настоящему Соглашению и правилам игровой площадки.<br />4.1.3. Участник обязан:<br />4.1.3.1. правдиво сообщать сведения о себе при регистрации и по первому требованию Организатора предоставить достоверные данные о своей личности, позволяющие идентифицировать его как владельца аккаунта в игре;<br />4.1.3.2. не использовать игру для совершения каких-либо действий, противоречащих международному законодательству и законодательству страны &mdash; резиденции Участника;<br />4.1.3.3. не использовать недокументированные особенности (баги) и ошибки программного обеспечения игры и незамедлительно сообщать Организатору о них, а так же о лицах, использующих эти ошибки;<br />4.1.3.4. не использовать внешние программы любого рода, для получения преимуществ в игре;<br />4.1.3.5. не использовать для рекламы своей партнерской ссылки, а равно ресурса, ее содержащего, почтовые рассылки и иного вида сообщения лицам, не выражавшим согласия их получать (спам);<br />4.1.3.6. не вправе ограничивать доступ других участников или других лиц к Игре, обязан уважительно и корректно относиться к участникам игры, а так же к Организатору, его партнерам, сотрудникам, самому проекту и его деятельности;<br />4.1.3.7. не обманывать Организатора и участников игры;<br />4.1.3.8. не использовать ненормативную лексику и оскорбления в любой форме;<br />4.1.3.9. не порочить действия других игроков и Администрации;<br />4.1.3.10. не угрожать насилием и физической расправой кому бы то ни было;<br />4.1.3.11. не распространять материалы пропагандирующие неприятие или ненависть к любой расе, религии, культуре, нации, народу, языку, политике, государству, идеологии или общественному движению;<br />4.1.3.12. не рекламировать порнографию, наркотики и ресурсы, содержащие подобную информацию;<br />4.1.3.13. не использовать действия, терминологию или жаргон для завуалирования нарушения обязанностей участника;<br />4.1.3.14. самостоятельно заботиться о необходимых мерах компьютерной и иной безопасности, хранить в секрете и не передавать другому лицу или другому участнику свои идентификационные данные: логин, пароль аккаунта и др., не допускать несанкционированного доступа к почтовому ящику, указанному в профиле аккаунта участника. Весь риск неблагоприятных последствий разглашения этих данных несет участник, так как участник согласен с тем, что система информационной безопасности игровой площадки исключает передачу логина, пароля и идентификационной информации аккаунта участника третьим лицам;<br />4.1.3.16. не заводить более 1 аккаунта на проекте - мультиводство (наказание: бан всех аккаунтов с обнулением игрового инвентаря)<br />4.1.3.16. самостоятельно нести персональную ответственность за ведение своих финансовых сделок и операций, Организатор не несет ответственности за совершаемые финансовые действия между игроками по передаче игрового инвентаря и игровой валюты, а равно иных игровых атрибутов.<br />4.1.3.17. о своих претензиях и жалобах первым уведомлять организатора в письменной форме на почту support@cripto.biz.<br />4.1.3.18. регулярно самостоятельно знакомиться с новостями игры, а также с изменениями в настоящем Соглашении и в правилах игры на игровой площадке. Пользователь обязан ВНИМАТЕЛЬНО ЧИТАТЬ Пользовательское соглашение и описание функций и услуг проекта не реже одного раза в неделю (они могут претерпевать изменения и дополнения &ndash; смотрите пункт 1.4), так как незнание правил не снимает с пользователя ответственности за их нарушение.<br />4.2 Права и обязанности организатора.<br />4.2.1. Организатор обязан:<br />4.2.1.1. обеспечить без взимания платы доступ участника на игровую площадку и к участию в игре. Участник самостоятельно за свой счет оплачивает доступ в сеть Интернет и несет иные расходы, связанные с данным действием.<br />4.2.1.2. вести учет игрового инвентаря (рублей) на игровом счете участника.&nbsp;<br />4.2.1.3. регулярно совершенствовать аппаратно-программный комплекс, но не гарантирует, что программное обеспечение Игры не содержит ошибок, а аппаратная часть не выйдет из рабочих параметров и будет функционировать бесперебойно.<br />4.2.1.4. Соблюдать режим конфиденциальности в отношении персональных данных участника в порядке п. 6 настоящего соглашения.<br />4.2.1.5. Нести финансовые обязательства по обеспечению эквивалентной курсовой стоимости игрового инвентаря (рублей) на игровом счете участника. Курсовая стоимость игрового инвентаря (рубли) равняется: 1 игровой рубль = 1 рубль Payeer.&nbsp;<br />4.2.1.6. Любому лицу, законно владеющему игровым инвентарем (рубли), осуществляется оплата денежной суммы, обусловленной курсовой стоимостью (рублей), за вычетом затрат на осуществление данной операции.&nbsp;<br />4.2.2. Организатор имеет право:<br />4.2.2.1. предоставлять участнику дополнительные платные услуги, перечень которых, а также порядок и условия пользования которыми определяются настоящим соглашением, правилами игровой площадки и иными объявлениями организатора. При этом организатор вправе в любое время изменить количество и объем предлагаемых платных услуг, их стоимость, название, вид и эффект от использования.<br />4.2.2.2. приостановить действие настоящего соглашения и отключить участника от участия в игре на время проведения расследования по подозрению участника в нарушении настоящего Соглашения и правил игровой площадки.<br />4.2.2.3. исключить участника из игры, если установит, что участник нарушил настоящее соглашение или правила, установленные на игровой площадке, в порядке 5.10 настоящего соглашения.<br />4.2.2.4. частично или полностью прерывать предоставление услуг без предупреждения участника при проведении реконструкции, ремонта и профилактических работ на площадке.<br />4.2.2.5. Организатор не несет ответственности за неправильное функционирование программного обеспечения игры. Участник использует программное обеспечение по принципу &laquo;КАК ЕСТЬ&raquo; (&ldquo;AS IS&rdquo;). Если организатор установит, что при игре возник сбой (ошибка) в работе площадки, то результаты, которые состоялись во время некорректной работы программного обеспечения, могут быть аннулированы или скорректированы по усмотрению организатора. Участник согласен не апеллировать к организатору по поводу качества, количества, порядка и сроков предоставляемых ему игровых возможностей и услуг.<br />4.2.2.6. в одностороннем порядке изменять курс игрового инвентаря.<br /><br /><br />5. Гарантии и ответственность.<br />5.1. Организатор не гарантирует постоянный и непрерывный доступ к игровой площадке и его услугам в случае возникновения технических неполадок и/или непредвиденных обстоятельств, в числе которых: неполноценная работа или не функционирование интернет&ndash;провайдеров, серверов информации, банковских и платёжных систем, а также неправомерных действий третьих лиц. Организатор приложит все усилия по недопущению сбоев, но не несет ответственности за временные технические сбои и перерывы в работе Игры, вне зависимости от причин таких сбоев.<br />5.2 Участник полностью согласен, что организатор не может нести ответственность за убытки участника, которые возникли в связи с противоправными действиями третьих лиц, направленными на нарушение системы безопасности электронного оборудования и баз данных игры, либо вследствие независящих от организатора перебоев, приостановления или прекращения работы каналов и сетей связи, используемых для взаимодействия с участником, а также неправомерных или необоснованных действий платежных систем, а так же третьих лиц.<br />5.3. Организатор не несет ответственности за убытки, понесенные в результате использования или не использования участником информации об Игре, игровых правил и самой Игры и не несет ответственности за убытки или иной вред, возникший у участника в связи с его неквалифицированными действиями и незнанием игровых правил или его ошибках в расчетах;<br />5.4. Участник согласен с тем, что использует игровую площадку по своей доброй воле и на свой собственный риск. Организатор не дает участнику никакой гарантии того, что он извлечет выгоду или пользу от участия в игре. Степень участия в Игре определяется сами участником.<br />5.5. Организатор не несет ответственности перед участником за действия других участников.<br />5.6. В случае возникновения споров и разногласий на игровой площадке, решение организатора является окончательным, и участник с ним полностью согласен. Все споры и разногласия, возникающие из настоящего Соглашения или в связи с ним, подлежат разрешению путем переговоров. В случае невозможности достижения согласия путем переговоров, споры, разногласия и требования, возникающие из настоящего Соглашения, подлежат разрешению в соответствии с действующим законодательством.<br />5.7. Организатор не несет налогового бремени за Участника. Участник обязуется самостоятельно включать возможные полученные доходы в налоговую декларацию в соответствии с законодательством страны своей резиденции.<br />5.8. Организатор может вносить изменения в настоящее Соглашение, правила игровой площадки и другие документы в одностороннем порядке. В случае внесения изменений в документы Организатор размещает последние версии документов на сайте игровой площадки. Все изменения вступают в силу с момента размещения. Участник имеет право расторгнуть настоящее Соглашение в течение 3 дней, если он не согласен с внесенными изменениями. В таком случае расторжение Соглашения производится согласно п. 5.9 настоящего Соглашения. На Участника возлагается обязанность регулярно посещать официальный сайт Игры с целью ознакомления с официальными документами и новостями.<br />5.9. Участник имеет право расторгнуть настоящее Соглашение в одностороннем порядке без сохранения игрового аккаунта. При этом все расходы, связанные с участием в игре, участнику не компенсируются и не возвращаются.<br />5.10. Организатор имеет право расторгнуть настоящее Соглашение в одностороннем порядке, а также совершать иные действия, ограничивающие возможности в Игре, в отношении участника или группы участников, являющихся соучастниками выявленных нарушений условий настоящего Соглашения. При этом все игровые атрибуты, игровой инвентарь (рубли) находящиеся в аккаунте и на игровом счете участника или группы участников, а равно все расходы возврату не подлежат и не компенсируются.<br />5.11. Организатор освобождаются от ответственности в случае возникновения обстоятельств непреодолимой силы (форс-мажорных обстоятельств), к числу которых относятся, но перечнем не ограничиваются: стихийные бедствия, войны, огонь (пожары), наводнения, взрывы, терроризм, бунты, гражданские волнения, акты правительственной или регулирующей власти, хакерские атаки, отсутствия, нефункционирование или сбои работы энергоснабжения, поставщиков Интернет услуг, сетей связи или других систем, сетей и услуг. Сторона, у которой возникли такие обстоятельства, должна в разумные сроки и доступным способом оповестить о таких обстоятельствах другую сторону.<br /><br /><br />6. Конфиденциальность.<br />6.1. Условие конфиденциальности распространяется на информацию, которую Организатор может получить об Участнике во время его пребывания на сайте Игры и которая может быть соотнесена с данным конкретным пользователем. Организатор автоматически получает и записывает в серверные логи техническую информацию из вашего браузера: IP адрес, адрес запрашиваемой страницы и т.д. Организатор может записывать &laquo;cookies&raquo; на компьютер пользователя и впоследствии использовать их. Организатор гарантирует, что данные, сообщенные участником при регистрации в Игре, будут использоваться Организатором только внутри Игры.<br />6.2. Организатор вправе передать персональную информацию об Участнике третьим лицам только в случаях, если:<br />6.2.1. Участник изъявил желание раскрыть эту информацию;<br />6.2.2. Без этого Участник не может воспользоваться желаемым продуктом или услугой, в частности - информация об именах (никах), игровых атрибутах - может быть доступна другим участникам;<br />6.2.3. Этого требует международное законодательство и/или органы власти с соблюдением законной процедуры;<br />6.2.4. Участник нарушает настоящее Cоглашение и правила игровой площадки.<br /><br /><br />7. Иные положения.<br />7.1. Недействительность части или пункта (подпункта) настоящего соглашения не влечет недействительности всех остальных частей и пунктов (подпунктов).7.2. Срок действия настоящего Соглашения устанавливается на весь период действия игровой площадки, то есть на неопределенный срок, и не предполагает срока окончания данного соглашения.&nbsp;7.3. Регистрируясь и находясь на игровой площадке, участник признает, что он прочитал, понял и полностью принимает условия настоящего Соглашения, а также правила игры и иных официальных документов.<br />7.4. Для получения услуги сайта, Участник полностью принимает все условия настоящего Соглашения. В случае не согласия с каким-либо из условий Соглашения, Участнику предлагается отказаться от использования услуг сайта.С целью исключить введение Участника в заблуждение (обман), Организатор предупреждает до начала принятия согласия Участником использования услуг сайта о том, что предложенные Участнику услуги в виде игры основаны на риске, возникающем между несколькими участниками игры по установленным организатором данной игры правилам.&nbsp;Денежные средства Участника, необходимые для обеспечения игры (приобретение средств для игры, улучшение игроком условий для выигрыша и т.д.), принявшего условия Соглашения, направляются в общий игровой фонд Участников (игроков), из которого складываются, в том числе выигрыши. Организатор, для поддержания баланса игрового фонда, вправе реинвестировать и вкладывать средства фонда в любые проекты. Соответственно организатор предупреждает вас, что игра частично основана на рисках и в любой момент вы можете потерять все свои средства, при этом не будете иметь к организатору сайта никаких претензий.Кроме того, принимая Соглашение, Участник подтверждает свое согласие на пользование игровым фондом Организатором для организации и обслуживания игры среди Участников, а так же инвестирование в другие проекты.&nbsp;Конечным результатом игрового риска является выигрыш. В то же время Организатор обязуется свести к минимально возможному отрицательному последствию риска Участника в игре, с целью привлечения физических лиц к сайту.Одновременно представленная услуга в виде игры направлена на удовлетворение потребностей Участника, которые он путем своего согласия на участие определяет и оценивает самостоятельно.Настоящие условия игры и остальные сведения сайта не имеют цели Организатора побудить в Участнике эмоции, связанные с предвосхищением успеха (азарта).<br />7.5. Соглашение вступает в силу с момента регистрации участника в проекте.<br /><br /><br />Проект: http://cripto.biz/</p>','<p style=\"text-align: center;\"><strong>CRIPTO.BIZ -</strong> это наилучший проект с высокой окупаемостью. После регистрации вы получите Криптовалюту \"<strong><strong>NameCoin</strong></strong>\" и сможете вывести <strong>свои первые деньги</strong>.<br /><br />Если вы желаете зарабатывать больше вам придется пополнить счет для покупки новых <span>Криптовалют</span>, чем выше стоимость <span>Криптовалюты</span>, тем больше будет ваш доход.</p>\r\n<p style=\"text-align: center;\">Для покупки птиц перейдите во вкладку \"<strong>Магазин криптовалют</strong>\", который находится в меню пользователя. Выберите подходящую вам <span>Криптовалюту&nbsp;</span>и нажмите на кнопку \"<strong>Купить</strong>\".</p>\r\n<p style=\"text-align: left;\"><img src=\"images/img/q1.png\" alt=\"\" /></p>\r\n<p style=\"text-align: center;\"><br />&nbsp;После покупки <span>Криптовалюты</span>, система скажет вам об успешной покупке.</p>\r\n<p style=\"text-align: left;\"><img src=\"images/img/q2.png\" alt=\"\" width=\"864\" height=\"57\" /></p>\r\n<p style=\"text-align: center;\"><br />&nbsp;Через некоторое время вы сможете продать <span>Крипто</span>, которые намайнились. Для этого перейдите во вкладку \"<strong>Склад</strong>\", которая находится в меню пользователя. Вы увидите сколько <span>Крипто майнится на</span>&nbsp;<span>Складе</span>.</p>\r\n<p style=\"text-align: left;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src=\"images/img/q3.png\" alt=\"\" width=\"597\" height=\"588\" /></p>\r\n<p style=\"text-align: center;\">Вы можете подождать момента когда у вас будет много <span>Крипто</span>, или можете сразу продать их. Нажмите на кнопку \"<strong>Продать <span>Крипто</span></strong>\" и система автоматически обменяет ваши <span>Крипто&nbsp;</span>на рубли для вывода по курсу <strong>1000 <span>Крипто&nbsp;</span>= 0.15 рублей</strong>.</p>\r\n<p style=\"text-align: left;\"><img src=\"images/img/q4.png\" alt=\"\" width=\"867\" height=\"57\" /></p>\r\n<p style=\"text-align: center;\">После того как вы продали <strong>Крипто</strong>, вы сможете заказать выплату на ваш счет в Payeer, для этого нажмите на кнопку \"<strong>Вывести средства</strong>\", которая находится в верху сайта. При регистрации вы указывали свой кошелёк в системе Payeer, остаётся только ввести сумму вывода.</p>\r\n<p style=\"text-align: left;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"images/img/q5.png\" alt=\"\" width=\"329\" height=\"163\" /></p>\r\n<p style=\"text-align: center;\">После того как вы закажите выплату система выведет сообщение об успешной операции.<br /><br /><img src=\"images/q6.png\" alt=\"\" width=\"859\" height=\"62\" />&nbsp;</p>','<p>Техническая поддержка пользователей:&nbsp;<span>support@online-birds.ru</span><span class=\"b-domain-emails__item-name__at\"><br /></span>Прямая связь с создателем проекта:&nbsp;<span>admin</span><span class=\"b-domain-emails__item-name__at\">@online-birds.ru</span></p>');
/*!40000 ALTER TABLE `db_conabrul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_config`
--

DROP TABLE IF EXISTS `db_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `min_pay` double NOT NULL DEFAULT '15',
  `ser_per_wmr` int(11) NOT NULL DEFAULT '1000',
  `ser_per_wmz` int(11) NOT NULL DEFAULT '3300',
  `ser_per_wme` int(11) NOT NULL DEFAULT '4200',
  `percent_swap` int(11) NOT NULL DEFAULT '0',
  `percent_sell` int(2) NOT NULL DEFAULT '10',
  `items_per_coin` int(11) NOT NULL DEFAULT '7',
  `a_in_h` int(11) NOT NULL DEFAULT '0',
  `b_in_h` int(11) NOT NULL DEFAULT '0',
  `c_in_h` int(11) NOT NULL DEFAULT '0',
  `d_in_h` int(11) NOT NULL DEFAULT '0',
  `e_in_h` int(11) NOT NULL DEFAULT '0',
  `f_in_h` int(11) NOT NULL DEFAULT '0',
  `amount_a_t` int(11) NOT NULL DEFAULT '0',
  `amount_b_t` int(11) NOT NULL DEFAULT '0',
  `amount_c_t` int(11) NOT NULL DEFAULT '0',
  `amount_d_t` int(11) NOT NULL DEFAULT '0',
  `amount_e_t` int(11) NOT NULL DEFAULT '0',
  `amount_f_t` int(11) NOT NULL DEFAULT '0',
  `percent_back` int(2) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_config`
--

LOCK TABLES `db_config` WRITE;
/*!40000 ALTER TABLE `db_config` DISABLE KEYS */;
INSERT INTO `db_config` VALUES (1,'ad5min5','ad5min5',20,100,5800,6700,10,35,100,200,460,1300,2800,6000,19000,5000,10000,25000,50000,100000,300000,2);
/*!40000 ALTER TABLE `db_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_insert_money`
--

DROP TABLE IF EXISTS `db_insert_money`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_insert_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `money` double NOT NULL DEFAULT '0',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_insert_money`
--

LOCK TABLES `db_insert_money` WRITE;
/*!40000 ALTER TABLE `db_insert_money` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_insert_money` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_invcompetition`
--

DROP TABLE IF EXISTS `db_invcompetition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_invcompetition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `1m` double NOT NULL DEFAULT '0',
  `2m` double NOT NULL DEFAULT '0',
  `3m` double NOT NULL DEFAULT '0',
  `4m` double NOT NULL DEFAULT '0',
  `5m` double NOT NULL DEFAULT '0',
  `user_1` varchar(10) NOT NULL,
  `user_2` varchar(10) NOT NULL,
  `user_3` varchar(10) NOT NULL,
  `user_4` varchar(10) NOT NULL,
  `user_5` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_end` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_invcompetition`
--

LOCK TABLES `db_invcompetition` WRITE;
/*!40000 ALTER TABLE `db_invcompetition` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_invcompetition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_invcompetition_users`
--

DROP TABLE IF EXISTS `db_invcompetition_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_invcompetition_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_invcompetition_users`
--

LOCK TABLES `db_invcompetition_users` WRITE;
/*!40000 ALTER TABLE `db_invcompetition_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_invcompetition_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_lottery`
--

DROP TABLE IF EXISTS `db_lottery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_lottery`
--

LOCK TABLES `db_lottery` WRITE;
/*!40000 ALTER TABLE `db_lottery` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_lottery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_lottery_winners`
--

DROP TABLE IF EXISTS `db_lottery_winners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_lottery_winners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_a` varchar(10) NOT NULL,
  `bil_a` int(11) NOT NULL DEFAULT '0',
  `user_b` varchar(10) NOT NULL,
  `bil_b` int(11) NOT NULL DEFAULT '0',
  `user_c` varchar(10) NOT NULL,
  `bil_c` int(11) NOT NULL DEFAULT '0',
  `bank` float NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_lottery_winners`
--

LOCK TABLES `db_lottery_winners` WRITE;
/*!40000 ALTER TABLE `db_lottery_winners` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_lottery_winners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_news`
--

DROP TABLE IF EXISTS `db_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `news` text NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_news`
--

LOCK TABLES `db_news` WRITE;
/*!40000 ALTER TABLE `db_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_payeer_insert`
--

DROP TABLE IF EXISTS `db_payeer_insert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_payeer_insert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_payeer_insert`
--

LOCK TABLES `db_payeer_insert` WRITE;
/*!40000 ALTER TABLE `db_payeer_insert` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_payeer_insert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_payment`
--

DROP TABLE IF EXISTS `db_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purse` varchar(20) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `comission` double NOT NULL DEFAULT '0',
  `valuta` varchar(3) NOT NULL DEFAULT 'RUB',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `pay_sys` varchar(100) NOT NULL DEFAULT '0',
  `pay_sys_id` int(11) NOT NULL DEFAULT '0',
  `response` int(1) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_payment`
--

LOCK TABLES `db_payment` WRITE;
/*!40000 ALTER TABLE `db_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_product_time`
--

DROP TABLE IF EXISTS `db_product_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_product_time` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `date_add` int(10) unsigned NOT NULL,
  `date_del` int(10) unsigned NOT NULL,
  `status` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_product_time`
--

LOCK TABLES `db_product_time` WRITE;
/*!40000 ALTER TABLE `db_product_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_product_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_recovery`
--

DROP TABLE IF EXISTS `db_recovery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_recovery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `ip` int(10) unsigned NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_recovery`
--

LOCK TABLES `db_recovery` WRITE;
/*!40000 ALTER TABLE `db_recovery` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_recovery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_regkey`
--

DROP TABLE IF EXISTS `db_regkey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_regkey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referer_name` varchar(10) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_regkey`
--

LOCK TABLES `db_regkey` WRITE;
/*!40000 ALTER TABLE `db_regkey` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_regkey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_sell_items`
--

DROP TABLE IF EXISTS `db_sell_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_sell_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a_s` int(11) NOT NULL DEFAULT '0',
  `b_s` int(11) NOT NULL DEFAULT '0',
  `c_s` int(11) NOT NULL DEFAULT '0',
  `d_s` int(11) NOT NULL DEFAULT '0',
  `e_s` int(11) NOT NULL DEFAULT '0',
  `f_s` int(11) NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `all_sell` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_sell_items`
--

LOCK TABLES `db_sell_items` WRITE;
/*!40000 ALTER TABLE `db_sell_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_sell_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_sender`
--

DROP TABLE IF EXISTS `db_sender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_sender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mess` text NOT NULL,
  `page` int(5) NOT NULL DEFAULT '0',
  `sended` int(7) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_sender`
--

LOCK TABLES `db_sender` WRITE;
/*!40000 ALTER TABLE `db_sender` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_sender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_stats`
--

DROP TABLE IF EXISTS `db_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `all_users` int(11) NOT NULL DEFAULT '0',
  `all_payments` double NOT NULL DEFAULT '0',
  `all_insert` double NOT NULL DEFAULT '0',
  `donations` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_stats`
--

LOCK TABLES `db_stats` WRITE;
/*!40000 ALTER TABLE `db_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_stats_btree`
--

DROP TABLE IF EXISTS `db_stats_btree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_stats_btree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `tree_name` varchar(10) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_stats_btree`
--

LOCK TABLES `db_stats_btree` WRITE;
/*!40000 ALTER TABLE `db_stats_btree` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_stats_btree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_swap_ser`
--

DROP TABLE IF EXISTS `db_swap_ser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_swap_ser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `amount_b` double NOT NULL DEFAULT '0',
  `amount_p` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_swap_ser`
--

LOCK TABLES `db_swap_ser` WRITE;
/*!40000 ALTER TABLE `db_swap_ser` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_swap_ser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_users_a`
--

DROP TABLE IF EXISTS `db_users_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_users_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refsite` varchar(50) NOT NULL,
  `user` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `referer` varchar(10) NOT NULL,
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referals` int(11) NOT NULL DEFAULT '0',
  `date_reg` int(11) NOT NULL DEFAULT '0',
  `date_login` int(11) NOT NULL DEFAULT '0',
  `ip` int(10) unsigned NOT NULL DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0',
  `referer_id2` int(11) NOT NULL DEFAULT '0',
  `referer_id3` int(11) NOT NULL DEFAULT '0',
  `doxod2` int(11) NOT NULL DEFAULT '0',
  `doxod3` int(11) NOT NULL DEFAULT '0',
  `news` int(11) NOT NULL DEFAULT '0',
  `rating` double(10,2) NOT NULL DEFAULT '0.00',
  `time_bonus` int(11) NOT NULL DEFAULT '0',
  `bonus_us` int(11) NOT NULL,
  `time_bonus_error` int(11) NOT NULL DEFAULT '0',
  `bonus_1` int(11) NOT NULL,
  `bonus_2` int(11) NOT NULL,
  `bonus_3` int(11) NOT NULL,
  `bonus_4` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_users_a`
--

LOCK TABLES `db_users_a` WRITE;
/*!40000 ALTER TABLE `db_users_a` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_users_a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `db_users_b`
--

DROP TABLE IF EXISTS `db_users_b`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_users_b` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `money_b` double NOT NULL DEFAULT '0',
  `money_p` double NOT NULL DEFAULT '0',
  `a_t` int(11) NOT NULL DEFAULT '0',
  `b_t` int(11) NOT NULL DEFAULT '0',
  `c_t` int(11) NOT NULL DEFAULT '0',
  `d_t` int(11) NOT NULL DEFAULT '0',
  `e_t` int(11) NOT NULL DEFAULT '0',
  `f_t` int(11) NOT NULL DEFAULT '0',
  `a_b` int(11) NOT NULL DEFAULT '0',
  `b_b` int(11) NOT NULL DEFAULT '0',
  `c_b` int(11) NOT NULL DEFAULT '0',
  `d_b` int(11) NOT NULL DEFAULT '0',
  `e_b` int(11) NOT NULL DEFAULT '0',
  `f_b` int(11) NOT NULL DEFAULT '0',
  `all_time_a` int(11) NOT NULL DEFAULT '0',
  `all_time_b` int(11) NOT NULL DEFAULT '0',
  `all_time_c` int(11) NOT NULL DEFAULT '0',
  `all_time_d` int(11) NOT NULL DEFAULT '0',
  `all_time_e` int(11) NOT NULL DEFAULT '0',
  `all_time_f` int(11) NOT NULL DEFAULT '0',
  `last_sbor` int(11) NOT NULL DEFAULT '0',
  `from_referals` double NOT NULL DEFAULT '0',
  `to_referer` double NOT NULL DEFAULT '0',
  `payment_sum` double NOT NULL DEFAULT '0',
  `insert_sum` double NOT NULL DEFAULT '0',
  `pay_points` double NOT NULL DEFAULT '0',
  `ref_proc` double NOT NULL DEFAULT '0',
  `level_proc` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_users_b`
--

LOCK TABLES `db_users_b` WRITE;
/*!40000 ALTER TABLE `db_users_b` DISABLE KEYS */;
/*!40000 ALTER TABLE `db_users_b` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-18 22:25:10
