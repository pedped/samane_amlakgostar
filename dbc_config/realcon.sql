-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2014 at 10:52 AM
-- Server version: 5.5.35-cll-lve
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `realcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixcategories`
--

DROP TABLE IF EXISTS `db_tabprefixcategories`;
CREATE TABLE IF NOT EXISTS `db_tabprefixcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;


-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixemailtmpl`
--

DROP TABLE IF EXISTS `db_tabprefixemailtmpl`;
CREATE TABLE IF NOT EXISTS `db_tabprefixemailtmpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_name` char(100) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `db_tabprefixemailtmpl`
--

INSERT INTO `db_tabprefixemailtmpl` (`id`, `email_name`, `values`, `status`) VALUES
(1, 'confirmation_email', '{"subject":"Confirmation email","body":"Hi #username,\\r\\nYour signup is successful. Please follow the below link for activating your account:\\r\\n \\r\\n#activationlink\\r\\n\\t\\t\\t\\t\\t\\t\\t\\t\\t\\t\\r\\nThanks\\r\\n#webadmin","avl_vars":"#username,#useremail,#activationlink,#webadmin"}', 1),
(2, 'recovery_email', '{"subject":"Recovery email","body":"Hi #username,\\r\\nWe have received an account recovery request from your email. Please follow the below link for setting new password \\r\\n\\r\\n#recoverylink\\r\\n\\r\\nThanks\\r\\n#webadmin","avl_vars":"#username,#recoverylink,#webadmin"}', 1),
(3, 'signup_notification_email', '{"subject":"Notification email","body":"Hi #username,\\nWe''ve received signup information from you. Once you''ve finish the payment, your account will be activated. You can return to this page by following the following link: \\n\\n#recoverylink\\n\\nThanks\\n#webadmin","avl_vars":"#username,#recoverylink,#webadmin"}', 1),
(4, 'payment_confirmation_email', '{"subject":"Confirmation email","body":"Hi #username,\\nYour account is confirmed. Please follow the below link for login\\n\\n#loginlink\\n\\nThanks\\n#webadmin","avl_vars":"#username,#loginlink,#webadmin"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixfacilities`
--

DROP TABLE IF EXISTS `db_tabprefixfacilities`;
CREATE TABLE IF NOT EXISTS `db_tabprefixfacilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `icon` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `db_tabprefixfacilities`
--

INSERT INTO `db_tabprefixfacilities` (`id`, `title`, `icon`, `status`) VALUES
(1, 'Air Conditioning', 'ac1.png', 1),
(2, 'Balcony', 'balcony.png', 1),
(3, 'Cable TV', 'cabletv.png', 1),
(4, 'Computer', 'computer.png', 1),
(5, 'Dishwasher', 'dishwasher.jpg', 1),
(6, 'Grill', 'grill.png', 1),
(7, 'Heater', 'heater.png', 1),
(8, 'Lift', 'lift.png', 1),
(9, 'Parking', 'parking.png', 1),
(10, 'Pool', 'pool.png', 1),
(11, 'Smoking', 'smoking.png', 1),
(12, 'Washing Machine', 'washing_machine.png', 1),
(13, 'Wi-fi', 'wifi.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixlanguage`
--

DROP TABLE IF EXISTS `db_tabprefixlanguage`;
CREATE TABLE IF NOT EXISTS `db_tabprefixlanguage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) NOT NULL,
  `lang` char(50) NOT NULL,
  `short_name` char(5) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`),
  UNIQUE KEY `lang` (`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `db_tabprefixlanguage`
--

INSERT INTO `db_tabprefixlanguage` (`id`, `unique_id`, `lang`, `short_name`, `values`, `status`) VALUES
(1, 'English-en', 'English', 'en', '{"DBC_PURPOSE_SALE":"Sale ","DBC_PURPOSE_RENT":"Rent","DBC_PURPOSE_BOTH":"Sale & Rent","DBC_TYPE_APARTMENT":"Apartment","DBC_TYPE_HOUSE":"House","DBC_TYPE_LAND":"Land","DBC_TYPE_COMSPACE":"Commercial Space","DBC_CONDITION_NEW":"New","DBC_CONDITION_SOLD":"Sold","DBC_CONDITION_AVAILABLE":"Available","DBC_CONDITION_AUCTION":"Auction","DBC_SIGN_IN":"Sign In","DBC_SIGN_UP":"Sign Up","DBC_AGENT_PANEL":"Agent Panel","DBC_ADMIN_PANEL":"Admin Panel","DBC_LOGOUT":"Logout","DBC_FIND_YOUR_PLACE":"Find Your Place","DBC_SEARCH_TEXT":"Search for Address, Neighbourhood, City or State","DBC_ADVANCED_SEARCH":"Advanced Search","DBC_RECENT_PROPERTIES":"Recent Properties","DBC_AGENTS":"Agents","DBC_NO_ESTATES_FOUND":"No Estates Found","DBC_HOME":"Home","DBC_ABOUT":"About","DBC_CONTACT":"Contact","DBC_PLAIN_SEARCH":"Plain Search","DBC_IGNORE_THIS_SECTION":"Ignore this section","DBC_LOCATION_SEARCH":"Location Search","DBC_COUNTRY":"Country","DBC_STATE_PROVINCE":"State\\/Provice","DBC_CITY":"City","DBC_PRICE":"Price","DBC_BEDROOM":"Bedrooms","DBC_BATHROOM":"Bathrooms","DBC_YEAR_BUILT":"Year Built","DBC_PHONE":"Phone","DBC_FIRST_NAME":"First Name","DBC_LAST_NAME":"Last Name","DBC_COMPANY_NAME":"Company Name","DBC_REGISTER":"Register","DBC_TYPE":"Type","DBC_AREA":"Area","DBC_DETAILS":"Details","DBC_VIEW_ALL":"View All","DBC_FEATURED_PROPERTIES":"Featured Properties","DBC_ORDER_BY":"Order By","DBC_NONE":"None","DBC_TNC":"Terms and Confition","DBC_REG_SUCCESS":"Your account registration is successfull. An email was sent to your email. Please follow that email to activate your account.Thanks ","DBC_LIMIT":"Limit","DBC_USAGE":"Usage","DBC_RECOVER":"Recover","DBC_OOPS":"Oops, page not found","DBC_SHARE_THIS":"Share This","DBC_BATH":"Baths","DBC_STATUS":"Status","DBC_DESCRIPTION":"Description","DBC_GA":"General Amenities","DBC_LOCATION_MAP":"Location Map","DBC_IMAGE_GALLERY":"Image Gallery","DBC_SUMMARY":"Summary","DBC_OVERVIEW":"Overview","DBC_ADDRESS":"Address","DBC_AGENT":"Agent","DBC_MESSAGE":"Message","DBC_USER_NAME":"Username","DBC_ABOUT_ME":"About Me","DBC_PER_MONTH":"Per Month","DBC_PER_QUARTER":"Per Quarter","DBC_PER_YEAR":"Per Year","DBC_TYPE_CONDO":"Condo","DBC_TYPE_VILLA":"Villa","DBC_TYPE_FILTERS":"Type Filters","DBC_PURPOSE_FILTERS":"Purpose Filters","DBC_EMAIL_SUBJECT":"Email Subject","DBC_ALL":"All","DBC_DELETED":"Deleted","DBC_AGENT_PROPERTIES":"Agents Properties","DBC_ALL_AGENTS":"All Agents","DBC_CONTACT_US":"Contact Us","DBC_ACTIVE":"Active","DBC_RADIUS":"Radius","DBC_VIDEO_EMBED":"Featured Video","DBC_PROPERTIES":"Properties","DBC_EMBED_VIDEO_URL":"Embeded Video Url","DBC_PENDING":"Pending","DBC_PROFILE_PHOTO":"Profile Picture","DBC_TOP_PROPERTIES":"Top Properties","DBC_PROPERTY":"Property","lkjqh":"ljn","friendly":"friendly","":""}', 1),
(2, 'Spanish-es', 'Spanish', 'es', '{"DBC_PURPOSE_SALE":"Venta","DBC_PURPOSE_RENT":"Alquiler","DBC_PURPOSE_BOTH":"Venta y Renta","DBC_TYPE_APARTMENT":"Apartamento","DBC_TYPE_HOUSE":"Casa","DBC_TYPE_LAND":"Tierra","DBC_TYPE_COMSPACE":"Locales Comerciales","DBC_CONDITION_NEW":"Nuevo","DBC_CONDITION_SOLD":"Vendido","DBC_CONDITION_AVAILABLE":"Disponible","DBC_CONDITION_AUCTION":"Subasta","DBC_SIGN_IN":"Registrarse","DBC_SIGN_UP":"Contratar","DBC_AGENT_PANEL":"Panel Agent","DBC_ADMIN_PANEL":"Panel de Administraci\\u00f3n","DBC_LOGOUT":"Salir","DBC_FIND_YOUR_PLACE":"Encuentra tu lugar","DBC_SEARCH_TEXT":"B\\u00fasqueda de Direcci\\u00f3n , Barrio, Ciudad o Estado","DBC_ADVANCED_SEARCH":"B\\u00fasqueda Avanzada","DBC_RECENT_PROPERTIES":"Propiedades recientes","DBC_AGENTS":"Agentes","DBC_NO_ESTATES_FOUND":"No hay Estates encontrados","DBC_HOME":"Inicio","DBC_ABOUT":"Acerca de","DBC_CONTACT":"Contacto","DBC_PLAIN_SEARCH":"Llanura Buscar","DBC_IGNORE_THIS_SECTION":"No haga caso de esta secci\\u00f3n","DBC_LOCATION_SEARCH":"Buscar una localidad","DBC_COUNTRY":"Pa\\u00eds","DBC_STATE_PROVINCE":"Estado \\/ Provice","DBC_CITY":"Ciudad","DBC_PRICE":"Precio","DBC_BEDROOM":"Habitaciones","DBC_BATHROOM":"Ba\\u00f1os","DBC_YEAR_BUILT":"A\\u00f1o de construcci\\u00f3n","DBC_PHONE":"Tel\\u00e9fono","DBC_FIRST_NAME":"Nombre de pila","DBC_LAST_NAME":"Apellido","DBC_COMPANY_NAME":"Nombre de empresa","DBC_REGISTER":"Registrar","DBC_TYPE":"Tipo","DBC_AREA":"Zona","DBC_DETAILS":"Detalles","DBC_VIEW_ALL":"Ver todos","DBC_FEATURED_PROPERTIES":"Inmuebles destacados","DBC_ORDER_BY":"Ordenar por","DBC_NONE":"Ninguno","DBC_TNC":"T\\u00e9rminos y Confition","DBC_REG_SUCCESS":"Su registro de la cuenta es exitosa . ","DBC_LIMIT":"L\\u00edmite","DBC_USAGE":"Uso","DBC_RECOVER":"Recuperar","DBC_OOPS":"Vaya, p\\u00e1gina no encontrada","DBC_SHARE_THIS":"Comparte este","DBC_BATH":"Piscina","DBC_STATUS":"Estado","DBC_DESCRIPTION":"Descripci\\u00f3n","DBC_GA":"Servicios generales","DBC_LOCATION_MAP":"Mapa de localizaci\\u00f3n","DBC_IMAGE_GALLERY":"Galer\\u00eda de im\\u00e1genes","DBC_SUMMARY":"Resumen","DBC_OVERVIEW":"Visi\\u00f3n de conjunto","DBC_ADDRESS":"Direcci\\u00f3n","DBC_AGENT":"Agente","DBC_MESSAGE":"Mensaje","DBC_USER_NAME":"Nombre de usuario","DBC_ABOUT_ME":"Acerca de m\\u00ed","DBC_PER_MONTH":"Por Mes","DBC_PER_QUARTER":"por cuarto","DBC_PER_YEAR":"Por A\\u00f1o","DBC_TYPE_CONDO":"Condo","DBC_TYPE_VILLA":"Villa","DBC_TYPE_FILTERS":"Filtros tipo","DBC_PURPOSE_FILTERS":"Prop\\u00f3sito Filtros","DBC_EMAIL_SUBJECT":"Asunto del correo","DBC_ALL":"Todo","DBC_DELETED":"Suprimido","DBC_AGENT_PROPERTIES":"Agentes de Propiedades","DBC_ALL_AGENTS":"Todos los agentes","DBC_CONTACT_US":"Cont\\u00e1ctenos","DBC_ACTIVE":"Activo","DBC_RADIUS":"Radio","DBC_VIDEO_EMBED":"Video del d\\u00eda","DBC_PROPERTIES":"Propiedades","DBC_EMBED_VIDEO_URL":"Embeded Video URL","DBC_PENDING":"Pendiente","DBC_PROFILE_PHOTO":"Foto de Perfil","DBC_TOP_PROPERTIES":"Arriba Propiedades","DBC_PROPERTY":"Propiedades"}', 1),
(3, 'Dutch-nl', 'Dutch', 'nl', '{"DBC_PURPOSE_SALE":"Te koop","DBC_PURPOSE_RENT":"Huur","DBC_PURPOSE_BOTH":"Sale & Rent","DBC_TYPE_APARTMENT":"Appartement","DBC_TYPE_HOUSE":"Huis","DBC_TYPE_LAND":"Land","DBC_TYPE_COMSPACE":"Commercial Space","DBC_CONDITION_NEW":"Nieuw","DBC_CONDITION_SOLD":"Uitverkocht","DBC_CONDITION_AVAILABLE":"Beschikbaar","DBC_CONDITION_AUCTION":"Veiling","DBC_SIGN_IN":"Aanmelden","DBC_SIGN_UP":"Aanmelden","DBC_AGENT_PANEL":"Agent Panel","DBC_ADMIN_PANEL":"Admin Panel","DBC_LOGOUT":"Afmelden","DBC_FIND_YOUR_PLACE":"Vind jouw plaats","DBC_SEARCH_TEXT":"Zoek naar adres, buurt , stad of staat","DBC_ADVANCED_SEARCH":"Geavanceerd zoeken","DBC_RECENT_PROPERTIES":"recente Eigenschappen","DBC_AGENTS":"Agenten","DBC_NO_ESTATES_FOUND":"Geen Estates gevonden","DBC_HOME":"thuis","DBC_ABOUT":"Over","DBC_CONTACT":"Contact","DBC_PLAIN_SEARCH":"Plain Zoeken","DBC_IGNORE_THIS_SECTION":"Negeer deze sectie","DBC_LOCATION_SEARCH":"Locatie Zoeken","DBC_COUNTRY":"Land","DBC_STATE_PROVINCE":"Staat \\/ Provice","DBC_CITY":"City","DBC_PRICE":"Prijs","DBC_BEDROOM":"Slaapkamers","DBC_BATHROOM":"Badkamers","DBC_YEAR_BUILT":"Bouwjaar","DBC_PHONE":"Telefoon","DBC_FIRST_NAME":"Voornaam","DBC_LAST_NAME":"Achternaam","DBC_COMPANY_NAME":"Bedrijfsnaam","DBC_REGISTER":"Registreren","DBC_TYPE":"Type","DBC_AREA":"Gebied","DBC_DETAILS":"Details","DBC_VIEW_ALL":"Alles bekijken","DBC_FEATURED_PROPERTIES":"Luxe woningen","DBC_ORDER_BY":"Order By","DBC_NONE":"Geen","DBC_TNC":"Algemene confition","DBC_REG_SUCCESS":"Uw account registratie is succesvol . ","DBC_LIMIT":"Limiet","DBC_USAGE":"Gebruik","DBC_RECOVER":"Herstellen","DBC_OOPS":"Oeps , pagina niet gevonden","DBC_SHARE_THIS":"Share This","DBC_BATH":"Baden","DBC_STATUS":"Toestand","DBC_DESCRIPTION":"Beschrijving","DBC_GA":"Algemene voorzieningen","DBC_LOCATION_MAP":"Location Map","DBC_IMAGE_GALLERY":"Fotogalerij","DBC_SUMMARY":"overzicht","DBC_OVERVIEW":"Overzicht","DBC_ADDRESS":"Adres","DBC_AGENT":"Agent","DBC_MESSAGE":"Bericht","DBC_USER_NAME":"Gebruikersnaam","DBC_ABOUT_ME":"over mij","DBC_PER_MONTH":"per Maand","DBC_PER_QUARTER":"per kwartaal","DBC_PER_YEAR":"per Jaar","DBC_TYPE_CONDO":"Condo","DBC_TYPE_VILLA":"Villa","DBC_TYPE_FILTERS":"Type Filters","DBC_PURPOSE_FILTERS":"doel Filters","DBC_EMAIL_SUBJECT":"e-mail Onderwerp","DBC_ALL":"alle","DBC_DELETED":"Verwijderde","DBC_AGENT_PROPERTIES":"Agenten Eigenschappen","DBC_ALL_AGENTS":"Alle Agents","DBC_CONTACT_US":"Contacteer ons","DBC_ACTIVE":"Actief","DBC_RADIUS":"radius","DBC_VIDEO_EMBED":"Aanbevolen Video","DBC_PROPERTIES":"Eigenschappen","DBC_EMBED_VIDEO_URL":"Embedded Video Url","DBC_PENDING":"in afwachting van","DBC_PROFILE_PHOTO":"Profile Picture","DBC_TOP_PROPERTIES":" Top Luxe","DBC_PROPERTY":"Luxe"}', 1),
(4, 'Russian-ru', 'Russian', 'ru', '{"DBC_PURPOSE_SALE":"\\u043f\\u0440\\u043e\\u0434\\u0430\\u0436\\u0430","DBC_PURPOSE_RENT":"\\u0430\\u0440\\u0435\\u043d\\u0434\\u0430","DBC_PURPOSE_BOTH":"\\u041f\\u0440\\u043e\\u0434\\u0430\\u0436\\u0430 \\u0438 \\u0410\\u0440\\u0435\\u043d\\u0434\\u0430","DBC_TYPE_APARTMENT":"\\u043a\\u0432\\u0430\\u0440\\u0442\\u0438\\u0440\\u0430","DBC_TYPE_HOUSE":"\\u0434\\u043e\\u043c","DBC_TYPE_LAND":"\\u0437\\u0435\\u043c\\u043b\\u044f","DBC_TYPE_COMSPACE":"\\u0442\\u043e\\u0440\\u0433\\u043e\\u0432\\u044b\\u0435 \\u043f\\u043b\\u043e\\u0449\\u0430\\u0434\\u0438","DBC_CONDITION_NEW":"\\u043d\\u043e\\u0432\\u044b\\u0439","DBC_CONDITION_SOLD":"\\u043f\\u0440\\u043e\\u0434\\u0430\\u043d\\u043d\\u044b\\u0439","DBC_CONDITION_AVAILABLE":"\\u0434\\u043e\\u0441\\u0442\\u0443\\u043f\\u043d\\u044b\\u0439","DBC_CONDITION_AUCTION":"\\u0430\\u0443\\u043a\\u0446\\u0438\\u043e\\u043d","DBC_SIGN_IN":"\\u0412\\u0445\\u043e\\u0434","DBC_SIGN_UP":"\\u0417\\u0430\\u0440\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0438\\u0440\\u043e\\u0432\\u0430\\u0442\\u044c\\u0441\\u044f","DBC_AGENT_PANEL":"\\u041f\\u0430\\u043d\\u0435\\u043b\\u044c \\u0410\\u0433\\u0435\\u043d\\u0442","DBC_ADMIN_PANEL":"\\u041f\\u0430\\u043d\\u0435\\u043b\\u044c \\u0430\\u0434\\u043c\\u0438\\u043d\\u0438\\u0441\\u0442\\u0440\\u0430\\u0442\\u043e\\u0440\\u0430","DBC_LOGOUT":"\\u0412\\u044b\\u0445\\u043e\\u0434","DBC_FIND_YOUR_PLACE":"\\u041d\\u0430\\u0439\\u0442\\u0438 \\u0441\\u0432\\u043e\\u0435 \\u043c\\u0435\\u0441\\u0442\\u043e","DBC_SEARCH_TEXT":"\\u041f\\u043e\\u0438\\u0441\\u043a \\u0430\\u0434\\u0440\\u0435\\u0441\\u0430, \\u0441\\u043e\\u0441\\u0435\\u0434\\u0441\\u0442\\u0432\\u0430 , \\u0433\\u043e\\u0440\\u043e\\u0434\\u0430 \\u0438\\u043b\\u0438 \\u0433\\u043e\\u0441\\u0443\\u0434\\u0430\\u0440\\u0441\\u0442\\u0432\\u0430","DBC_ADVANCED_SEARCH":"\\u0420\\u0430\\u0441\\u0448\\u0438\\u0440\\u0435\\u043d\\u043d\\u044b\\u0439 \\u043f\\u043e\\u0438\\u0441\\u043a","DBC_RECENT_PROPERTIES":"\\u041f\\u043e\\u0441\\u043b\\u0435\\u0434\\u043d\\u0438\\u0435 \\u0421\\u0432\\u043e\\u0439\\u0441\\u0442\\u0432\\u0430","DBC_AGENTS":"\\u0410\\u0433\\u0435\\u043d\\u0442\\u044b","DBC_NO_ESTATES_FOUND":"\\u041d\\u0435\\u0442 \\u043d\\u0435\\u0434\\u0432\\u0438\\u0436\\u0438\\u043c\\u043e\\u0441\\u0442\\u0438 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u044b","DBC_HOME":"\\u0434\\u043e\\u043c\\u043e\\u0439","DBC_ABOUT":"\\u043e\\u043a\\u043e\\u043b\\u043e","DBC_CONTACT":"\\u043a\\u043e\\u043d\\u0442\\u0430\\u043a\\u0442","DBC_PLAIN_SEARCH":"\\u041e\\u0431\\u044b\\u0447\\u043d\\u044b\\u0439 \\u043f\\u043e\\u0438\\u0441\\u043a","DBC_IGNORE_THIS_SECTION":"\\u041f\\u0440\\u043e\\u043f\\u0443\\u0441\\u0442\\u0438\\u0442\\u0435 \\u044d\\u0442\\u043e\\u0442 \\u0440\\u0430\\u0437\\u0434\\u0435\\u043b","DBC_LOCATION_SEARCH":"\\u041c\\u0435\\u0441\\u0442\\u043e\\u043f\\u043e\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u0435 \\u041f\\u043e\\u0438\\u0441\\u043a","DBC_COUNTRY":"\\u0441\\u0442\\u0440\\u0430\\u043d\\u0430","DBC_STATE_PROVINCE":"\\u0428\\u0442\\u0430\\u0442 \\/ Provice","DBC_CITY":"CIty","DBC_PRICE":"\\u0446\\u0435\\u043d\\u0430","DBC_BEDROOM":"\\u0441\\u043f\\u0430\\u043b\\u044c\\u043d\\u0438","DBC_BATHROOM":"\\u0432\\u0430\\u043d\\u043d\\u044b\\u0435","DBC_YEAR_BUILT":"\\u0413\\u043e\\u0434 \\u043f\\u043e\\u0441\\u0442\\u0440\\u043e\\u0439\\u043a\\u0438","DBC_PHONE":"\\u0442\\u0435\\u043b\\u0435\\u0444\\u043e\\u043d","DBC_FIRST_NAME":"\\u0418\\u043c\\u044f","DBC_LAST_NAME":"\\u0424\\u0430\\u043c\\u0438\\u043b\\u0438\\u044f","DBC_COMPANY_NAME":"\\u041d\\u0430\\u0437\\u0432\\u0430\\u043d\\u0438\\u0435 \\u043a\\u043e\\u043c\\u043f\\u0430\\u043d\\u0438\\u0438","DBC_REGISTER":"\\u0440\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440","DBC_TYPE":"\\u0442\\u0438\\u043f","DBC_AREA":"\\u043f\\u043b\\u043e\\u0449\\u0430\\u0434\\u044c","DBC_DETAILS":"\\u0434\\u0435\\u0442\\u0430\\u043b\\u0438","DBC_VIEW_ALL":"\\u041f\\u0440\\u043e\\u0441\\u043c\\u043e\\u0442\\u0440\\u0435\\u0442\\u044c \\u0432\\u0441\\u0435","DBC_FEATURED_PROPERTIES":"\\u041f\\u043e\\u043f\\u0443\\u043b\\u044f\\u0440\\u043d\\u044b\\u0435 \\u0421\\u0432\\u043e\\u0439\\u0441\\u0442\\u0432\\u0430","DBC_ORDER_BY":"\\u0421\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u0442\\u044c \\u043f\\u043e","DBC_NONE":"\\u041d\\u0438 \\u043e\\u0434\\u0438\\u043d","DBC_TNC":"\\u0421\\u0440\\u043e\\u043a\\u0438 \\u0438 Confition","DBC_REG_SUCCESS":"\\u0412\\u0430\\u0448 \\u0440\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0430\\u0446\\u0438\\u043e\\u043d\\u043d\\u044b\\u0439 \\u0441\\u0447\\u0435\\u0442 \\u0443\\u0441\\u043f\\u0435\\u0448\\u043d\\u0430 . ","DBC_LIMIT":"\\u043f\\u0440\\u0435\\u0434\\u0435\\u043b","DBC_USAGE":"\\u0438\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u043d\\u0438\\u0435","DBC_RECOVER":"\\u0432\\u043e\\u0441\\u0441\\u0442\\u0430\\u043d\\u0430\\u0432\\u043b\\u0438\\u0432\\u0430\\u0442\\u044c","DBC_OOPS":"\\u041a \\u0441\\u043e\\u0436\\u0430\\u043b\\u0435\\u043d\\u0438\\u044e , \\u0441\\u0442\\u0440\\u0430\\u043d\\u0438\\u0446\\u0430 \\u043d\\u0435 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u0430","DBC_SHARE_THIS":"\\u041f\\u043e\\u0434\\u0435\\u043b\\u0438\\u0442\\u044c\\u0441\\u044f \\u044d\\u0442\\u043e\\u0439","DBC_BATH":"\\u0431\\u0430\\u043d\\u044f","DBC_STATUS":"\\u0441\\u0442\\u0430\\u0442\\u0443\\u0441","DBC_DESCRIPTION":"\\u043e\\u043f\\u0438\\u0441\\u0430\\u043d\\u0438\\u0435","DBC_GA":"\\u043e\\u0431\\u0449\\u0435\\u0433\\u043e \\u0443\\u0434\\u043e\\u0431\\u0441\\u0442\\u0432\\u0430","DBC_LOCATION_MAP":"\\u0421\\u0445\\u0435\\u043c\\u0430 \\u043f\\u0440\\u043e\\u0435\\u0437\\u0434\\u0430","DBC_IMAGE_GALLERY":"\\u0413\\u0430\\u043b\\u0435\\u0440\\u0435\\u044f \\u0438\\u0437\\u043e\\u0431\\u0440\\u0430\\u0436\\u0435\\u043d\\u0438\\u0439","DBC_SUMMARY":"\\u0440\\u0435\\u0437\\u044e\\u043c\\u0435","DBC_OVERVIEW":"\\u043e\\u0431\\u0437\\u043e\\u0440","DBC_ADDRESS":"\\u0430\\u0434\\u0440\\u0435\\u0441","DBC_AGENT":"\\u0430\\u0433\\u0435\\u043d\\u0442","DBC_MESSAGE":"\\u0441\\u043e\\u043e\\u0431\\u0449\\u0435\\u043d\\u0438\\u0435","DBC_USER_NAME":"\\u0418\\u043c\\u044f \\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u0442\\u0435\\u043b\\u044f","DBC_ABOUT_ME":"\\u041e\\u0431\\u043e \\u043c\\u043d\\u0435","DBC_PER_MONTH":"\\u0432 \\u043c\\u0435\\u0441\\u044f\\u0446","DBC_PER_QUARTER":"\\u0437\\u0430 \\u043a\\u0432\\u0430\\u0440\\u0442\\u0430\\u043b","DBC_PER_YEAR":"\\u0412 \\u0433\\u043e\\u0434","DBC_TYPE_CONDO":"\\u043a\\u0432\\u0430\\u0440\\u0442\\u0438\\u0440\\u0430","DBC_TYPE_VILLA":"\\u0432\\u0438\\u043b\\u043b\\u0430","DBC_TYPE_FILTERS":"\\u0422\\u0438\\u043f \\u0424\\u0438\\u043b\\u044c\\u0442\\u0440\\u044b","DBC_PURPOSE_FILTERS":"\\u041d\\u0430\\u0437\\u043d\\u0430\\u0447\\u0435\\u043d\\u0438\\u0435 \\u0424\\u0438\\u043b\\u044c\\u0442\\u0440\\u044b","DBC_EMAIL_SUBJECT":"\\u0422\\u0435\\u043c\\u0430 \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u043e\\u0433\\u043e \\u043f\\u0438\\u0441\\u044c\\u043c\\u0430","DBC_ALL":"\\u0432\\u0441\\u0435","DBC_DELETED":"\\u0443\\u0434\\u0430\\u043b\\u0435\\u043d\\u043d\\u044b\\u0439","DBC_AGENT_PROPERTIES":"\\u0410\\u0433\\u0435\\u043d\\u0442\\u044b \\u0421\\u0432\\u043e\\u0439\\u0441\\u0442\\u0432\\u0430","DBC_ALL_AGENTS":"\\u0412\\u0441\\u0435 \\u0430\\u0433\\u0435\\u043d\\u0442\\u044b","DBC_CONTACT_US":"\\u0441\\u0432\\u044f\\u0437\\u0430\\u0442\\u044c\\u0441\\u044f \\u0441 \\u043d\\u0430\\u043c\\u0438","DBC_ACTIVE":"\\u0430\\u043a\\u0442\\u0438\\u0432\\u043d\\u044b\\u0439","DBC_RADIUS":"\\u0440\\u0430\\u0434\\u0438\\u0443\\u0441","DBC_VIDEO_EMBED":"\\u041b\\u0443\\u0447\\u0448\\u0435\\u0435 \\u0432\\u0438\\u0434\\u0435\\u043e","DBC_PROPERTIES":"\\u0441\\u0432\\u043e\\u0439\\u0441\\u0442\\u0432\\u0430","DBC_EMBED_VIDEO_URL":"Embeded \\u0421\\u0441\\u044b\\u043b\\u043a\\u0430 \\u043d\\u0430 \\u0432\\u0438\\u0434\\u0435\\u043e","DBC_PENDING":"\\u0432 \\u043e\\u0436\\u0438\\u0434\\u0430\\u043d\\u0438\\u0438","DBC_PROFILE_PHOTO":"\\u0420\\u0438\\u0441\\u0443\\u043d\\u043e\\u043a \\u043f\\u0440\\u043e\\u0444\\u0438\\u043b\\u044f","DBC_TOP_PROPERTIES":"\\u0422\\u043e\\u043f \\u0421\\u0432\\u043e\\u0439\\u0441\\u0442\\u0432\\u0430","DBC_PROPERTY":"\\u0421\\u0432\\u043e\\u0439\\u0441\\u0442\\u0432\\u0430"}', 1),
(5, 'Arabic-ar', 'Arabic', 'ar', '{"DBC_PURPOSE_SALE":"\\u0644\\u0644\\u0628\\u064a\\u0639","DBC_PURPOSE_RENT":"\\u0644\\u0644\\u0625\\u064a\\u062c\\u0627\\u0631","DBC_PURPOSE_BOTH":"\\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648 \\u0644\\u0644\\u0625\\u064a\\u062c\\u0627\\u0631","DBC_TYPE_APARTMENT":"\\u0634\\u0642\\u0629","DBC_TYPE_HOUSE":"\\u0645\\u0646\\u0632\\u0644","DBC_TYPE_LAND":"\\u0623\\u0631\\u0636","DBC_TYPE_COMSPACE":"\\u0639\\u0645\\u0627\\u0631\\u0629 \\u062a\\u062c\\u0627\\u0631\\u0629","DBC_CONDITION_NEW":"\\u062c\\u062f\\u064a\\u062f","DBC_CONDITION_SOLD":"\\u062a\\u0645 \\u0627\\u0644\\u0628\\u064a\\u0639","DBC_CONDITION_AVAILABLE":"\\u0645\\u062a\\u0648\\u0641\\u0631","DBC_CONDITION_AUCTION":"\\u0645\\u0632\\u0627\\u062f \\u0639\\u0644\\u0646\\u064a","DBC_SIGN_IN":"\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u062f\\u062e\\u0648\\u0644","DBC_SIGN_UP":"\\u062d\\u0633\\u0627\\u0628 \\u062c\\u062f\\u064a\\u062f","DBC_AGENT_PANEL":"\\u0644\\u0648\\u062d\\u0629 \\u0627\\u0644\\u062a\\u062d\\u0643\\u0645","DBC_ADMIN_PANEL":"\\u0644\\u0648\\u062d\\u0629 \\u0627\\u0644\\u0645\\u0634\\u0631\\u0641","DBC_LOGOUT":"\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u062e\\u0631\\u0648\\u062c","DBC_FIND_YOUR_PLACE":"\\u062d\\u062f\\u062f \\u0645\\u0643\\u0627\\u0646\\u0643","DBC_SEARCH_TEXT":"\\u0628\\u062d\\u062b \\u0639\\u0646 \\u0627\\u0644\\u0639\\u0646\\u0648\\u0627\\u0646 \\u060c \\u0627\\u0644\\u062d\\u064a \\u060c \\u0627\\u0644\\u0645\\u062f\\u064a\\u0646\\u0629 \\u0623\\u0648 \\u0627\\u0644\\u062f\\u0648\\u0644\\u0629","DBC_ADVANCED_SEARCH":"\\u0628\\u062d\\u062b \\u0645\\u062a\\u0642\\u062f\\u0645","DBC_RECENT_PROPERTIES":"\\u0627\\u062e\\u0631 \\u0627\\u0644\\u0639\\u0642\\u0627\\u0631\\u0627\\u062a","DBC_AGENTS":"\\u0648\\u0643\\u064a\\u0644 \\u0639\\u0642\\u0627\\u0631\\u0627\\u062a","DBC_NO_ESTATES_FOUND":"\\u0644\\u0645 \\u064a\\u062a\\u0645 \\u0627\\u0644\\u0639\\u062b\\u0648\\u0631\\u0639\\u0644\\u0649 \\u0639\\u0642\\u0627\\u0631\\u0627\\u062a","DBC_HOME":"\\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629","DBC_ABOUT":"\\u062d\\u0648\\u0644","DBC_CONTACT":"\\u0627\\u062a\\u0635\\u0644 \\u0628\\u0646\\u0627","DBC_PLAIN_SEARCH":"\\u0627\\u0644\\u0628\\u062d\\u062b \\u0639\\u0627\\u062f\\u064a","DBC_IGNORE_THIS_SECTION":"\\u062a\\u062c\\u0627\\u0647\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0642\\u0633\\u0645","DBC_LOCATION_SEARCH":"\\u0628\\u062d\\u062b \\u0628\\u0627\\u0644\\u0645\\u0648\\u0642\\u0639","DBC_COUNTRY":"\\u0627\\u0644\\u062f\\u0648\\u0644\\u0629","DBC_STATE_PROVINCE":"\\u0627\\u0644\\u062f\\u0648\\u0644\\u0629 \\/ \\u0627\\u0644\\u0645\\u062d\\u0627\\u0641\\u0638\\u0629","DBC_CITY":"\\u0627\\u0644\\u0645\\u062f\\u064a\\u0646\\u0629","DBC_PRICE":"\\u0627\\u0644\\u0633\\u0639\\u0631","DBC_BEDROOM":"\\u063a\\u0631\\u0641 \\u0627\\u0644\\u0646\\u0648\\u0645","DBC_BATHROOM":"\\u0627\\u0644\\u062d\\u0645\\u0627\\u0645\\u0627\\u062a","DBC_YEAR_BUILT":"\\u0633\\u0646\\u0629 \\u0627\\u0644\\u0628\\u0646\\u0627\\u0621","DBC_PHONE":"\\u0647\\u0627\\u062a\\u0641","DBC_FIRST_NAME":"\\u0627\\u0644\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0623\\u0648\\u0644","DBC_LAST_NAME":"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0639\\u0627\\u0626\\u0644\\u0629","DBC_COMPANY_NAME":"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629","DBC_REGISTER":"\\u062a\\u0633\\u062c\\u064a\\u0644","DBC_TYPE":"\\u0646\\u0648\\u0639","DBC_AREA":"\\u0627\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629","DBC_DETAILS":"\\u062a\\u0641\\u0627\\u0635\\u064a\\u0644","DBC_VIEW_ALL":"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u062c\\u0645\\u064a\\u0639","DBC_FEATURED_PROPERTIES":"\\u0639\\u0642\\u0627\\u0631 \\u0645\\u0645\\u064a\\u0632","DBC_ORDER_BY":"\\u062a\\u0631\\u062a\\u064a\\u0628 \\u062d\\u0633\\u0628","DBC_NONE":"\\u0644\\u0627 \\u0634\\u064a\\u0621","DBC_TNC":"\\u0634\\u0631\\u0648\\u0637 \\u0648\\u0627\\u062d\\u0643\\u0627\\u0645","DBC_REG_SUCCESS":"\\u0642\\u0635\\u0629 \\u0646\\u062c\\u0627\\u062d ","DBC_LIMIT":"\\u062d\\u062f","DBC_USAGE":"\\u0645\\u0633\\u062a\\u0639\\u0645\\u0644","DBC_RECOVER":"\\u0627\\u0633\\u062a\\u0639\\u0627\\u062f\\u0629","DBC_OOPS":"\\u0639\\u0641\\u0648\\u0627 \\u060c \\u0644\\u0645 \\u064a\\u062a\\u0645 \\u0627\\u0644\\u0639\\u062b\\u0648\\u0631 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629","DBC_SHARE_THIS":"\\u0634\\u0627\\u0631\\u0643","DBC_BATH":"\\u062f\\u0648\\u0631\\u0629 \\u0645\\u064a\\u0627\\u0629","DBC_STATUS":"\\u0627\\u0644\\u062d\\u0627\\u0644\\u0629","DBC_DESCRIPTION":"\\u0627\\u0644\\u0648\\u0635\\u0641","DBC_GA":"\\u0627\\u0644\\u0645\\u0631\\u0627\\u0641\\u0642 \\u0627\\u0644\\u0639\\u0627\\u0645\\u0629","DBC_LOCATION_MAP":"\\u062e\\u0631\\u064a\\u0637\\u0629 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639","DBC_IMAGE_GALLERY":"\\u0645\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0635\\u0648\\u0631","DBC_SUMMARY":"\\u0645\\u0644\\u062e\\u0635","DBC_OVERVIEW":"\\u0646\\u0638\\u0631\\u0629 \\u0639\\u0627\\u0645\\u0629","DBC_ADDRESS":"\\u0627\\u0644\\u0639\\u0646\\u0648\\u0627\\u0646","DBC_AGENT":"\\u0627\\u0644\\u0648\\u0643\\u064a\\u0644","DBC_MESSAGE":"\\u0631\\u0633\\u0627\\u0644\\u0629","DBC_USER_NAME":"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645","DBC_ABOUT_ME":"\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0639\\u0646\\u064a","DBC_PER_MONTH":"\\u0643\\u0644 \\u0634\\u0647\\u0631","DBC_PER_QUARTER":"\\u0643\\u0644 \\u0663 \\u0627\\u0634\\u0647\\u0631","DBC_PER_YEAR":"\\u0641\\u064a \\u0627\\u0644\\u0633\\u0646\\u0629","DBC_TYPE_CONDO":"\\u0627\\u0644\\u0634\\u0642\\u0629","DBC_TYPE_VILLA":"\\u0641\\u064a\\u0644\\u0627","DBC_TYPE_FILTERS":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0641\\u0644\\u0627\\u062a\\u0631","DBC_PURPOSE_FILTERS":"\\u0645\\u0631\\u0634\\u062d\\u0627\\u062a \\u0627\\u0644\\u063a\\u0631\\u0636","DBC_EMAIL_SUBJECT":"\\u0645\\u0648\\u0636\\u0648\\u0639 \\u0627\\u0644\\u0631\\u0633\\u0627\\u0644\\u0629","DBC_ALL":"\\u0643\\u0644","DBC_DELETED":"\\u062a\\u0645 \\u0627\\u0644\\u062d\\u0630\\u0641","DBC_AGENT_PROPERTIES":"\\u0648\\u0643\\u0644\\u0627\\u0621 \\u0627\\u0644\\u0639\\u0642\\u0627\\u0631\\u0627\\u062a","DBC_ALL_AGENTS":"\\u062c\\u0645\\u064a\\u0639 \\u0627\\u0644\\u0648\\u0643\\u0644\\u0627\\u0621","DBC_CONTACT_US":"\\u0627\\u0644\\u0627\\u062a\\u0635\\u0627\\u0644 \\u0628\\u0646\\u0627","DBC_ACTIVE":"\\u0641\\u0639\\u0627\\u0644","DBC_RADIUS":"\\u0646\\u0635\\u0641 \\u0627\\u0644\\u0642\\u0637\\u0631","DBC_VIDEO_EMBED":"\\u0641\\u064a\\u062f\\u064a\\u0648 \\u0645\\u062a\\u0645\\u064a\\u0632","DBC_PROPERTIES":"\\u062e\\u0635\\u0627\\u0626\\u0635","DBC_EMBED_VIDEO_URL":"\\u0645\\u0637\\u0639\\u0645 \\u0628 \\u0631\\u0627\\u0628\\u0637 \\u0627\\u0644\\u0641\\u064a\\u062f\\u064a\\u0648","DBC_PENDING":"\\u0627\\u0644\\u0631\\u062c\\u0627\\u0621 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0638\\u0627\\u0631","DBC_PROFILE_PHOTO":"\\u0627\\u0644\\u0635\\u0648\\u0631\\u0629 \\u0627\\u0644\\u0634\\u062e\\u0635\\u064a\\u0629","DBC_TOP_PROPERTIES":"\\u0623\\u0639\\u0644\\u0649 \\u0627\\u0644\\u062e\\u0635\\u0627\\u0626\\u0635","DBC_PROPERTY":"\\u0645\\u0645\\u062a\\u0644\\u0643\\u0627\\u062a"}', 1),
(6, 'Turkish-tr', 'Turkish', 'tr', '{"DBC_PURPOSE_SALE":"Sat\\u0131l\\u0131k","DBC_PURPOSE_RENT":"Kiral\\u0131k","DBC_PURPOSE_BOTH":"Sat\\u0131l\\u0131k & Kiral\\u0131k","DBC_TYPE_APARTMENT":"Daire","DBC_TYPE_HOUSE":"Mustakil Ev","DBC_TYPE_LAND":"arazi","DBC_TYPE_COMSPACE":"ticari Uzay","DBC_CONDITION_NEW":"yeni","DBC_CONDITION_SOLD":"sat\\u0131lan","DBC_CONDITION_AVAILABLE":"mevcut","DBC_CONDITION_AUCTION":"a\\u00e7\\u0131k art\\u0131rma","DBC_SIGN_IN":"oturum a\\u00e7","DBC_SIGN_UP":"kaydol","DBC_AGENT_PANEL":"ajan Panel","DBC_ADMIN_PANEL":"Y\\u00f6netici Paneli","DBC_LOGOUT":"logout","DBC_FIND_YOUR_PLACE":"Sizin Yeri Bul","DBC_SEARCH_TEXT":"Adres , Mahalle , \\u015eehir veya Devlet aray\\u0131n","DBC_ADVANCED_SEARCH":"Geli\\u015fmi\\u015f Arama","DBC_RECENT_PROPERTIES":"Yeni \\u00d6zellikler","DBC_AGENTS":"ajanlar","DBC_NO_ESTATES_FOUND":"Bulunamad\\u0131 Estates","DBC_HOME":"ev","DBC_ABOUT":"hakk\\u0131nda","DBC_CONTACT":"temas","DBC_PLAIN_SEARCH":"d\\u00fcz Arama","DBC_IGNORE_THIS_SECTION":"Bu b\\u00f6l\\u00fcm\\u00fc g\\u00f6rmezden","DBC_LOCATION_SEARCH":"Yer arama","DBC_COUNTRY":"\\u00fclke","DBC_STATE_PROVINCE":"Devlet \\/ Provice","DBC_CITY":"\\u015eehir","DBC_PRICE":"fiyat","DBC_BEDROOM":"Yatak odas\\u0131","DBC_BATHROOM":"Banyolar","DBC_YEAR_BUILT":"Yap\\u0131m y\\u0131l\\u0131","DBC_PHONE":"telefon","DBC_FIRST_NAME":"\\u0130sim","DBC_LAST_NAME":"soyad\\u0131","DBC_COMPANY_NAME":"Firma Ad\\u0131","DBC_REGISTER":"kaydetmek","DBC_TYPE":"tip","DBC_AREA":"alan","DBC_DETAILS":"detaylar","DBC_VIEW_ALL":"T\\u00fcm G\\u00f6r","DBC_FEATURED_PROPERTIES":"\\u00d6ne \\u00c7\\u0131kan \\u00d6zellikleri","DBC_ORDER_BY":"Siralama","DBC_NONE":"hi\\u00e7biri","DBC_TNC":"\\u015eartlar ve Confition","DBC_REG_SUCCESS":"Hesab\\u0131n\\u0131z kay\\u0131t ba\\u015far\\u0131l\\u0131d\\u0131r. ","DBC_LIMIT":"limit","DBC_USAGE":"kullan\\u0131m","DBC_RECOVER":"kurtarmak","DBC_OOPS":"\\u00dczg\\u00fcn\\u00fcz, sayfa bulunamad\\u0131","DBC_SHARE_THIS":"Bu payla\\u015f","DBC_BATH":"hamam","DBC_STATUS":"durum","DBC_DESCRIPTION":"a\\u00e7\\u0131klama","DBC_GA":"Genel \\u00d6zellikler","DBC_LOCATION_MAP":"Location Map","DBC_IMAGE_GALLERY":"Resim Galerisi","DBC_SUMMARY":"\\u00f6zet","DBC_OVERVIEW":"genel bak\\u0131\\u015f","DBC_ADDRESS":"adres","DBC_AGENT":"ajan","DBC_MESSAGE":"mesaj","DBC_USER_NAME":"ad\\u0131","DBC_ABOUT_ME":"benim hakk\\u0131mda","DBC_PER_MONTH":"Ayl\\u0131k","DBC_PER_QUARTER":"\\u00c7eyrek ba\\u015f\\u0131na","DBC_PER_YEAR":"Y\\u0131l Ba\\u015f\\u0131","DBC_TYPE_CONDO":"konut","DBC_TYPE_VILLA":"villa","DBC_TYPE_FILTERS":"Tip Filtreler","DBC_PURPOSE_FILTERS":"Ama\\u00e7 Filtreler","DBC_EMAIL_SUBJECT":"E-posta Konusu","DBC_ALL":"t\\u00fcm","DBC_DELETED":"silindi","DBC_AGENT_PROPERTIES":"ajanlar \\u00d6zellikleri","DBC_ALL_AGENTS":"T\\u00fcm Ajanlar","DBC_CONTACT_US":"bize Ula\\u015f\\u0131n","DBC_ACTIVE":"aktif","DBC_RADIUS":"yar\\u0131\\u00e7ap","DBC_VIDEO_EMBED":"\\u00d6ne \\u00e7\\u0131kan video","DBC_PROPERTIES":"\\u00f6zellikleri","DBC_EMBED_VIDEO_URL":"G\\u00f6m\\u00fcl\\u00fc Video Url","DBC_PENDING":"kadar","DBC_PROFILE_PHOTO":"profil resim","DBC_TOP_PROPERTIES":"Top \\u00d6zellikler","DBC_PROPERTY":"\\u00f6zellik","_empty_":""}', 1),
(7, 'French-fr', 'French', 'fr', '{"DBC_PURPOSE_SALE":"Vente","DBC_PURPOSE_RENT":"Louer","DBC_PURPOSE_BOTH":"Sale & Rent","DBC_TYPE_APARTMENT":"Appartement","DBC_TYPE_HOUSE":"Maison","DBC_TYPE_LAND":"Terre","DBC_TYPE_COMSPACE":"Espace commercial","DBC_CONDITION_NEW":"Nouveau","DBC_CONDITION_SOLD":"Vendu","DBC_CONDITION_AVAILABLE":"Disponible","DBC_CONDITION_AUCTION":"Ench\\u00e8res","DBC_SIGN_IN":"Se Connecter","DBC_SIGN_UP":"Signer","DBC_AGENT_PANEL":"Panneau agent","DBC_ADMIN_PANEL":"administration","DBC_LOGOUT":"D\\u00e9connexion","DBC_FIND_YOUR_PLACE":"Trouvez votre place","DBC_SEARCH_TEXT":"Rechercher des Adresse, Quartier , Ville ou \\u00c9tat","DBC_ADVANCED_SEARCH":"Recherche avanc\\u00e9e","DBC_RECENT_PROPERTIES":"Propri\\u00e9t\\u00e9s r\\u00e9centes","DBC_AGENTS":"Agents","DBC_NO_ESTATES_FOUND":"Aucun bien trouv\\u00e9","DBC_HOME":"Maison","DBC_ABOUT":"Sur","DBC_CONTACT":"Contacter","DBC_PLAIN_SEARCH":"Recherche plaine","DBC_IGNORE_THIS_SECTION":"Ignorer cette section","DBC_LOCATION_SEARCH":"Lieu Recherche","DBC_COUNTRY":"pays","DBC_STATE_PROVINCE":"\\u00c9tat \\/ Provice","DBC_CITY":"Ville","DBC_PRICE":"Prix","DBC_BEDROOM":"Chambres","DBC_BATHROOM":"Salle de bain","DBC_YEAR_BUILT":"Ann\\u00e9e de construction","DBC_PHONE":"T\\u00e9l\\u00e9phone","DBC_FIRST_NAME":"Pr\\u00e9nom","DBC_LAST_NAME":"Nom de famille","DBC_COMPANY_NAME":"Nom de l''entreprise","DBC_REGISTER":"Enregistrer","DBC_TYPE":"Type","DBC_AREA":"r\\u00e9gion","DBC_DETAILS":"D\\u00e9tails","DBC_VIEW_ALL":"Voir tous","DBC_FEATURED_PROPERTIES":"Propri\\u00e9t\\u00e9s en vedette","DBC_ORDER_BY":"Trier par","DBC_NONE":"aucun","DBC_TNC":"Termes et confition","DBC_REG_SUCCESS":"L''enregistrement de votre compte est r\\u00e9ussie . ","DBC_LIMIT":"limite","DBC_USAGE":"usage","DBC_RECOVER":"r\\u00e9cup\\u00e9rer","DBC_OOPS":"Oups, page non trouv\\u00e9e","DBC_SHARE_THIS":"Share","DBC_BATH":"thermes","DBC_STATUS":"statut","DBC_DESCRIPTION":"Description","DBC_GA":"Services g\\u00e9n\\u00e9raux","DBC_LOCATION_MAP":"Carte de localisation","DBC_IMAGE_GALLERY":"Galerie d''images","DBC_SUMMARY":"r\\u00e9sum\\u00e9","DBC_OVERVIEW":"vue d''ensemble","DBC_ADDRESS":"adresse","DBC_AGENT":"agent","DBC_MESSAGE":"message","DBC_USER_NAME":"Nom d''utilisateur","DBC_ABOUT_ME":"sur moi","DBC_PER_MONTH":"par mois","DBC_PER_QUARTER":"par trimestre","DBC_PER_YEAR":"par ann\\u00e9e","DBC_TYPE_CONDO":"Condo","DBC_TYPE_VILLA":"villa","DBC_TYPE_FILTERS":"Filtres","DBC_PURPOSE_FILTERS":"Filtres \\u00e0 usage","DBC_EMAIL_SUBJECT":"Objet de l''email","DBC_ALL":"tous","DBC_DELETED":"supprim\\u00e9","DBC_AGENT_PROPERTIES":"agents Propri\\u00e9t\\u00e9s","DBC_ALL_AGENTS":"tous les agents","DBC_CONTACT_US":"Contactez-nous","DBC_ACTIVE":"Actif","DBC_RADIUS":"rayon","DBC_VIDEO_EMBED":"vid\\u00e9o en vedette","DBC_PROPERTIES":"Propri\\u00e9t\\u00e9s","DBC_EMBED_VIDEO_URL":"Embeded URL de la vid\\u00e9o","DBC_PENDING":"En attendant","DBC_PROFILE_PHOTO":"Profile Picture","DBC_TOP_PROPERTIES":"D\\u00e9but Propri\\u00e9t\\u00e9s","DBC_PROPERTY":"Propri\\u00e9t\\u00e9"}', 1),
(8, 'Urdu-ud-Ud', 'Urdu-ud', 'Ud', '{"DBC_PURPOSE_SALE":"Sale ","DBC_PURPOSE_RENT":"Rent","DBC_PURPOSE_BOTH":"Sale & Rent","DBC_TYPE_APARTMENT":"Apartment","DBC_TYPE_HOUSE":"House","DBC_TYPE_LAND":"Land","DBC_TYPE_COMSPACE":"Commercial Space","DBC_CONDITION_NEW":"New","DBC_CONDITION_SOLD":"Sold","DBC_CONDITION_AVAILABLE":"Available","DBC_CONDITION_AUCTION":"Auction","DBC_SIGN_IN":"Sign In","DBC_SIGN_UP":"Sign Up","DBC_AGENT_PANEL":"Agent Panel","DBC_ADMIN_PANEL":"Admin Panel","DBC_LOGOUT":"Logout","DBC_FIND_YOUR_PLACE":"Find Your Place","DBC_SEARCH_TEXT":"Search for Address, Neighbourhood, City or State","DBC_ADVANCED_SEARCH":"Advanced Search","DBC_RECENT_PROPERTIES":"Recent Properties","DBC_AGENTS":"Agents","DBC_NO_ESTATES_FOUND":"No Estates Found","DBC_HOME":"Home","DBC_ABOUT":"About","DBC_CONTACT":"Contact","DBC_PLAIN_SEARCH":"Plain Search","DBC_IGNORE_THIS_SECTION":"Ignore this section","DBC_LOCATION_SEARCH":"Location Search","DBC_COUNTRY":"Country","DBC_STATE_PROVINCE":"State\\/Provice","DBC_CITY":"City","DBC_PRICE":"Price","DBC_BEDROOM":"Bedrooms","DBC_BATHROOM":"Bathrooms","DBC_YEAR_BUILT":"Year Built","DBC_PHONE":"Phone","DBC_FIRST_NAME":"First Name","DBC_LAST_NAME":"Last Name","DBC_COMPANY_NAME":"Company Name","DBC_REGISTER":"Register","DBC_TYPE":"Type","DBC_AREA":"Area","DBC_DETAILS":"Details","DBC_VIEW_ALL":"View All","DBC_FEATURED_PROPERTIES":"Featured Properties","DBC_ORDER_BY":"Order By","DBC_NONE":"None","DBC_TNC":"Terms and Confition","DBC_REG_SUCCESS":"Your account registration is successfull. An email was sent to your email. Please follow that email to activate your account.Thanks","DBC_LIMIT":"Limit","DBC_USAGE":"Usage","DBC_RECOVER":"Recover","DBC_OOPS":"Oops, page not found","DBC_SHARE_THIS":"Share This","DBC_BATH":"Baths","DBC_STATUS":"Status","DBC_DESCRIPTION":"Description","DBC_GA":"General Amenities","DBC_LOCATION_MAP":"Location Map","DBC_IMAGE_GALLERY":"Image Gallery","DBC_SUMMARY":"Summary","DBC_OVERVIEW":"Overview","DBC_ADDRESS":"Address","DBC_AGENT":"Agent","DBC_MESSAGE":"Message","DBC_USER_NAME":"Username","DBC_ABOUT_ME":"About Me","DBC_PER_MONTH":"Per Month","DBC_PER_QUARTER":"Per Quarter","DBC_PER_YEAR":"Per Year","DBC_TYPE_CONDO":"Condo","DBC_TYPE_VILLA":"Villa","DBC_TYPE_FILTERS":"Type Filters","DBC_PURPOSE_FILTERS":"Purpose Filters","DBC_EMAIL_SUBJECT":"Email Subject","DBC_ALL":"All","DBC_DELETED":"Deleted","DBC_AGENT_PROPERTIES":"Agents Properties","DBC_ALL_AGENTS":"All Agents","DBC_CONTACT_US":"Contact Us","DBC_ACTIVE":"Active","DBC_RADIUS":"Radius","DBC_VIDEO_EMBED":"Featured Video","DBC_PROPERTIES":"Properties","DBC_EMBED_VIDEO_URL":"Embeded Video Url","DBC_PENDING":"Pending","DBC_PROFILE_PHOTO":"Profile Picture","DBC_TOP_PROPERTIES":"Top Properties","DBC_PROPERTY":"Property"}', 1),
(9, 'catalan-ca', 'catalan', 'ca', '{"DBC_PURPOSE_SALE":"Surt","DBC_PURPOSE_RENT":"renda","DBC_PURPOSE_BOTH":"Venda i Renda","DBC_TYPE_APARTMENT":"Apartament","DBC_TYPE_HOUSE":null,"DBC_TYPE_LAND":null,"DBC_TYPE_COMSPACE":"locals Comercials","DBC_CONDITION_NEW":"nou","DBC_CONDITION_SOLD":null,"DBC_CONDITION_AVAILABLE":"disponible","DBC_CONDITION_AUCTION":"subhasta","DBC_SIGN_IN":"Registrar","DBC_SIGN_UP":"contractar","DBC_AGENT_PANEL":"panell Agent","DBC_ADMIN_PANEL":"panell d''Administraci\\u00f3","DBC_LOGOUT":"sortir","DBC_FIND_YOUR_PLACE":"Troba el teu lloc","DBC_SEARCH_TEXT":"Cerca de Direcci\\u00f3 , Barri , Ciutat o Estat","DBC_ADVANCED_SEARCH":"cerca avan\\u00e7ada","DBC_RECENT_PROPERTIES":"propietats recents","DBC_AGENTS":null,"DBC_NO_ESTATES_FOUND":"No hi ha Estates trobats","DBC_HOME":null,"DBC_ABOUT":null,"DBC_CONTACT":"contacte","DBC_PLAIN_SEARCH":"plana Cercar","DBC_IGNORE_THIS_SECTION":"No feu cas d''aquesta secci\\u00f3","DBC_LOCATION_SEARCH":"Cercar una localitat","DBC_COUNTRY":"pa\\u00eds","DBC_STATE_PROVINCE":"Estat \\/ Provice","DBC_CITY":null,"DBC_PRICE":"preu","DBC_BEDROOM":"habitacions","DBC_BATHROOM":"Banys","DBC_YEAR_BUILT":"any de construcci\\u00f3","DBC_PHONE":"tel\\u00e8fon","DBC_FIRST_NAME":"nom de pila","DBC_LAST_NAME":"cognom","DBC_COMPANY_NAME":"nom d''empresa","DBC_REGISTER":"registrar","DBC_TYPE":"tipus","DBC_AREA":"zona","DBC_DETAILS":null,"DBC_VIEW_ALL":"veure tots","DBC_FEATURED_PROPERTIES":"immobles destacats","DBC_ORDER_BY":"ordenar per","DBC_NONE":"cap","DBC_TNC":"Termes i Confition","DBC_REG_SUCCESS":"El seu registre del compte \\u00e9s reeixida . ","DBC_LIMIT":"l\\u00edmit","DBC_USAGE":"\\u00fas","DBC_RECOVER":"recuperar","DBC_OOPS":"Vaja, p\\u00e0gina no trobada","DBC_SHARE_THIS":"comparteix aquest","DBC_BATH":"piscina","DBC_STATUS":"estat","DBC_DESCRIPTION":null,"DBC_GA":"serveis Generals","DBC_LOCATION_MAP":"mapa de localitzaci\\u00f3","DBC_IMAGE_GALLERY":"Galeria d''imatges","DBC_SUMMARY":"Resum","DBC_OVERVIEW":"visi\\u00f3 de conjunt","DBC_ADDRESS":"direcci\\u00f3","DBC_AGENT":"agent","DBC_MESSAGE":"missatge","DBC_USER_NAME":"nom d''usuari","DBC_ABOUT_ME":"sobre mi","DBC_PER_MONTH":"per Mes","DBC_PER_QUARTER":"per quart","DBC_PER_YEAR":"per Any","DBC_TYPE_CONDO":"Condo","DBC_TYPE_VILLA":"Villa","DBC_TYPE_FILTERS":"filtres tipus","DBC_PURPOSE_FILTERS":"prop\\u00f2sit Filtres","DBC_EMAIL_SUBJECT":"assumpte del correu","DBC_ALL":"tot","DBC_DELETED":"suprimit","DBC_AGENT_PROPERTIES":"agents de Propietats","DBC_ALL_AGENTS":"tots els agents","DBC_CONTACT_US":"Contacti''ns","DBC_ACTIVE":null,"DBC_RADIUS":"r\\u00e0dio","DBC_VIDEO_EMBED":"v\\u00eddeo del dia","DBC_PROPERTIES":null,"DBC_EMBED_VIDEO_URL":"Embeded Video URL","DBC_PENDING":"pendent","DBC_PROFILE_PHOTO":"foto de Perfil","DBC_TOP_PROPERTIES":"A dalt Propietats","DBC_PROPERTY":"propietat"}', 1),
(10, 'italiano-it', 'italiano', 'it', '{"DBC_PURPOSE_SALE":"Vendita","DBC_PURPOSE_RENT":"Affitto","DBC_PURPOSE_BOTH":"Sale & Rent","DBC_TYPE_APARTMENT":"appartamento","DBC_TYPE_HOUSE":"Casa","DBC_TYPE_LAND":"Terra","DBC_TYPE_COMSPACE":"Locali commerciali","DBC_CONDITION_NEW":"nuovo","DBC_CONDITION_SOLD":"Venduto","DBC_CONDITION_AVAILABLE":"disponibile","DBC_CONDITION_AUCTION":"vendita all''asta","DBC_SIGN_IN":"registrati","DBC_SIGN_UP":"Iscriviti","DBC_AGENT_PANEL":"Agente Panel","DBC_ADMIN_PANEL":"Pannello di Amministrazione","DBC_LOGOUT":"Logout","DBC_FIND_YOUR_PLACE":"Trova il tuo posto","DBC_SEARCH_TEXT":"Ricerca di Indirizzo , Quartiere , Citt\\u00e0 o Regione","DBC_ADVANCED_SEARCH":"Ricerca avanzata","DBC_RECENT_PROPERTIES":"Propriet\\u00e0 recenti","DBC_AGENTS":"Agenti","DBC_NO_ESTATES_FOUND":"Nessun Inmobile trovato","DBC_HOME":"Home","DBC_ABOUT":"Circa","DBC_CONTACT":"Contatto","DBC_PLAIN_SEARCH":" Ricerca","DBC_IGNORE_THIS_SECTION":"Ignorare questa sezione","DBC_LOCATION_SEARCH":"Location Search","DBC_COUNTRY":"Paese","DBC_STATE_PROVINCE":"Stato \\/ Provice","DBC_CITY":"Citta''","DBC_PRICE":"Prezzo","DBC_BEDROOM":"Camere da letto","DBC_BATHROOM":"Bagni","DBC_YEAR_BUILT":"anno di costruzione","DBC_PHONE":"telefono","DBC_FIRST_NAME":"Nome","DBC_LAST_NAME":"Cognome","DBC_COMPANY_NAME":"Nome della ditta","DBC_REGISTER":"registro","DBC_TYPE":"tipo","DBC_AREA":"zona","DBC_DETAILS":"Dettagli","DBC_VIEW_ALL":"Visualizza tutto","DBC_FEATURED_PROPERTIES":"Immobili in vetrina","DBC_ORDER_BY":"Ordini","DBC_NONE":"nessuno","DBC_TNC":"Termini e confition","DBC_REG_SUCCESS":"La tua registrazione account \\u00e8 di successo . ","DBC_LIMIT":"limite","DBC_USAGE":"uso","DBC_RECOVER":"recuperare","DBC_OOPS":"Oops , pagina non trovata","DBC_SHARE_THIS":"Condividi questa","DBC_BATH":"terme","DBC_STATUS":"stato","DBC_DESCRIPTION":"Descrizione","DBC_GA":"Servizi generali","DBC_LOCATION_MAP":"Cartina","DBC_IMAGE_GALLERY":"Galleria di immagini","DBC_SUMMARY":"riassunto","DBC_OVERVIEW":"Panoramica","DBC_ADDRESS":"indirizzo","DBC_AGENT":"agente","DBC_MESSAGE":"messaggio","DBC_USER_NAME":"nome utente","DBC_ABOUT_ME":"su di me","DBC_PER_MONTH":"al Mese","DBC_PER_QUARTER":"per Quarter","DBC_PER_YEAR":"per Anno","DBC_TYPE_CONDO":"condo","DBC_TYPE_VILLA":"villa","DBC_TYPE_FILTERS":"Tipo Filtri","DBC_PURPOSE_FILTERS":"Filtri purpose","DBC_EMAIL_SUBJECT":"Email Oggetto","DBC_ALL":"tutto","DBC_DELETED":"Soppresso","DBC_AGENT_PROPERTIES":"agenti Propriet\\u00e0","DBC_ALL_AGENTS":"tutti gli agenti","DBC_CONTACT_US":"Contattaci","DBC_ACTIVE":"attive","DBC_RADIUS":"raggio","DBC_VIDEO_EMBED":"Video di presentazione","DBC_PROPERTIES":"propieta?","DBC_EMBED_VIDEO_URL":"inserisce Video Url","DBC_PENDING":"in attesa di","DBC_PROFILE_PHOTO":"Foto del Profilo","DBC_TOP_PROPERTIES":"Top Properties","DBC_PROPERTY":"propriet\\u00e0"}', 1),
(11, 'Persian-FA', 'Persian', 'fa', '{"DBC_PURPOSE_SALE":"\\u0641\\u0631\\u0648\\u0634 < ''111 \\u0627\\u06a9\\u0648 \\u067e\\u06cc \\u0627\\u0686 \\u067e\\u06cc ''\\u061b \\u061f >","DBC_PURPOSE_RENT":null,"DBC_PURPOSE_BOTH":"\\u0641\\u0631\\u0648\\u0634 \\u0648 \\u0627\\u062c\\u0627\\u0631\\u0647","DBC_TYPE_APARTMENT":"\\u0627\\u067e\\u0627\\u0631\\u062a\\u0645\\u0627\\u0646","DBC_TYPE_HOUSE":null,"DBC_TYPE_LAND":null,"DBC_TYPE_COMSPACE":"\\u0641\\u0636\\u0627\\u06cc \\u062a\\u062c\\u0627\\u0631\\u06cc","DBC_CONDITION_NEW":"\\u062c\\u062f\\u06cc\\u062f","DBC_CONDITION_SOLD":null,"DBC_CONDITION_AVAILABLE":"\\u062f\\u0631 \\u062f\\u0633\\u062a\\u0631\\u0633","DBC_CONDITION_AUCTION":"\\u062d\\u0631\\u0627\\u062c","DBC_SIGN_IN":"\\u0648\\u0631\\u0648\\u062f \\u0628\\u0647 \\u0633\\u06cc\\u0633\\u062a\\u0645","DBC_SIGN_UP":"\\u062b\\u0628\\u062a \\u0646\\u0627\\u0645","DBC_AGENT_PANEL":"\\u0646\\u0645\\u0627\\u06cc\\u0646\\u062f\\u06af\\u06cc \\u067e\\u0646\\u0644","DBC_ADMIN_PANEL":"\\u067e\\u0646\\u0644 \\u0645\\u062f\\u06cc\\u0631\\u06cc\\u062a","DBC_LOGOUT":"\\u062e\\u0631\\u0648\\u062c \\u0627\\u0632 \\u0633\\u06cc\\u0633\\u062a\\u0645","DBC_FIND_YOUR_PLACE":"\\u06cc\\u0627\\u0641\\u062a\\u0646 \\u0645\\u062d\\u0644 \\u0634\\u0645\\u0627","DBC_SEARCH_TEXT":"\\u062c\\u0633\\u062a\\u062c\\u0648 \\u0628\\u0631\\u0627\\u06cc \\u0622\\u062f\\u0631\\u0633 \\u060c \\u0645\\u062d\\u0644\\u0647 \\u060c \\u0634\\u0647\\u0631 \\u0648 \\u06cc\\u0627 \\u0627\\u0633\\u062a\\u0627\\u0646","DBC_ADVANCED_SEARCH":"\\u062c\\u0633\\u062a \\u0648 \\u062c\\u0648\\u06cc \\u067e\\u06cc\\u0634\\u0631\\u0641\\u062a\\u0647","DBC_RECENT_PROPERTIES":"\\u062e\\u0648\\u0627\\u0635 \\u06a9\\u0646\\u0646\\u062f\\u06af\\u0627\\u0646","DBC_AGENTS":null,"DBC_NO_ESTATES_FOUND":"\\u0628\\u062f\\u0648\\u0646 \\u0634\\u0647\\u0631\\u06a9\\u0647\\u0627\\u06cc \\u06cc\\u0627\\u0641\\u062a","DBC_HOME":null,"DBC_ABOUT":null,"DBC_CONTACT":"\\u062a\\u0645\\u0627\\u0633","DBC_PLAIN_SEARCH":"\\u062f\\u0634\\u062a \\u062c\\u0633\\u062a\\u062c\\u0648","DBC_IGNORE_THIS_SECTION":"\\u0646\\u0627\\u062f\\u06cc\\u062f\\u0647 \\u06af\\u0631\\u0641\\u062a\\u0646 \\u0627\\u06cc\\u0646 \\u0628\\u062e\\u0634","DBC_LOCATION_SEARCH":"\\u062c\\u0633\\u062a\\u062c\\u0648 \\u062f\\u0631 \\u067e\\u0633\\u062a \\u0647\\u0627","DBC_COUNTRY":"\\u06a9\\u0634\\u0648\\u0631","DBC_STATE_PROVINCE":"\\u0627\\u0633\\u062a\\u0627\\u0646 \\/ \\u0627\\u0633\\u062a\\u0627\\u0646","DBC_CITY":null,"DBC_PRICE":"\\u0642\\u06cc\\u0645\\u062a","DBC_BEDROOM":"\\u0627\\u062a\\u0627\\u0642 \\u062e\\u0648\\u0627\\u0628","DBC_BATHROOM":"\\u062d\\u0645\\u0627\\u0645 \\u0648 \\u0633\\u0631\\u0648\\u06cc\\u0633 \\u0628\\u0647\\u062f\\u0627\\u0634\\u062a\\u06cc","DBC_YEAR_BUILT":"\\u0633\\u0627\\u0644 \\u0633\\u0627\\u062e\\u062a","DBC_PHONE":"\\u062a\\u0644\\u0641\\u0646","DBC_FIRST_NAME":"\\u0646\\u0627\\u0645","DBC_LAST_NAME":"\\u0646\\u0627\\u0645 \\u062e\\u0627\\u0646\\u0648\\u0627\\u062f\\u06af\\u06cc","DBC_COMPANY_NAME":"\\u0646\\u0627\\u0645 \\u0634\\u0631\\u06a9\\u062a","DBC_REGISTER":"\\u062b\\u0628\\u0627\\u062a","DBC_TYPE":"\\u0646\\u0648\\u0639","DBC_AREA":"\\u0645\\u0646\\u0637\\u0642\\u0647","DBC_DETAILS":null,"DBC_VIEW_ALL":"\\u0645\\u0634\\u0627\\u0647\\u062f\\u0647 \\u0647\\u0645\\u0647","DBC_FEATURED_PROPERTIES":"\\u062e\\u0648\\u0627\\u0635 \\u0648\\u06cc\\u0698\\u0647","DBC_ORDER_BY":"\\u062a\\u0631\\u062a\\u06cc\\u0628","DBC_NONE":"\\u0647\\u06cc\\u0686 \\u06cc\\u06a9","DBC_TNC":"\\u0634\\u0631\\u0627\\u06cc\\u0637 \\u0648 Confition","DBC_REG_SUCCESS":"\\u062b\\u0628\\u062a \\u0646\\u0627\\u0645 \\u062d\\u0633\\u0627\\u0628 \\u06a9\\u0627\\u0631\\u0628\\u0631\\u06cc \\u0634\\u0645\\u0627 \\u0645\\u0648\\u0641\\u0642 \\u0627\\u0633\\u062a . ","DBC_LIMIT":"\\u062d\\u062f","DBC_USAGE":"\\u0627\\u0633\\u062a\\u0641\\u0627\\u062f\\u0647","DBC_RECOVER":"\\u0628\\u0647\\u0628\\u0648\\u062f \\u06cc\\u0627\\u0641\\u062a\\u0646","DBC_OOPS":"\\u0627\\u0648\\u0647\\u060c \\u0635\\u0641\\u062d\\u0647 \\u06cc\\u0627\\u0641\\u062a \\u0646\\u0634\\u062f","DBC_SHARE_THIS":"\\u0628\\u0647 \\u0627\\u0634\\u062a\\u0631\\u0627\\u06a9 \\u06af\\u0630\\u0627\\u0634\\u062a\\u0646 \\u0627\\u06cc\\u0646","DBC_BATH":"\\u0627\\u0633\\u062a\\u062e\\u0631 \\u0634\\u0646\\u0627\\u06cc \\u0633\\u0631\\u067e\\u0648\\u0634\\u06cc\\u062f\\u0647","DBC_STATUS":"\\u0648\\u0636\\u0639\\u06cc\\u062a","DBC_DESCRIPTION":null,"DBC_GA":"\\u0627\\u0645\\u06a9\\u0627\\u0646\\u0627\\u062a \\u0639\\u0645\\u0648\\u0645\\u06cc","DBC_LOCATION_MAP":"\\u0646\\u0642\\u0634\\u0647 \\u0645\\u062d\\u0644 \\u0633\\u06a9\\u0648\\u0646\\u062a","DBC_IMAGE_GALLERY":"\\u06af\\u0627\\u0644\\u0631\\u06cc \\u0639\\u06a9\\u0633","DBC_SUMMARY":"\\u062e\\u0644\\u0627\\u0635\\u0647","DBC_OVERVIEW":"\\u0647\\u0641\\u062a\\u06af\\u06cc","DBC_ADDRESS":"\\u0646\\u0634\\u0627\\u0646\\u06cc","DBC_AGENT":"\\u0639\\u0627\\u0645\\u0644","DBC_MESSAGE":"\\u067e\\u06cc\\u0627\\u0645","DBC_USER_NAME":"\\u0646\\u0627\\u0645 \\u06a9\\u0627\\u0631\\u0628\\u0631\\u06cc","DBC_ABOUT_ME":"\\u062f\\u0631\\u0628\\u0627\\u0631\\u0647 \\u0645\\u0646","DBC_PER_MONTH":"\\u0647\\u0631 \\u0645\\u0627\\u0647","DBC_PER_QUARTER":"\\u062f\\u0631 \\u0637\\u0648\\u0644 \\u0633\\u0647 \\u0645\\u0627\\u0647\\u0647","DBC_PER_YEAR":"\\u062f\\u0631 \\u0637\\u0648\\u0644 \\u0633\\u0627\\u0644","DBC_TYPE_CONDO":"\\u0645\\u062d\\u0644 \\u0633\\u06a9\\u0648\\u0646\\u062a","DBC_TYPE_VILLA":"\\u0648\\u06cc\\u0644\\u0627","DBC_TYPE_FILTERS":"\\u0646\\u0648\\u0639 \\u0641\\u06cc\\u0644\\u062a\\u0631\\u0647\\u0627","DBC_PURPOSE_FILTERS":"\\u0641\\u06cc\\u0644\\u062a\\u0631\\u0647\\u0627 \\u0647\\u062f\\u0641","DBC_EMAIL_SUBJECT":"\\u0639\\u0646\\u0648\\u0627\\u0646 \\u0627\\u06cc\\u0645\\u06cc\\u0644","DBC_ALL":"\\u0647\\u0645\\u0647","DBC_DELETED":null,"DBC_AGENT_PROPERTIES":"\\u0646\\u0645\\u0627\\u06cc\\u0646\\u062f\\u06af\\u06cc \\u062e\\u0648\\u0627\\u0635","DBC_ALL_AGENTS":"\\u0647\\u0645\\u0647 \\u0646\\u0645\\u0627\\u06cc\\u0646\\u062f\\u06af\\u06cc\\u0647\\u0627","DBC_CONTACT_US":"\\u062a\\u0645\\u0627\\u0633 \\u0628\\u0627 \\u0645\\u0627","DBC_ACTIVE":null,"DBC_RADIUS":"\\u0634\\u0639\\u0627\\u0639","DBC_VIDEO_EMBED":"\\u0648\\u06cc\\u0698\\u0647 \\u0648\\u06cc\\u062f\\u0626\\u0648","DBC_PROPERTIES":null,"DBC_EMBED_VIDEO_URL":"Embeded \\u0648\\u06cc\\u062f\\u0626\\u0648 \\u0622\\u062f\\u0631\\u0633","DBC_PENDING":"\\u062f\\u0631 \\u0627\\u0646\\u062a\\u0638\\u0627\\u0631","DBC_PROFILE_PHOTO":"\\u0645\\u0634\\u062e\\u0635\\u0627\\u062a \\u0639\\u06a9\\u0633","DBC_TOP_PROPERTIES":"\\u062e\\u0648\\u0627\\u0635 \\u0628\\u0627\\u0644\\u0627","DBC_PROPERTY":"\\u062e\\u0627\\u0635\\u06cc\\u062a"}', 1),
(12, 'Portuguese-pt-br', 'Portuguese', 'pt', '{"DBC_PURPOSE_SALE":"venda","DBC_PURPOSE_RENT":null,"DBC_PURPOSE_BOTH":"Sale & Rent","DBC_TYPE_APARTMENT":"apartamento","DBC_TYPE_HOUSE":null,"DBC_TYPE_LAND":null,"DBC_TYPE_COMSPACE":"espa\\u00e7o comercial","DBC_CONDITION_NEW":"novo","DBC_CONDITION_SOLD":null,"DBC_CONDITION_AVAILABLE":"dispon\\u00edvel","DBC_CONDITION_AUCTION":"leil\\u00e3o","DBC_SIGN_IN":"assinar em","DBC_SIGN_UP":"inscrever-se","DBC_AGENT_PANEL":"Painel Agent","DBC_ADMIN_PANEL":"Painel de Administra\\u00e7\\u00e3o","DBC_LOGOUT":"Sair","DBC_FIND_YOUR_PLACE":"Encontre seu lugar","DBC_SEARCH_TEXT":"Procure Endere\\u00e7o , Bairro, Cidade ou Estado","DBC_ADVANCED_SEARCH":"Pesquisa Avan\\u00e7ada","DBC_RECENT_PROPERTIES":"Propriedades recentes","DBC_AGENTS":null,"DBC_NO_ESTATES_FOUND":"N\\u00e3o Estates encontrados","DBC_HOME":null,"DBC_ABOUT":null,"DBC_CONTACT":"contato","DBC_PLAIN_SEARCH":"Pesquisa Plain","DBC_IGNORE_THIS_SECTION":"Ignorar esta se\\u00e7\\u00e3o","DBC_LOCATION_SEARCH":"Localiza\\u00e7\\u00e3o Procurar","DBC_COUNTRY":"pa\\u00eds","DBC_STATE_PROVINCE":"Estado \\/ Provice","DBC_CITY":null,"DBC_PRICE":"pre\\u00e7o","DBC_BEDROOM":"quartos","DBC_BATHROOM":"Banheiros","DBC_YEAR_BUILT":"Ano de constru\\u00e7\\u00e3o","DBC_PHONE":"telefone","DBC_FIRST_NAME":"primeiro nome","DBC_LAST_NAME":"sobrenome","DBC_COMPANY_NAME":"nome da empresa","DBC_REGISTER":"registrar","DBC_TYPE":"tipo","DBC_AREA":"\\u00e1rea","DBC_DETAILS":null,"DBC_VIEW_ALL":"Veja todos","DBC_FEATURED_PROPERTIES":"Propriedades em destaque","DBC_ORDER_BY":"Ordenar por","DBC_NONE":"nenhum","DBC_TNC":"Termos e Confition","DBC_REG_SUCCESS":"O seu registo conta \\u00e9 bem sucedido. ","DBC_LIMIT":"limite","DBC_USAGE":"uso","DBC_RECOVER":"recuperar","DBC_OOPS":"Opa, p\\u00e1gina n\\u00e3o encontrada","DBC_SHARE_THIS":"Partilhar","DBC_BATH":"Banhos","DBC_STATUS":"estado","DBC_DESCRIPTION":null,"DBC_GA":"Servi\\u00e7os gerais","DBC_LOCATION_MAP":"Mapa de localiza\\u00e7\\u00e3o","DBC_IMAGE_GALLERY":"Galeria de Imagens","DBC_SUMMARY":"resumo","DBC_OVERVIEW":"vis\\u00e3o global","DBC_ADDRESS":"endere\\u00e7o","DBC_AGENT":"agente","DBC_MESSAGE":"mensagem","DBC_USER_NAME":"Nome de Usu\\u00e1rio","DBC_ABOUT_ME":"sobre mim","DBC_PER_MONTH":"Por M\\u00eas","DBC_PER_QUARTER":"por trimestre","DBC_PER_YEAR":"Por Ano","DBC_TYPE_CONDO":"Condom\\u00ednio","DBC_TYPE_VILLA":"vila","DBC_TYPE_FILTERS":"Tipo de Filtros","DBC_PURPOSE_FILTERS":"Filtros de Prop\\u00f3sito","DBC_EMAIL_SUBJECT":"E-mail Assunto","DBC_ALL":"tudo","DBC_DELETED":null,"DBC_AGENT_PROPERTIES":"Propriedades Agentes","DBC_ALL_AGENTS":"Todos os Agentes","DBC_CONTACT_US":"entre em contato conosco","DBC_ACTIVE":null,"DBC_RADIUS":"raio","DBC_VIDEO_EMBED":"V\\u00eddeo em Destaque","DBC_PROPERTIES":null,"DBC_EMBED_VIDEO_URL":"Embeded Video Url","DBC_PENDING":"pendente","DBC_PROFILE_PHOTO":"Foto de Perfil","DBC_TOP_PROPERTIES":"Principais Propriedades","DBC_PROPERTY":"propriedade","lkjqh":"ljn"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixlocations`
--

DROP TABLE IF EXISTS `db_tabprefixlocations`;
CREATE TABLE IF NOT EXISTS `db_tabprefixlocations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `name` char(200) NOT NULL,
  `type` char(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `db_tabprefixlocations`
--

INSERT INTO `db_tabprefixlocations` (`id`, `parent`, `name`, `type`, `status`) VALUES
(1, 0, 'USA', 'country', 1),
(2, 0, ' Canada', 'country', 1),
(3, 0, ' UK', 'country', 1),
(4, 0, ' Mexico', 'country', 1),
(5, 1, 'Alabama', 'state', 1),
(6, 1, ' Alaska', 'state', 1),
(7, 1, ' Arizona', 'state', 1),
(8, 1, ' Arkansas', 'state', 1),
(9, 1, ' California', 'state', 1),
(10, 1, ' Colorado', 'state', 1),
(11, 1, ' Connecticut', 'state', 1),
(12, 1, ' Delaware', 'state', 1),
(13, 1, ' Florida', 'state', 1),
(14, 1, ' Georgia', 'state', 1),
(15, 1, ' Hawaii', 'state', 1),
(16, 1, ' Idaho', 'state', 1),
(17, 1, ' Illinois', 'state', 1),
(18, 1, ' Indiana', 'state', 1),
(19, 1, ' Iowa', 'state', 1),
(20, 1, ' Kansas', 'state', 1),
(21, 1, ' Kentucky', 'state', 1),
(22, 1, ' Louisiana', 'state', 1),
(23, 1, ' Maine', 'state', 1),
(24, 1, ' Maryland', 'state', 1),
(25, 1, ' Massachusetts', 'state', 1),
(26, 1, ' Michigan', 'state', 1),
(27, 1, ' Minnesota', 'state', 1),
(28, 1, ' Mississippi', 'state', 1),
(29, 1, ' Missouri', 'state', 1),
(30, 1, ' Montana', 'state', 1),
(31, 1, ' Nebraska', 'state', 1),
(32, 1, ' Nevada', 'state', 1),
(33, 1, ' New Hampshire', 'state', 1),
(34, 1, ' New Jersey', 'state', 1),
(35, 1, ' New Mexico', 'state', 1),
(36, 1, ' New York', 'state', 1),
(37, 1, ' North Carolina', 'state', 1),
(38, 1, ' North Dakota', 'state', 1),
(39, 1, ' Ohio', 'state', 1),
(40, 1, ' Oklahoma', 'state', 1),
(41, 1, ' Oregon', 'state', 1),
(42, 1, ' Pennsylvania', 'state', 1),
(43, 1, ' Rhode Island', 'state', 1),
(44, 1, ' South Carolina', 'state', 1),
(45, 1, ' South Dakota', 'state', 1),
(46, 1, ' Tennessee', 'state', 1),
(47, 1, ' Texas', 'state', 1),
(48, 1, ' Utah', 'state', 1),
(49, 1, ' Vermont', 'state', 1),
(50, 1, ' Virginia', 'state', 1),
(51, 1, ' Washington', 'state', 1),
(52, 1, ' West Virginia', 'state', 1),
(53, 1, ' Wisconsin', 'state', 1),
(54, 1, ' Wyoming', 'state', 1),
(55, 2, 'Alberta', 'state', 1),
(56, 2, ' British Columbia', 'state', 1),
(57, 2, ' Manitoba', 'state', 1),
(58, 2, ' New Brunswick', 'state', 1),
(59, 2, ' Newfoundland', 'state', 1),
(60, 2, ' Northwest Territories', 'state', 1),
(61, 2, ' Nova Scotia', 'state', 1),
(62, 2, ' Nunavut', 'state', 1),
(63, 2, ' Ontario', 'state', 1),
(64, 2, ' Prince Edward Island', 'state', 1),
(65, 2, ' Quebec', 'state', 1),
(66, 2, ' Saskatchewan', 'state', 1),
(67, 2, ' Yukon', 'state', 1),
(68, 9, 'Los Angeles', 'city', 1),
(69, 9, 'San Diego', 'city', 1),
(70, 9, 'Palm Sprigs', 'city', 1),
(71, 9, 'San Francisco', 'city', 1),
(72, 9, 'Long Beach', 'city', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixmedia`
--

DROP TABLE IF EXISTS `db_tabprefixmedia`;
CREATE TABLE IF NOT EXISTS `db_tabprefixmedia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `media_name` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `media_url` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `created_by` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixoptions`
--

DROP TABLE IF EXISTS `db_tabprefixoptions`;
CREATE TABLE IF NOT EXISTS `db_tabprefixoptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` char(255) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `db_tabprefixoptions`
--

INSERT INTO `db_tabprefixoptions` (`id`, `key`, `values`, `status`) VALUES
(1, 'paypal', '{"item_name":"Bookit Service Booking","email":"shimulcsedu@gmail.com","currency":"USD","sandbox":"On"}', 1),
(2, 'site_settings', '{"site_title":"Realcon","footer_text":"Realcon 2014, all rights reserved","site_logo":"","site_lang":"en","site_direction":"ltr","site_direction_rules":"required","per_page":"10","default_layout":"1","meta_description":"Post Real Estates","key_words":"real estate, property, map","crawl_after":"3"}', 1),
(3, 'active_theme', 'default', 1),
(4, 'positions', '[{"name":"content_top","status":1,"widgets":false},{"name":"content_bottom","status":1,"widgets":false},{"name":"right_bar_home","status":1,"widgets":["all_types","all_purposes","top_agents","featured_properties"]},{"name":"right_bar","status":1,"widgets":false},{"name":"right_bar_post_detail","status":1,"widgets":false},{"name":"footer_first_column","status":1,"widgets":["contact_text"]},{"name":"footer_second_column","status":1,"widgets":["follow_us"]},{"name":"footer_third_column","status":1,"widgets":["shot_description"]},{"name":"right_bar_all_agents","status":1,"widgets":["top_agents","top_properties","featured_properties"]},{"name":"right_bar_agent_properties","status":1,"widgets":["all_types","all_purposes","top_agents","top_properties"]},{"name":"right_bar_general","status":1,"widgets":["all_types","all_purposes","top_agents","top_properties"]}]', 1),
(5, 'top_menu', '[{"id":"1","parent":0},{"id":"6","parent":0},{"id":"2","parent":0},{"id":"3","parent":0},{"id":"4","parent":0}]', 1),
(6, 'wordfilters', '{"bitch":"b***h","fuck":"f**k"}', 1),
(7, 'memento_settings', '{"publish_directly":"Yes","publish_directl_rules":"required","do_water_mark":"Yes","do_water_mark_rules":"required","water_mark_text":"@dbc","water_mark_text_rules":"required","enable_fb_login":"Yes","enable_fb_login_rules":"required","fb_app_id":"462520657185800","fb_app_id_rules":"required","fb_secret_key":"320d2893c6d89e135418d14cb510d89f","fb_secret_key_rules":"required","enable_gplus_login":"Yes","enable_gplus_login_rules":"required","gplus_app_id":"107878798713-inf6f7gfik9br4nc6iun54eccb8h7oqo.apps.googleusercontent.com","gplus_app_id_rules":"required","gplus_secret_key":"RgFEewdswHgjNb3zyODNWcz1","gplus_secret_key_rules":"required"}', 1),
(8, 'purchase_key', '', 1),
(9, 'item_id', '', 1),
(10, 'realestate_settings', '{"publish_directly":"Yes","publish_directly_rules":"required","system_currency":"USD","system_currency_type":"0","system_currency_rules":"required","enable_signup":"Yes","enable_signup_rules":"required","enable_pricing":"Yes","enable_pricing_rules":"required"}', 1),
(11, 'paypal_settings', '{"enable_sandbox_mode":"Yes","enable_sandbox_mode_rules":"required","item_name":"Realestate Agent Package","item_name_rules":"required","email":"seller@paypalsandbox.com","email_rules":"required","currency":"USD","currency_rules":"required","finish_url":"account\\/finish_url","finish_url_rules":"required","cancel_url":"account\\/cancel_url","cancel_url_rules":"required"}', 1),
(12, 'banner_settings', '{"menu_bg_color":"rgba(48,46,44,0.86)","menu_text_color":"#ffffff","banner_type":"Slider","slider_speed":"3000","sliders":"[\\"1729728797_30e74542e9_o1.jpg\\",\\"beautiful_house-wallpaper-1920x1440-1920x664.jpg\\",\\"View-over-the-lake_www.LuxuryWallpapers_.net_-1920x664_.jpg\\"]","search_box_position":"ontop","search_bg":"vacation_house_interior-wallpaper-1920x1200-1920x664.jpg","map_latitude":"34.0204989","map_longitude":"-118.4117325","map_zoom":"8"}', 1),
(13, 'webadmin_email', '{"contact_email":"shimulcsedu@gmail.com","webadmin_name":"Webadmin","webadmin_email":"support@asanmelk.ir"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixpackages`
--

DROP TABLE IF EXISTS `db_tabprefixpackages`;
CREATE TABLE IF NOT EXISTS `db_tabprefixpackages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `max_post` int(11) NOT NULL,
  `expiration_time` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `db_tabprefixpackages`
--

INSERT INTO `db_tabprefixpackages` (`id`, `title`, `description`, `price`, `max_post`, `expiration_time`, `status`) VALUES
(1, 'Basic', 'Sample Package Description...', '5.00', 10, 30, 1),
(2, 'Normal', '', '10.00', 10, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixpages`
--

DROP TABLE IF EXISTS `db_tabprefixpages`;
CREATE TABLE IF NOT EXISTS `db_tabprefixpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` char(50) NOT NULL,
  `show_in_menu` int(1) NOT NULL DEFAULT '1',
  `layout` int(1) NOT NULL,
  `content_from` char(10) NOT NULL DEFAULT 'Manual',
  `title` text NOT NULL,
  `url` char(150) NOT NULL,
  `content` text NOT NULL,
  `sidebar` text NOT NULL,
  `seo_settings` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `parent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `db_tabprefixpages`
--

INSERT INTO `db_tabprefixpages` (`id`, `alias`, `show_in_menu`, `layout`, `content_from`, `title`, `url`, `content`, `sidebar`, `seo_settings`, `create_time`, `status`, `editable`, `parent`) VALUES
(1, 'dbc_home', 1, 1, 'Url', '[DBC_HOME]', '', '<p>hello</p>', '', '{"meta_description":"test meta lorem ispum","key_words":"meme,gag,fufu","crawl_after":"3"}', '2013-12-20 13:46:23', 1, 0, 0),
(2, 'dbc_search', 1, 1, 'Url', '[DBC_ADVANCED_SEARCH]', 'show/search', '<p>ispum</p>', '<p>lorem</p>', '', '2013-12-20 13:46:41', 1, 0, 0),
(3, 'dbc_about', 1, 1, 'Manual', '[DBC_ABOUT]', '', '<p>sit amet</p>', '<p>doller</p>', '', '2013-12-20 13:47:00', 1, 0, 0),
(4, 'dbc_contact', 1, 1, 'Url', '[DBC_CONTACT]', 'show/contact', '', '', '{"meta_description":"contact us page for memento, this meta will be read by search engine","key_words":"fun, contact, gag","crawl_after":"3"}', '2014-06-23 15:42:26', 1, 1, 0),
(5, 'dbc_advanced_search', 1, 0, 'Url', '[DBC_ADVANCED_SEARCH]', '', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-07-20 09:01:25', 0, 1, 0),
(6, 'dbc_agents', 1, 0, 'Url', '[DBC_AGENTS]', 'show/agent', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-07-21 14:52:04', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixplugins`
--

DROP TABLE IF EXISTS `db_tabprefixplugins`;
CREATE TABLE IF NOT EXISTS `db_tabprefixplugins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixposts`
--

DROP TABLE IF EXISTS `db_tabprefixposts`;
CREATE TABLE IF NOT EXISTS `db_tabprefixposts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) NOT NULL,
  `type` char(50) NOT NULL,
  `purpose` char(50) NOT NULL,
  `estate_condition` char(50) NOT NULL DEFAULT 'db_tabprefixCONDITION_NEW',
  `home_size` decimal(10,2) NOT NULL,
  `home_size_unit` char(10) NOT NULL,
  `lot_size` decimal(10,2) NOT NULL,
  `lot_size_unit` char(20) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `price_per_unit` decimal(10,2) NOT NULL,
  `price_unit` char(20) NOT NULL,
  `rent_price` decimal(10,2) NOT NULL,
  `rent_price_unit` char(20) NOT NULL,
  `bedroom` int(3) NOT NULL,
  `bath` int(3) NOT NULL,
  `year_built` int(4) NOT NULL,
  `address` text NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `zip_code` char(15) NOT NULL,
  `latitude` char(20) NOT NULL,
  `longitude` char(20) NOT NULL,
  `featured_img` char(255) NOT NULL,
  `gallery` text NOT NULL,
  `facilities` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `publish_time` date NOT NULL,
  `status` int(1) NOT NULL,
  `featured` int(1) NOT NULL DEFAULT '0',
  `report` int(11) NOT NULL DEFAULT '0',
  `total_view` int(10) NOT NULL DEFAULT '0',
  `search_meta` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `db_tabprefixposts`
--

INSERT INTO `db_tabprefixposts` (`id`, `unique_id`, `type`, `purpose`, `estate_condition`, `home_size`, `home_size_unit`, `lot_size`, `lot_size_unit`, `total_price`, `price_per_unit`, `price_unit`, `rent_price`, `rent_price_unit`, `bedroom`, `bath`, `year_built`, `address`, `country`, `state`, `city`, `zip_code`, `latitude`, `longitude`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`) VALUES
(1, '53cbb2beb91dd', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_NEW', '5000.00', 'sqft', '0.00', '', '25000.00', '3200.00', 'sqmeter', '0.00', '', 5, 3, 2010, '1172 N Ardmore Ave', 1, 9, 68, '90029', '34.092647', '-118.30099100000001', '6078140610_dd8cd63132.jpg', '', 'false', 1, 0, '0000-00-00', 1, 1, 0, 13, 'sale apartment  bedroom bathroom5 3 2010 DBC_CONDITION_NEW 1172 N Ardmore Ave 1  California Los Angeles Bay View Apartment Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>'),
(2, '53cc05e63f12d', 'DBC_TYPE_HOUSE', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '4567.00', 'sqft', '6000.00', 'acre', '60000.00', '2345.00', 'sqft', '0.00', '', 7, 6, 1990, '6321 Maryland Dr', 1, 9, 68, '90048', '34.067276', '-118.365499', '9546219872_1bd24d699b.jpg', '', '["1","2","3","4","6","7","9","10","12","13"]', 1, 0, '0000-00-00', 1, 0, 0, 0, 'sale house  bedroom bathroom7 6 1990 DBC_CONDITION_AVAILABLE 6321 Maryland Dr 1  California Los Angeles Sweet Home Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>'),
(3, '53cc07d8935ac', 'DBC_TYPE_CONDO', 'DBC_PURPOSE_RENT', 'DBC_CONDITION_AVAILABLE', '234.00', 'sqft', '0.00', '', '20000.00', '0.00', '', '20000.00', 'DBC_PER_MONTH', 4, 3, 0, '5305 Appleton St', 1, 9, 69, '92117', '32.8366535', '-117.17725740000003', '3644244673_b1f74c3b02.jpg', '[""]', '["1","2","3","4","7","8","9","10","11","13"]', 1, 0, '0000-00-00', 1, 1, 0, 0, 'sale condo  bedroom bathroom4 3 0 DBC_CONDITION_AVAILABLE 5305 Appleton St 1  California San Diego Beautiful Condo Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>'),
(4, '53cc08c8ad9ef', 'DBC_TYPE_VILLA', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '0.00', '', '0.00', '', '200000.00', '5000.00', 'sqft', '0.00', '', 0, 0, 0, '1055 E Deepwell Rd', 1, 9, 70, '92264', '33.803318', '-116.53529500000002', '5420936332_6efd8e22b0.jpg', '', '["1","2","3","6","7","9","10","13"]', 1, 0, '0000-00-00', 1, 1, 0, 0, 'sale  DBC_CONDITION_AVAILABLE 1055 E Deepwell Rd 1  California Palm Sprigs Casa Amogo Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>'),
(5, '53cc0b9a1d086', 'DBC_TYPE_COMSPACE', 'DBC_PURPOSE_RENT', 'DBC_CONDITION_AVAILABLE', '40000.00', 'sqft', '0.00', '', '3400.00', '0.00', '', '3400.00', 'DBC_PER_MONTH', 0, 0, 1980, '152 Lombard St Apt 601', 1, 9, 71, '94111', '37.80445', '-122.404178', '3589652595_115056110c.jpg', '[""]', '["1","4","8","9","13"]', 1, 0, '0000-00-00', 1, 0, 0, 0, 'sale comercial space  1980 DBC_CONDITION_AVAILABLE 152 Lombard St Apt 601 1  California San Francisco Office Suit Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>'),
(6, '53cc0cdfae1fa', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_NEW', '24242.00', 'sqft', '0.00', '', '30000.00', '455.00', 'sqft', '0.00', '', 4, 2, 2005, '6 36th Pl', 1, 9, 72, '90803', '33.760383', '-118.15030000000002', '6962526123_6a30393576.jpg', '["4840262155_aa1fc6b90a_b.jpg","2996437818_3d9bc37293.jpg","2534095988_a4713e2a521.jpg","4427351723_c93cc51063_b.jpg"]', '["1","3","4","7","8","9","13"]', 1, 0, '0000-00-00', 1, 0, 0, 6, 'sale apartment  bedroom bathroom4 2 2005 DBC_CONDITION_NEW 6 36th Pl 1  California Long Beach Beach View Apartment Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>'),
(7, '53cd3e6ba684f', 'DBC_TYPE_APARTMENT', 'DBC_PURPOSE_SALE', 'DBC_CONDITION_AVAILABLE', '2323.00', 'sqft', '0.00', '', '34000.00', '2000.00', 'sqft', '0.00', '', 5, 2, 2000, '712 W Columbia St', 1, 9, 72, '90806', '33.808646', '-118.20068500000002', '4944285729_bfb91833eb.jpg', '[""]', '["1","3","4","5","8","9","11","13"]', 1, 0, '0000-00-00', 1, 0, 0, 0, 'sale apartment  bedroom bathroom5 2 2000 DBC_CONDITION_AVAILABLE 712 W Columbia St 1  California Long Beach Simple Apartment Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>');

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixpost_meta`
--

DROP TABLE IF EXISTS `db_tabprefixpost_meta`;
CREATE TABLE IF NOT EXISTS `db_tabprefixpost_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `key` char(50) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `db_tabprefixpost_meta`
--

INSERT INTO `db_tabprefixpost_meta` (`id`, `post_id`, `key`, `value`, `status`) VALUES
(1, 1, 'title', '{"en":"Bay View Apartment"}', 1),
(2, 1, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus.Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(3, 2, 'title', '{"en":"Sweet Home"}', 1),
(4, 2, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus.Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(5, 3, 'title', '{"en":"Beautiful Condo"}', 1),
(6, 3, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus.Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(7, 4, 'title', '{"en":"Casa Amogo"}', 1),
(8, 4, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus.Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(9, 5, 'title', '{"en":"Office Suit"}', 1),
(10, 5, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus.Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(11, 6, 'title', '{"en":"Beach View Apartment"}', 1),
(12, 6, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus.\\u00a0Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(13, 6, 'video_url', 'http://www.youtube.com/watch?v=ziR6yYtOFw0', 1),
(14, 3, 'video_url', 'n/a', 1),
(15, 5, 'video_url', 'n/a', 1),
(16, 7, 'title', '{"en":"Simple Apartment","es":"","nl":"","ru":""}', 1),
(17, 7, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus.Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>","es":"","nl":"","ru":""}', 1),
(18, 7, 'video_url', 'https://www.youtube.com/watch?v=AS4L0Uy023k', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixsessions`
--

DROP TABLE IF EXISTS `db_tabprefixsessions`;
CREATE TABLE IF NOT EXISTS `db_tabprefixsessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixusers`
--

DROP TABLE IF EXISTS `db_tabprefixusers`;
CREATE TABLE IF NOT EXISTS `db_tabprefixusers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` int(3) NOT NULL,
  `first_name` char(40) NOT NULL DEFAULT '',
  `last_name` char(40) NOT NULL DEFAULT '',
  `gender` char(10) NOT NULL DEFAULT '',
  `profile_photo` char(200) NOT NULL DEFAULT '',
  `user_name` char(100) NOT NULL,
  `user_email` char(100) NOT NULL,
  `password` char(255) NOT NULL,
  `remember_me_key` char(255) NOT NULL DEFAULT '',
  `recovery_key` char(255) NOT NULL DEFAULT '',
  `confirmation_key` char(30) NOT NULL DEFAULT '',
  `confirmed` int(1) NOT NULL DEFAULT '1',
  `confirmed_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL DEFAULT '0',
  `banned` int(11) NOT NULL DEFAULT '0',
  `banned_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `banned_till` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `db_tabprefixusers`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixusertype`
--

DROP TABLE IF EXISTS `db_tabprefixusertype`;
CREATE TABLE IF NOT EXISTS `db_tabprefixusertype` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `db_tabprefixusertype`
--

INSERT INTO `db_tabprefixusertype` (`id`, `name`, `status`) VALUES
(1, 'admin', 1),
(2, 'agent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixuser_meta`
--

DROP TABLE IF EXISTS `db_tabprefixuser_meta`;
CREATE TABLE IF NOT EXISTS `db_tabprefixuser_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` char(30) NOT NULL,
  `value` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;


-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixuser_package`
--

DROP TABLE IF EXISTS `db_tabprefixuser_package`;
CREATE TABLE IF NOT EXISTS `db_tabprefixuser_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `request_date` date NOT NULL,
  `activation_date` date NOT NULL,
  `expirtion_date` date NOT NULL,
  `is_active` int(1) NOT NULL COMMENT '0=no,2=pending,1=active',
  `status` int(1) NOT NULL COMMENT '0=deleted,1=active',
  `payment_medium` char(20) NOT NULL DEFAULT 'paypal',
  `response_log` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `db_tabprefixuser_package`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixwidgets`
--

DROP TABLE IF EXISTS `db_tabprefixwidgets`;
CREATE TABLE IF NOT EXISTS `db_tabprefixwidgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `alias` char(23) NOT NULL,
  `params` text NOT NULL,
  `status` int(1) NOT NULL,
  `editable` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `db_tabprefixwidgets`
--

INSERT INTO `db_tabprefixwidgets` (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES
(1, 'All types', 'all_types', '', 1, 1),
(2, 'All purposes', 'all_purposes', '', 1, 1),
(3, 'Top Agents', 'top_agents', '', 1, 1),
(4, 'Featured properties', 'featured_properties', '', 1, 1),
(5, 'Top properties', 'top_properties', '', 1, 1),
(6, 'Language selector', 'language_selector', '', 1, 1),
(7, 'Facebook like box', 'fb_likebox', '', 1, 1),
(8, 'Contact text', 'contact_text', '', 1, 1),
(9, 'Follow us', 'follow_us', '', 1, 1),
(10, 'Short Description', 'shot_description', '', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
