-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2018 at 10:09 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b2bharat_b2bharatdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `type` enum('buyer','seller','both') NOT NULL DEFAULT 'buyer',
  `country` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `legal_owner_name` varchar(255) DEFAULT NULL,
  `business_type` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT '0',
  `fax` varchar(20) DEFAULT '0',
  `mobile` varchar(255) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `gplus` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `gst_no` varchar(255) DEFAULT NULL,
  `pan_no` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) DEFAULT NULL,
  `reg_auth` varchar(255) DEFAULT NULL,
  `cin_no` varchar(255) DEFAULT NULL,
  `tan_no` varchar(255) DEFAULT NULL,
  `service_tax_no` varchar(255) DEFAULT NULL,
  `excise_reg_no` varchar(255) DEFAULT NULL,
  `vat_no` varchar(255) DEFAULT NULL,
  `dgft_no` varchar(255) DEFAULT NULL,
  `cst_no` varchar(255) DEFAULT NULL,
  `ssimsme_no` varchar(255) DEFAULT NULL,
  `epf_no` varchar(255) DEFAULT NULL,
  `esi_no` varchar(255) DEFAULT NULL,
  `sct_no` varchar(255) NOT NULL,
  `dnb_no` varchar(255) DEFAULT NULL,
  `rbi_no` varchar(255) DEFAULT NULL,
  `fssai_liscene_no` varchar(255) DEFAULT NULL,
  `nsic_no` varchar(255) DEFAULT NULL,
  `sst_no` varchar(255) DEFAULT NULL,
  `flickr` varchar(100) DEFAULT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `prod_portfolio` longtext,
  `export_countries` varchar(355) DEFAULT NULL,
  `package_det` longtext,
  `office_size` varchar(100) DEFAULT NULL,
  `start_date` varchar(30) DEFAULT '1970-01-01 12:12:12 AM',
  `emp_count` varchar(10) DEFAULT NULL,
  `ann_revenue` varchar(100) DEFAULT NULL,
  `export_markets` varchar(500) DEFAULT NULL,
  `company_intro` longtext,
  `company_policy` longtext,
  `payment_terms` longtext,
  `qc_policy` longtext,
  `terms_con` longtext,
  `close_keyword` varchar(100) DEFAULT NULL,
  `meta_desc` longtext,
  `main_clients` longtext,
  `registration_date` varchar(30) DEFAULT '1970-01-01 12:12:12 AM',
  `major_product_sell` varchar(255) DEFAULT NULL,
  `major_product_buy` varchar(255) DEFAULT NULL,
  `main_product1` varchar(200) DEFAULT NULL,
  `main_product2` varchar(200) DEFAULT NULL,
  `main_product3` varchar(200) DEFAULT NULL,
  `main_product4` varchar(200) DEFAULT NULL,
  `other_product` longtext,
  `production_capacity` varchar(100) DEFAULT NULL,
  `factory_location` varchar(100) DEFAULT NULL,
  `factory_size` varchar(100) DEFAULT NULL,
  `avg_lead_time` varchar(100) DEFAULT NULL,
  `nearest_port` varchar(100) DEFAULT NULL,
  `compliance` varchar(100) DEFAULT NULL,
  `ex_percentage` varchar(5) DEFAULT NULL,
  `acpt_order` enum('yes','no') NOT NULL DEFAULT 'yes',
  `trade_show` enum('yes','no') NOT NULL DEFAULT 'no',
  `annual_sales` varchar(100) DEFAULT NULL,
  `ap_currency` varchar(250) DEFAULT NULL,
  `ad_terms` varchar(250) DEFAULT NULL,
  `payment_mths` varchar(250) DEFAULT NULL,
  `language` varchar(250) DEFAULT NULL,
  `certification` varchar(250) DEFAULT NULL,
  `buss_group` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `category_title` varchar(100) DEFAULT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'noimage.jpg',
  `avatar` varchar(255) NOT NULL DEFAULT 'noimage.jpg',
  `banner` varchar(255) NOT NULL DEFAULT 'noimage.jpg',
  `permalink` varchar(255) DEFAULT NULL,
  `create_date` varchar(30) DEFAULT '1970-01-01 12:12:12 AM',
  `change_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=227 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `user_id`, `name`, `store_name`, `type`, `country`, `state`, `legal_owner_name`, `business_type`, `phone`, `fax`, `mobile`, `facebook`, `twitter`, `gplus`, `youtube`, `gst_no`, `pan_no`, `reg_no`, `reg_auth`, `cin_no`, `tan_no`, `service_tax_no`, `excise_reg_no`, `vat_no`, `dgft_no`, `cst_no`, `ssimsme_no`, `epf_no`, `esi_no`, `sct_no`, `dnb_no`, `rbi_no`, `fssai_liscene_no`, `nsic_no`, `sst_no`, `flickr`, `street`, `city`, `zip_code`, `website`, `prod_portfolio`, `export_countries`, `package_det`, `office_size`, `start_date`, `emp_count`, `ann_revenue`, `export_markets`, `company_intro`, `company_policy`, `payment_terms`, `qc_policy`, `terms_con`, `close_keyword`, `meta_desc`, `main_clients`, `registration_date`, `major_product_sell`, `major_product_buy`, `main_product1`, `main_product2`, `main_product3`, `main_product4`, `other_product`, `production_capacity`, `factory_location`, `factory_size`, `avg_lead_time`, `nearest_port`, `compliance`, `ex_percentage`, `acpt_order`, `trade_show`, `annual_sales`, `ap_currency`, `ad_terms`, `payment_mths`, `language`, `certification`, `buss_group`, `category`, `category_title`, `logo`, `avatar`, `banner`, `permalink`, `create_date`, `change_date`, `active_status`) VALUES
(226, 420, 'vijay industri', 'vijay indutries', 'seller', '101', '4499', 'Mr. vijay sisodhiya', '110', '8819020386', '8819020386', NULL, '', '', '', '', 'asad', 'dsadsa', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '', '', '', '', '', 'khawara bazar kymore dist.katni (m.p.)', '62', '', 'www.vijaysisodhiya.com', 'fsdsdfsdf', '', 'bags', '', '2018-01-01', '', 'below us$ 1 million', '1,2,3,4,5,6,7,8', 'we vijay indutries Corporate Social. Responsibility. MUST Garment Corp. Ltd. Lenny Fashions Ltd. Lenny Apparels Ltd. Kwun Tong Apparels Ltd. M.R.S. Fashions WLL. Macton Investment Ltd. Must Europe. Must USA Inc. Our Client. List of Categorywise. Introduction. MUST Garment Corp Ltd. Lenny Fashions Ltd. Macton Investment Ltd. kymore ((katni)', 'good policy', 'gfdggsgs', 'anything type it policy', 'gfdggsgs', 'gfggdgreg', 'fggsgsgsgaa', 'america   Russia  japan china', '2018-01-01', 'fgda', 'agsdg', 'fgah', 'hdh', 'dfghe', 'fdr', 'thjsa', 'sdhhdh', 'dshdh', 'sdsadsadhbsaygd sa7df satdf sadf saytdfsaytdfsaytdfsaydtsfa', 'hdsdhh', 'shhrthd', 'safety and security', '2', 'yes', 'yes', 'below us$ 1 million', '1,2,3,4,5,6,7,8', '1,2,4,5,6,7,8,10,11', '1,3,4,7', '1', '1', '51', '1817', '', '420.jpg', '420.jpg', '420.jpg', 'http://newsite.com/company-detail/vijay industri', '2017-12-26 18:37:15', '2018-01-25 10:03:05', 1),
(197, 374, 'Ram Narayan Enterprises', 'Ram Narayan store', 'seller', '101', '4500', 'Mr.Rahul singh', '110', '123456789', '123456789', NULL, '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'Teachers colony ,Jabalpur,india', 'Jabalpur', '411057', 'google.com', 'gfdgfdg', '', '30 kg \r\n30 kg\r\n30 kg', '', '2017-06-13', '', 'below us$ 1 million', '1,5', 'We are manufacturers of variety of Industrial Coatings , Protective Paints, Primers, Intermediates & Thinners etc.\r\nOur Profile- Industrial Paints Manufacturer in Pune\r\nEstablished our business of Industrial Coatings & Paints in the year 1985, we have come a long way from manufacturing general purpose coatings to variety of protective coatings, industrial paints, plastic coatings, industrial resins etc.\r\nWe have been supplying our products not only in Maharashtra but also in major industrial hubs around the country. We specialize in providing consistent quality & customized solutions to our clients depending upon their requirements & application area.\r\nAlso we are one of the few companies manufacturing our own raw materials at our other polymers manufacturing facility ensuring supreme quality, consistency & pricing of the end product.', 'Company policies of Ram nayaran', 'Terms and conditions of Ram nayaran', 'Quality Control policy of Ram nayaran', 'Terms and conditions of Ram nayaran', 'Aluminium Paint\r\nZinc Phosphate Grey/Red Primer HB (As Per IS-12744)\r\nSynthetic Enamels\r\nRed Oxide Z', 'Aluminium Paint\r\nZinc Phosphate Grey/Red Primer HB (As Per IS-12744)\r\nSynthetic Enamels\r\nRed Oxide Zinc Chromate Primer (As Per IS-2074)\r\nMIO Paint High Build Brown/Red\r\nEpoxy Zinc Rich Primer â€“ 90%\r\nEpoxy Zinc Rich Primer Economy\r\nEpoxy Zinc Phosphate Primer Grey/Red\r\nEpoxy White Primer\r\nEpoxy Red Oxide Zinc Chromate Primer\r\nEpoxy MIO Intermediate Paint\r\nEpoxy High Build Finish Paint\r\nEpoxy Enamel Finish Paint\r\nCoaltar Epoxy Black\r\nPolyurethane Primer Aromatic Cured Red/Grey\r\nPolyurethane Matt Finish Paint\r\nPolyurethane Aliphatic Cured H/B Paint\r\nStoving Enamels\r\nBituminous Coatings- Black\r\nAluminium Tube/Extrusion Coating\r\nAcrylic Coatings', 'Tata Moters\r\npiagio\r\nMhindra and Mahindra\r\nBajaj Electricals', '2017-07-13', 'Aluminium Paint (For Seler)', 'Zinc Phosphate Grey (For buyers)', 'Red Primer (Main product)', 'Synthetic Enamels', 'Red Epoxy Zinc Rich Primer', 'Epoxy Zinc Rich Primer', 'Other products  of Ram nayaran', '300 To', 'Indore mp', 'Factory size of Ram nayaran is 100+', '6:30 to 8:', 'Nearest po', 'regularity compliance', '2', 'yes', 'yes', 'below us$ 1 million', '2,4,8', '5,8,11', '1,2,6,7', '1,2,5,9,10,12,13,14', '10', '51', '2315', '', '374.png', '374.jpg', '374.jpg', 'https://b2bharat.com/company-detail/Ram Narayan Enterprises', '2017-07-15 16:34:55', '2018-01-25 10:03:08', 1),
(217, 402, 'Gopal Industrial Enterprisesddddd', 'Gopal Industrial Enterprises', 'seller', '101', '4500', 'Mr.Shekhar Tipale', '111', '8698211118', '', NULL, 'vineet.singhchouhan', '@vineet_chouhansad', 'sasa', '', '21312321', 'dhgasd uabdsagyd sauydg saudg audygsa duysga dusyagd suaygd', '', 'sdfj jsd osdj godhgdgh dogh sdoghsdgoshdgosdhg ogh sdoghsdog', 'osfh sdof sdofs fosa fosfh soih sdofi sdog sdogih sdgohsd go', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'sofj sdoj sof sdgo shdgohsd goshd gosdigh sdoghsdogh sdgoshd', 'asdsada', 'Plot No. J-290, Near Indrayani Nagar, Bhosari, MIDC, Pune, Maharashtra, India', '89', 'sadsadsad', 'www.shreegopalpaint.com', 'santosh bhoale', '', 'Packaging Details \r\n1 liter\r\n4 liter\r\n50 Liter\r\n100 Liter\r\n500 Liter\r\n1000 Liter\r\n10000 Liter', '', '1980-12-02', '', 'below us$ 1 million', '1,2,3,4,5,6,7,8', 'jdhsa diushad ilsabdsiadh saidhb saodu sadasdsadsad', 'db iduhasd siauhd idhu saiduhsa dih disagd sad saidg saodsha dihsa dasda', 'fsdfasdsadsad', 'fsfsafasdsadsa', 'fsdfasdsadsad', 'sdsadsadsadsad', 'dsad', 'Tata Moters\r\nHindalco\r\nAstoria Plaza\r\nMegawide\r\nMegaworld\r\nAmherst Laboratories\r\nEC Structural Composites Inc.\r\nAmerican Plaque Company\r\nPhilexcel Business Park\r\nPrimex\r\nProjexasia\r\nVMS Construction and Plumbing Inc.\r\nHigh Performance Solutions\r\nNoah International Paint Solutions\r\nPBCom\r\nTrans-Phils Corp.\r\nTanika Philippines Corporation\r\n3K Builders\r\nACM Holdings Inc.\r\nBCMS Inc.\r\nBuilding Maintenance Units Inc\r\nContinental Court Condominium Corporation\r\nDe La Salle\r\nTata Moters\r\nHindalco\r\nAstoria Plaza\r\nMegawide\r\nMegaworld\r\nAmherst Laboratories\r\nEC Structural Composites Inc.\r\nAmerican Plaque Company\r\nPhilexcel Business Park\r\nPrimex\r\nProjexasia\r\nVMS Construction and Plumbing Inc.\r\nHigh Performance Solutions\r\nNoah International Paint Solutions\r\nPBCom\r\nTrans-Phils Corp.\r\nTanika Philippines Corporation\r\n3K Builders\r\nACM Holdings Inc.\r\nBCMS Inc.\r\nBuilding Maintenance Units Inc\r\nContinental Court Condominium Corporation\r\nDe La Salle', '1980-12-02', 'Oil Paints, Alkyd Resin, Polyurethane Paints, Thinners, Synthetic Enamels, and Quick Drying Paint.', 'Epoxy Paints, Stoving Paints, Wood Coating Paints.', 'Stoving Paintsfsjksa oai saf suiafhsiaufhussssssss', 'Polyurethane Primer Paintssdfsfsd fsdofuhsd fhusdfuishd fish', 'Epoxy Paints', 'Aluminium Paints', 'Other Product Oil Paints, Alkyd Resin, Polyurethane Paints,', '500000', 'yufgsa yufgsa', '300 Sqf', '60:30 To 8', 'Mumbai', 'regularity compliance,safety and security,social compliances(csr)', '2', 'yes', 'yes', 'below us$ 1 million', '1,2,3,4,5,6,7,8', '1,2,4,5,7,8,10', '1,2,3,4,5,6,7,8', '1,2,3,4,5,6,7,8,9,10,11,12,13,14', '1,2,3,4,5,6,7,8,9,10,11,12', '51', '2315', '', '402.jpg', '402.jpg', '402.jpg', 'http://newsite.com/company-detail/Gopal Industrial Enterprisesddddd', '2017-10-28 16:43:00', '2018-01-25 10:07:08', 1),
(218, 408, 'Shree Ram Chandi Engineering', 'Shree Ram Chandi Engineering', 'seller', '101', '4500', 'Mr.Santosh Singh Chouhan', '110', '8698211118', '8698211118', NULL, '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'Midc,Hinjewadi,Pune', 'pune', '411057', '', '', 'Canada,Usa,Uae', 'No Packaging Detail', '1', '2001-01-10', '5 to 50', 'us$ 1 million to us$ 2million', '1,2,3,4,5,6,7,8', 'Shree Ram Chandi Engineering. is an established company that enjoys a rich experience in the field of Metal Building Solutions. We, at Deck Sheet  have gone from strength to strength and developed solutions that are not just high on quality but are also world class in terms of technology & service.', 'Company policies and procedures establish the rules of conduct within an organization, outlining the responsibilities of both employees and employers. Company policies and procedures are in place to protect the rights of workers as well as the business interests of employers.', 'Difference between quality assurance and quality control\r\nQuality assurance and quality control are two aspects of quality management. While some quality assurance and quality control activities are interrelated, the two are defined differently. \r\n\r\nAccording to ISO 9000:2015: Quality management systemsâ€”Fundamentals and vocabulary:\r\nQuality assurance consists of that â€œpart of quality management focused on providing confidence that quality requirements will be fulfilled.â€ The confidence provided by quality assurance is twofoldâ€”internally to management and externally to customers, government agencies, regulators, certifiers, and third parties.\r\n\r\nQuality control is that â€œpart of quality management focused on fulfilling quality requirements.â€\r\n\r\nWhile quality assurance relates to how a process is performed or how a product is made, quality control is more the inspection aspect of quality management.\r\n\r\nInspection is the process of measuring, examining, and testing to gauge one or more characteristics of a product or service and the comparison of these with specified requirements to determine conformity. Products, processes, and various other results can be inspected to make sure that the object coming off a production line, or the service being provided, is correct and meets specifications.', 'What is quality management?\r\nQuality has been defined as fitness for use, conformance to requirements, and the pursuit of excellence. Even though the concept of quality has existed from early times, the study and definition of quality have been given prominence only in the last century.\r\n\r\n1920s: quality control. Following the Industrial Revolution and the rise of mass production, it became important to better define and control the quality of products. Originally, the goal of quality was to ensure that engineering requirements were met in final products. Later, as manufacturing processes became more complex, quality developed into a discipline for controlling process variation as a means of producing quality products.\r\n\r\n1950s: quality assurance and auditing. The quality profession expanded to include the quality assurance and quality audit functions. The drivers of independent verification of quality were primarily industries in which public health and safety were paramount.\r\n\r\n1980s: total quality management (TQM). Businesses realized that quality wasnâ€™t just the domain of products and manufacturing processes, and total quality management (TQM) principles were developed to include all processes in a company, including management functions and service sectors.\r\n\r\nQuality management today. There have been many interpretations of what quality is, beyond the dictionary definition of â€œgeneral goodness.â€ Other terms describing quality include reduction of variation, value-added, and conformance to specifications.', 'Difference between quality assurance and quality control\r\nQuality assurance and quality control are two aspects of quality management. While some quality assurance and quality control activities are interrelated, the two are defined differently. \r\n\r\nAccording to ISO 9000:2015: Quality management systemsâ€”Fundamentals and vocabulary:\r\nQuality assurance consists of that â€œpart of quality management focused on providing confidence that quality requirements will be fulfilled.â€ The confidence provided by quality assurance is twofoldâ€”internally to management and externally to customers, government agencies, regulators, certifiers, and third parties.\r\n\r\nQuality control is that â€œpart of quality management focused on fulfilling quality requirements.â€\r\n\r\nWhile quality assurance relates to how a process is performed or how a product is made, quality control is more the inspection aspect of quality management.\r\n\r\nInspection is the process of measuring, examining, and testing to gauge one or more characteristics of a product or service and the comparison of these with specified requirements to determine conformity. Products, processes, and various other results can be inspected to make sure that the object coming off a production line, or the service being provided, is correct and meets specifications.', '', '', 'Acc Cement Plant,Birla Cement Plant,Hindalco Plant', '2001-10-01', 'Industrial Shed', '', 'Industrial Shed', 'Dome Shed', 'Roof Flashing Installation', 'Industrial Roofing Sheet Installation', '', '1000 t', 'Midc Hinjewadi', '', '', '', 'safety and security', '2', 'yes', 'yes', 'below us$ 1 million', '1,2,3,4,5,6,7,8', '1,2,3,4,5,6,7,8,9,10,11,12,13', '0,1,2,3,4,5,6,7,8', '1,2,3,4,5,6,7,8,9,10,11,12,13,14', '1,2,3,4,5,6,7,8,9,10,11,12', '51', '321', '', '408.png', '408.jpg', '408.jpg', 'https://b2bharat.com/company-detail/Shree Ram Chandi Engineering', '2017-11-02 18:25:16', '2017-11-13 20:46:00', 1),
(221, 412, 'Neelu Corporation', 'Neelu Corporation (Branch Jabalpur)', 'both', '101', NULL, 'Miss.Neelu Tiwari', '110,111', '7507211123', '', NULL, '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'Plot No.2007, JIdc ,Jabalpur', 'Jabalpur', '483880', '', '', '', '', '0', '2005-02-12', '5 to 50', 'us$ 1 million to us$ 2million', '1,2,4,5,7,8', 'We, Neelu Corporation, are a prominent manufacturer and supplier of Press Tools and Precision Instruments. Our complete gamut is manufactured using quality material procured from trusted vendors. Owing to our professional approach and rich industry experience, we are able to cater to a wide client base spread across the country. Some of our esteemed clients are ABB Limited Vadodra, Panasonic Energy (l) Co. Ltd. and Crompton Greaves Ltd.', 'We are facilitated with various machines which help us to carry out the production process with utmost efficiency. Moreover, we also have a high precision tool Room installed with WMW Jig Boring machine 1500x1000x900MM that helps us in manufacturing process. Owing to such facilities for manufacturing, we are also able to customize our range on the basis of dimensions, design and raw material\r\n \r\nUnder the aegis of our mentor Mr. Rakesh Kashyap, we have gained trust and confidence of our clients. Their foresighted vision and professional approach have helped us to create a niche for ourselves in the domestic as well as international market.', 'Terms & Conditions\r\nPlease read the following terms and conditions carefully as it sets out the terms of a legally binding agreement between you (the reader) and Business Standard Private Limited.\r\n1) Introduction\r\nThis following sets out the terms and conditions on which you may use the content on \r\nbusiness-standard.com website, business-standard.com\'s mobile browser site, Business Standard instore Applications and other digital publishing services (www.smartinvestor.in, www.bshindi.com and www.bsmotoring,com) owned by Business Standard Private Limited, all the services herein will be referred to as Business Standard Content Services.', 'Joint offers including special price offers are generally limited to new users on the partner sites. Clubbed Offers on partner sites will not be available to you should your email id be registered with the partner website.\r\n\r\nYou are advised to study the offer before you subscribe.\r\n\r\nMerely subscribing to such a joint offer does not make you eligible to gain access to the partner platform. Business Standard does not take responsibility of providing you with an access on the partner site for existing users/subscribers of these sites.', 'Terms & Conditions\r\nPlease read the following terms and conditions carefully as it sets out the terms of a legally binding agreement between you (the reader) and Business Standard Private Limited.\r\n1) Introduction\r\nThis following sets out the terms and conditions on which you may use the content on \r\nbusiness-standard.com website, business-standard.com\'s mobile browser site, Business Standard instore Applications and other digital publishing services (www.smartinvestor.in, www.bshindi.com and www.bsmotoring,com) owned by Business Standard Private Limited, all the services herein will be referred to as Business Standard Content Services.', 'Industrial Press Tools\r\nPress Tools\r\nEngineering Fabrication Services\r\nEngineering Fabrication\r\nPrec', 'Industrial Press Tools\r\nPress Tools\r\nEngineering Fabrication Services\r\nEngineering Fabrication\r\nPrecision Instruments\r\nHolding Fixtures\r\nDrilling Jigs\r\nPiercing Punches\r\nDie Sets', 'Tata Moters\r\nJIDC Moters\r\nJk Electricals', '2005-02-12', 'Industrial Press Tools Press Tools Engineering Fabrication Services Engineering Fabrication Precision Instruments Holding Fixtures Drilling Jigs Piercing Punches Die Sets', 'Industrial Press Tools Press Tools Engineering Fabrication Services Engineering Fabrication Precision Instruments Holding Fixtures Drilling Jigs Piercing Punches Die Sets', 'ndustrial Press Tools Press Tools', 'Engineering Fabrication Services', 'Engineering Fabrication Services', 'Engineering Fabrication Services', '', '', 'jabalpur', '300', '8:30', 'Gujrat', 'regularity compliance,safety and security,social compliances(csr)', '2', 'yes', 'yes', 'below us$ 1 million', '1,2,6,7', '1,4,7,10,13', '0,3,6', '3,4,8,12,13', '2,3,4,6,7,8', '51', '321', '', '412.png', '412.jpg', '412.jpg', 'https://b2bharat.com/company-detail/Neelu Corporation', '2017-11-12 12:37:59', '2017-11-12 07:08:03', 1),
(225, 419, 'softinfo', '', 'both', '101', NULL, 'prahsant shinde', '110', '4545454545', '', NULL, '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', 'university', 'pune', '77777777', 'www.ppp.com', '', '', 'manufacturing material', '0', '2017-12-07', '5 to 50', 'below us$ 1 million', '1,2,3', 'this is startup company', 'straighforward', '', '', '', '', 'sadsadsadsadsadsasadsad', 'asianpaints.com', '2017-12-22', 'ssadsadsad', '', 'sadsa', 'sadsad', 'sadsad', 'sadsad', '', '', '', '', '', '', 'regularity compliance', '1', 'yes', 'yes', 'below us$ 1 million', '2', '2', '1', '13', '1', '51', '2361', '', '419.png', '419.png', 'noimage.jpg', 'https://b2bharat.com/company-detail/softinfo', '2017-12-06 16:39:08', '2017-12-06 11:09:20', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
