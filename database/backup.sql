#
# TABLE STRUCTURE FOR: tbl_calendar_events
#

DROP TABLE IF EXISTS `tbl_calendar_events`;

CREATE TABLE `tbl_calendar_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_calendar_events` (`id`, `title`, `start`, `end`, `description`, `u_branch`) VALUES ('1', 'Test Event', '2019-12-19 07:00:00', '2019-12-19 10:00:00', '', 'bangi');
INSERT INTO `tbl_calendar_events` (`id`, `title`, `start`, `end`, `description`, `u_branch`) VALUES ('2', 'New Event', '2019-12-19 10:00:00', '2019-12-19 11:00:00', '', 'bangi');
INSERT INTO `tbl_calendar_events` (`id`, `title`, `start`, `end`, `description`, `u_branch`) VALUES ('3', 'New Event', '2019-12-19 15:30:00', '2019-12-19 17:00:00', '', 'bangi');
INSERT INTO `tbl_calendar_events` (`id`, `title`, `start`, `end`, `description`, `u_branch`) VALUES ('5', 'Nabilicious', '2019-12-19 18:25:00', '2019-12-19 19:30:00', 'Testing', 'bangi');
INSERT INTO `tbl_calendar_events` (`id`, `title`, `start`, `end`, `description`, `u_branch`) VALUES ('6', 'Test11', '2019-12-20 18:35:00', '2019-12-20 19:15:00', 'Testing', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_client
#

DROP TABLE IF EXISTS `tbl_client`;

CREATE TABLE `tbl_client` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) NOT NULL,
  `c_geolocate` varchar(255) NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_telephone` varchar(255) NOT NULL,
  `c_vat` varchar(255) NOT NULL,
  `c_file` varchar(255) DEFAULT NULL,
  `c_company` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_postal` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_ssn` varchar(255) NOT NULL,
  `c_comment` varchar(255) NOT NULL,
  `u_role` varchar(255) DEFAULT NULL,
  `u_branch` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('1', 'Ashrullllllllll', 'Perak', 'Sepang', '0172563723', 'VAT', '79cf3e57-8a50-490e-9b47-00ac46c22908.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, NULL);
INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('40', 'Ashrullllllllll', 'Perak', 'Sepang', '0172563723', 'VAT', '79cf3e57-8a50-490e-9b47-00ac46c22908.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi');
INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('42', 'Ashruloooooooooooooo', 'Perak', 'Sepang', '0172563723', 'VAT', 'http://localhost/profix-gadget//uploads/145382a14febdf8f194fc62021a703a4.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Testting', NULL, 'bangi');
INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('44', 'Ashrultest', 'Perak', 'Sepang', '0172563723', 'VAT', '79cf3e57-8a50-490e-9b47-00ac46c22908.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi');
INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('46', 'Ashrul', 'Perak', 'Sepang', '0172563723', 'VAT', 'http://localhost/profix-gadget//uploads/826c4e945061fc4c78dd53ecc2837af6.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Testing', NULL, 'bangi');
INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('47', 'Ashrul', 'Perak', 'Sepang', '0172563723', 'VAT', 'http://localhost/profix-gadget//uploads/19386972b93c5b7c9d4327950f41c69d.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi');
INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('48', 'Nabilllllllllll', 'Perak', 'Sepang', '0172563723', 'VAT', 'http://localhost/profix-gadget//uploads/1e7e64b78e4b0906f8d6cfdf501ba195.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Testing', NULL, 'bangi');
INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('49', 'Pian', 'Perak', 'Sepang', '0191725352', 'VAT', '/uploads/7410c8ba5c7a17f9c9dd6b7f78b210ea.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi');
INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('50', 'Syraf', 'Perak', 'Sepang', '0172563723', 'VAT', '79e744554ea6de7d08bc0e7d043f2d96.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Testing', NULL, 'bangi');
INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('51', 'Nabil', 'Perak', 'Sepang', '0172563723', 'VAT', 'ca3af29e6a3ed2505b394adcfa4fb922.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Testing', NULL, 'bangi');
INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('52', 'Ashrul', 'Perak', 'Sepang', '0172563723', 'VAT', '39c317edebc3479c4b98d4545b84eeea.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi');
INSERT INTO `tbl_client` (`c_id`, `c_name`, `c_geolocate`, `c_city`, `c_telephone`, `c_vat`, `c_file`, `c_company`, `c_address`, `c_postal`, `c_email`, `c_ssn`, `c_comment`, `u_role`, `u_branch`) VALUES ('53', 'Ashrul', 'Perak', 'Sepang', '0172563723', 'VAT', '5fcc037567ccf919ec78f1fecab535af.png', 'UTeM', 'Salak Selatan', '70000', 'asyrafsam14@gmail.com', '15555243524352', 'Test', NULL, 'bangi');


#
# TABLE STRUCTURE FOR: tbl_database
#

DROP TABLE IF EXISTS `tbl_database`;

CREATE TABLE `tbl_database` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `version` datetime NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_database` (`id`, `file_name`, `version`, `u_branch`) VALUES ('1', 'test', '2019-12-27 11:00:00', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_drawer
#

DROP TABLE IF EXISTS `tbl_drawer`;

CREATE TABLE `tbl_drawer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openTime` datetime NOT NULL,
  `openBy` varchar(255) NOT NULL,
  `openingCash` float(9,2) NOT NULL,
  `currentBalance` double(9,2) NOT NULL,
  `closedTime` datetime NOT NULL,
  `closedBy` varchar(255) NOT NULL,
  `closingCash` double(9,2) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_drawer` (`id`, `openTime`, `openBy`, `openingCash`, `currentBalance`, `closedTime`, `closedBy`, `closingCash`, `u_branch`) VALUES ('5', '2019-12-20 22:58:58', 'Aliff', '5838.00', '0.00', '0000-00-00 00:00:00', '', '0.00', 'bangi');
INSERT INTO `tbl_drawer` (`id`, `openTime`, `openBy`, `openingCash`, `currentBalance`, `closedTime`, `closedBy`, `closingCash`, `u_branch`) VALUES ('10', '2019-12-22 00:36:28', 'Aliff', '1105.00', '1376.00', '2019-11-12 07:28:00', '', '0.00', 'bangi');
INSERT INTO `tbl_drawer` (`id`, `openTime`, `openBy`, `openingCash`, `currentBalance`, `closedTime`, `closedBy`, `closingCash`, `u_branch`) VALUES ('11', '2019-12-23 00:20:37', 'Aliff', '1000.00', '914.00', '2019-12-23 16:56:14', 'Aliff', '914.00', 'bangi');
INSERT INTO `tbl_drawer` (`id`, `openTime`, `openBy`, `openingCash`, `currentBalance`, `closedTime`, `closedBy`, `closingCash`, `u_branch`) VALUES ('13', '2019-12-24 22:11:57', 'Aliff', '1000.00', '1000.00', '0000-00-00 00:00:00', '', '0.00', 'bangi');
INSERT INTO `tbl_drawer` (`id`, `openTime`, `openBy`, `openingCash`, `currentBalance`, `closedTime`, `closedBy`, `closingCash`, `u_branch`) VALUES ('14', '2019-12-26 15:47:51', 'Aliff', '470.00', '486.00', '0000-00-00 00:00:00', '', '0.00', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_group_permission
#

DROP TABLE IF EXISTS `tbl_group_permission`;

CREATE TABLE `tbl_group_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupId` varchar(255) NOT NULL,
  `reparation_view` int(11) NOT NULL,
  `reparation_add` int(11) NOT NULL,
  `reparation_edit` int(11) NOT NULL,
  `reparation_delete` int(11) NOT NULL,
  `clients_view` int(11) NOT NULL,
  `clients_add` int(11) NOT NULL,
  `clients_edit` int(11) NOT NULL,
  `clients_delete` int(11) NOT NULL,
  `stock_view` int(11) NOT NULL,
  `stock_add` int(11) NOT NULL,
  `stock_edit` int(11) NOT NULL,
  `stock_delete` int(11) NOT NULL,
  `suppliers_view` int(11) NOT NULL,
  `suppliers_add` int(11) NOT NULL,
  `suppliers_edit` int(11) NOT NULL,
  `suppliers_delete` int(11) NOT NULL,
  `models_view` int(11) NOT NULL,
  `models_add` int(11) NOT NULL,
  `models_edit` int(11) NOT NULL,
  `models_delete` int(11) NOT NULL,
  `purchases_view` int(11) NOT NULL,
  `purchases_add` int(11) NOT NULL,
  `purchases_edit` int(11) NOT NULL,
  `purchases_delete` int(11) NOT NULL,
  `users_view` int(11) NOT NULL,
  `users_add` int(11) NOT NULL,
  `users_edit` int(11) NOT NULL,
  `users_delete` int(11) NOT NULL,
  `group_view` int(11) NOT NULL,
  `group_add` int(11) NOT NULL,
  `group_edit` int(11) NOT NULL,
  `group_delete` int(11) NOT NULL,
  `tax_view` int(11) NOT NULL,
  `tax_add` int(11) NOT NULL,
  `tax_edit` int(11) NOT NULL,
  `tax_delete` int(11) NOT NULL,
  `categories_view` int(11) NOT NULL,
  `categories_add` int(11) NOT NULL,
  `categories_edit` int(11) NOT NULL,
  `categories_delete` int(11) NOT NULL,
  `manufacturers_view` int(11) NOT NULL,
  `manufacturers_add` int(11) NOT NULL,
  `manufacturers_edit` int(11) NOT NULL,
  `manufacturers_delete` int(11) NOT NULL,
  `reports_stock` int(11) NOT NULL,
  `reports_finance` int(11) NOT NULL,
  `reports_quantity` int(11) NOT NULL,
  `reports_sales` int(11) NOT NULL,
  `reports_drawer` int(11) NOT NULL,
  `database_view` int(11) NOT NULL,
  `database_backup` int(11) NOT NULL,
  `database_restore` int(11) NOT NULL,
  `database_remove` int(11) NOT NULL,
  `miscellanous_email` int(11) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_group_permission` (`id`, `groupId`, `reparation_view`, `reparation_add`, `reparation_edit`, `reparation_delete`, `clients_view`, `clients_add`, `clients_edit`, `clients_delete`, `stock_view`, `stock_add`, `stock_edit`, `stock_delete`, `suppliers_view`, `suppliers_add`, `suppliers_edit`, `suppliers_delete`, `models_view`, `models_add`, `models_edit`, `models_delete`, `purchases_view`, `purchases_add`, `purchases_edit`, `purchases_delete`, `users_view`, `users_add`, `users_edit`, `users_delete`, `group_view`, `group_add`, `group_edit`, `group_delete`, `tax_view`, `tax_add`, `tax_edit`, `tax_delete`, `categories_view`, `categories_add`, `categories_edit`, `categories_delete`, `manufacturers_view`, `manufacturers_add`, `manufacturers_edit`, `manufacturers_delete`, `reports_stock`, `reports_finance`, `reports_quantity`, `reports_sales`, `reports_drawer`, `database_view`, `database_backup`, `database_restore`, `database_remove`, `miscellanous_email`, `u_branch`) VALUES ('1', 'master', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'bangi');
INSERT INTO `tbl_group_permission` (`id`, `groupId`, `reparation_view`, `reparation_add`, `reparation_edit`, `reparation_delete`, `clients_view`, `clients_add`, `clients_edit`, `clients_delete`, `stock_view`, `stock_add`, `stock_edit`, `stock_delete`, `suppliers_view`, `suppliers_add`, `suppliers_edit`, `suppliers_delete`, `models_view`, `models_add`, `models_edit`, `models_delete`, `purchases_view`, `purchases_add`, `purchases_edit`, `purchases_delete`, `users_view`, `users_add`, `users_edit`, `users_delete`, `group_view`, `group_add`, `group_edit`, `group_delete`, `tax_view`, `tax_add`, `tax_edit`, `tax_delete`, `categories_view`, `categories_add`, `categories_edit`, `categories_delete`, `manufacturers_view`, `manufacturers_add`, `manufacturers_edit`, `manufacturers_delete`, `reports_stock`, `reports_finance`, `reports_quantity`, `reports_sales`, `reports_drawer`, `database_view`, `database_backup`, `database_restore`, `database_remove`, `miscellanous_email`, `u_branch`) VALUES ('2', 'Admin', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_hold
#

DROP TABLE IF EXISTS `tbl_hold`;

CREATE TABLE `tbl_hold` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `random_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(9,2) NOT NULL,
  `status` int(11) NOT NULL,
  `id_item` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=882 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('844', '908855546', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('845', '908855546', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('848', '1603144243', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('849', '1603144243', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('850', '194867460', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('851', '1374683582', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('852', '959353857', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('853', '959353857', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('854', '849076242', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('855', '465893152', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('856', '656877489', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('857', '656877489', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('858', '656877489', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('859', '564384228', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('860', '1666249639', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('861', '1281346189', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('862', '148509433', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('863', '2039081158', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('864', '2016225187', 'Plug In All Android (100008)  ', '2', '34.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('865', '476615075', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('866', '1997814573', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('867', '1997814573', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('868', '255465711', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('869', '255465711', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('870', '692491403', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('871', '692491403', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('872', '692491403', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('873', '291249039', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('874', '291249039', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('875', '1303954294', 'Plug In All Android (100008)  ', '3', '51.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('876', '1303954294', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('877', '2134800386', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('878', '1920586045', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('879', '1920586045', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('880', '1964831362', 'Plug In All Android (100008)  ', '1', '17.00', '0', '1');
INSERT INTO `tbl_hold` (`id`, `random_id`, `product_name`, `quantity`, `unit_price`, `status`, `id_item`) VALUES ('881', '1964831362', 'Plug In All Android (100010)  ', '1', '9.00', '0', '2');


#
# TABLE STRUCTURE FOR: tbl_holdproduct
#

DROP TABLE IF EXISTS `tbl_holdproduct`;

CREATE TABLE `tbl_holdproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` varchar(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `pro_price` double(9,2) NOT NULL,
  `pro_tax` double(9,2) NOT NULL,
  `pro_disc` double(9,2) NOT NULL,
  `pro_status` int(11) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('164', '33', 'Samsung Galaxy S10', '1', '21.00', '5.00', '0.00', '1', '6563');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('165', '36', 'Camera Sony Xperia M', '2', '47.00', '10.00', '5.00', '1', '6563');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('166', '33', 'Samsung Galaxy S10', '3', '54.00', '1.00', '10.00', '1', '5961');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('167', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '9351');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('168', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '9465');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('169', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '474');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('170', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '3548');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('171', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '3548');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('172', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '4151');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('173', '36', 'Camera Sony Xperia M', '3', '63.00', '0.00', '0.00', '1', '4151');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('174', '36', 'Camera Sony Xperia M', '1', '21.00', '0.00', '0.00', '1', '4151');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('175', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '975');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('180', '33', 'Samsung Galaxy S10', '3', '69.00', '11.00', '5.00', '1', '2371');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('181', '36', 'Camera Sony Xperia M', '1', '21.00', '0.00', '0.00', '1', '2371');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('182', '34', 'Battery', '3', '63.00', '0.00', '0.00', '1', '2371');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('183', '33', 'Samsung Galaxy S10', '3', '62.00', '10.00', '11.00', '1', '4446');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('184', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '4446');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('185', '33', 'Samsung Galaxy S10', '1', '14.00', '0.00', '7.00', '1', '3251');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('186', '36', 'Camera Sony Xperia M', '1', '12.00', '0.00', '9.00', '1', '3251');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('187', '34', 'Battery', '10', '121.00', '11.00', '100.00', '1', '3251');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('188', '33', 'Samsung Galaxy S10', '2', '42.00', '0.00', '0.00', '0', '291');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('189', '36', 'Camera Sony Xperia M', '1', '21.00', '0.00', '0.00', '0', '291');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('190', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '4891');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('191', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '3495');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('192', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '3901');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('193', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '4730');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('194', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '1776');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('195', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '9124');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('196', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '2760');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('197', '33', 'Samsung Galaxy S10', '2', '42.00', '0.00', '0.00', '1', '2760');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('198', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '6625');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('199', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '1335');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('200', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '3337');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('201', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '3869');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('202', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '4948');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('203', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '9065');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('204', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '726');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('205', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '3065');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('207', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '9262');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('208', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '1737');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('211', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '8519');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('212', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '128');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('213', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '1603');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('214', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '4191');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('215', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '1144');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('216', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '7433');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('217', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '5266');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('218', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '1453');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('219', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '5883');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('220', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '685');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('221', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '0', '2759');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('223', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '5818');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('224', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '9665');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('225', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '871');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('226', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '3374');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('227', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '3629');
INSERT INTO `tbl_holdproduct` (`id`, `pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_tax`, `pro_disc`, `pro_status`, `hold_id`) VALUES ('228', '33', 'Samsung Galaxy S10', '1', '21.00', '0.00', '0.00', '1', '5618');


#
# TABLE STRUCTURE FOR: tbl_invoice_details
#

DROP TABLE IF EXISTS `tbl_invoice_details`;

CREATE TABLE `tbl_invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceName` varchar(255) NOT NULL,
  `invoiceEmail` varchar(255) NOT NULL,
  `invoiceAddr` varchar(255) NOT NULL,
  `invoiceTel` varchar(255) NOT NULL,
  `invoiceCustom` varchar(255) NOT NULL,
  `invoiceDisclaimer` varchar(255) NOT NULL,
  `invoiceLogo` varchar(255) NOT NULL,
  `invoiceBackground` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_invoice_details` (`id`, `invoiceName`, `invoiceEmail`, `invoiceAddr`, `invoiceTel`, `invoiceCustom`, `invoiceDisclaimer`, `invoiceLogo`, `invoiceBackground`, `u_branch`) VALUES ('1', 'Invoice', 'gadgetprofix@gmail.com', 'No.2B Bandar Pasir Puteh, Jalan Kota Bharu', '017 999 0009', '', '', 'ee87fd7fdf79b9c88acdac99e307e306.png', '', 'bangi');
INSERT INTO `tbl_invoice_details` (`id`, `invoiceName`, `invoiceEmail`, `invoiceAddr`, `invoiceTel`, `invoiceCustom`, `invoiceDisclaimer`, `invoiceLogo`, `invoiceBackground`, `u_branch`) VALUES ('2', 'Receipt', 'test@gmail.com', 'Salak Selatan', '987652673', '', 'Test', '52af0c048419af26477b1a13082af59b.png', '', 'shah alam');


#
# TABLE STRUCTURE FOR: tbl_lookup_category
#

DROP TABLE IF EXISTS `tbl_lookup_category`;

CREATE TABLE `tbl_lookup_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_lookup_category` (`cat_id`, `cat_name`, `hold_id`, `u_branch`) VALUES ('41', 'Screen', '6505', 'bangi');
INSERT INTO `tbl_lookup_category` (`cat_id`, `cat_name`, `hold_id`, `u_branch`) VALUES ('42', 'Battery', '6506', 'bangi');
INSERT INTO `tbl_lookup_category` (`cat_id`, `cat_name`, `hold_id`, `u_branch`) VALUES ('60', 'Camera', '9577', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_lookup_imei
#

DROP TABLE IF EXISTS `tbl_lookup_imei`;

CREATE TABLE `tbl_lookup_imei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imei` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_lookup_imei` (`id`, `imei`) VALUES ('1', '155534253455456');
INSERT INTO `tbl_lookup_imei` (`id`, `imei`) VALUES ('2', '175534253455456');


#
# TABLE STRUCTURE FOR: tbl_lookup_item
#

DROP TABLE IF EXISTS `tbl_lookup_item`;

CREATE TABLE `tbl_lookup_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `i_name` varchar(255) NOT NULL,
  `i_price` double(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_lookup_item` (`id`, `i_name`, `i_price`) VALUES ('1', 'Plug In All Android (100008)  ', '17.00');
INSERT INTO `tbl_lookup_item` (`id`, `i_name`, `i_price`) VALUES ('2', 'Plug In All Android (100010)  ', '9.00');


#
# TABLE STRUCTURE FOR: tbl_lookup_model
#

DROP TABLE IF EXISTS `tbl_lookup_model`;

CREATE TABLE `tbl_lookup_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_lookup_model` (`id`, `m_name`) VALUES ('1', 'Redmi Note 7');
INSERT INTO `tbl_lookup_model` (`id`, `m_name`) VALUES ('2', 'Vivo S1');


#
# TABLE STRUCTURE FOR: tbl_lookup_subcategory
#

DROP TABLE IF EXISTS `tbl_lookup_subcategory`;

CREATE TABLE `tbl_lookup_subcategory` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `subCat_name` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('26', 'Amoled Samsung', '41', '6505', 'bangi');
INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('27', 'HD+ Screen', '41', '6505', 'bangi');
INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('28', 'HDR+ HD+ Screen', '41', '6505', 'bangi');
INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('29', 'Battery Lithium', '42', '6506', 'bangi');
INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('110', 'Battery Lithium 1000mah', '42', '6506', 'bangi');
INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('111', 'Battery Lithium 2000mah', '42', '6506', 'bangi');
INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('112', 'Battery Lithium 3000mah', '42', '6506', 'bangi');
INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('113', 'Battery Lithium 4000mah', '42', '6506', 'bangi');
INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('123', 'Samsung F1.8', '60', '9577', 'bangi');
INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('124', 'Sony IMX1', '60', '9577', 'bangi');
INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('125', 'Sony IMX2', '60', '9577', 'bangi');
INSERT INTO `tbl_lookup_subcategory` (`sub_id`, `subCat_name`, `cat_id`, `hold_id`, `u_branch`) VALUES ('126', 'Sony IMX3', '60', '9577', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_manufacturer
#

DROP TABLE IF EXISTS `tbl_manufacturer`;

CREATE TABLE `tbl_manufacturer` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_manufacturer` (`m_id`, `m_name`, `u_branch`) VALUES ('1', 'Acer', '');
INSERT INTO `tbl_manufacturer` (`m_id`, `m_name`, `u_branch`) VALUES ('2', 'Apple', '');
INSERT INTO `tbl_manufacturer` (`m_id`, `m_name`, `u_branch`) VALUES ('7', 'Hewlett Peckerd', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_model
#

DROP TABLE IF EXISTS `tbl_model`;

CREATE TABLE `tbl_model` (
  `md_id` int(11) NOT NULL AUTO_INCREMENT,
  `md_name` varchar(255) NOT NULL,
  `md_manufacturer` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`md_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_model` (`md_id`, `md_name`, `md_manufacturer`, `u_branch`) VALUES ('1', 'E5333', 'Sony Xperia', '');
INSERT INTO `tbl_model` (`md_id`, `md_name`, `md_manufacturer`, `u_branch`) VALUES ('3', 'E5333', 'Sony Xperia', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_payment
#

DROP TABLE IF EXISTS `tbl_payment`;

CREATE TABLE `tbl_payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_repairno` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_ref` varchar(255) NOT NULL,
  `pay_amount` double(9,2) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `pay_note` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('43', 'REPAIR4410', '806280801', '2019-12-03', '9283634', '250.00', 'Cash', 'test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('51', 'REPAIR4499', '806280801', '2019-12-18', '2019/567', '50.00', 'Cash', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('53', 'REPAIR4499', '806280801', '2019-12-18', '2019/567', '50.00', 'Cash', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('54', 'REPAIR4407', '806280801', '2019-12-11', '9283634', '0.00', 'Cash', 'test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('55', 'REPAIR4400', '806280801', '2019-03-03', '9283634', '1000.00', 'Cash', 'test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('72', 'REPAIR7870', '692491403', '0000-00-00', '', '0.00', '', '', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('74', 'REPAIR9021', '291249039', '0000-00-00', '', '0.00', '', '', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('77', 'REPAIR9021', '291249039', '2019-12-26', '2019/45', '30.00', 'Cash', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('78', 'REPAIR9021', '291249039', '0000-00-00', '2019/604', '0.00', '-', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('79', 'REPAIR6441', '1303954294', '0000-00-00', '', '0.00', '', '', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('80', 'REPAIR6441', '1303954294', '0000-00-00', '', '0.00', '', '', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('81', 'REPAIR6441', '1303954294', '2019-12-19', '2019/68', '55.00', 'Cash', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('84', 'REPAIR6441', '1303954294', '2019-12-25', '2019/17', '15.00', 'Cash', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('85', 'REPAIR7870', '692491403', '0000-00-00', '2019/467', '0.00', '-', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('86', 'REPAIR7870', '692491403', '0000-00-00', '2019/215', '0.00', '-', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('89', 'REPAIR6441', '1303954294', '2019-12-25', '2019/101', '10.00', 'Cash', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('90', 'REPAIR7870', '692491403', '0000-00-00', '2019/21', '0.00', '-', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('91', 'REPAIR7870', '692491403', '0000-00-00', '2019/243', '0.00', '-', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('92', 'REPAIR7870', '692491403', '0000-00-00', '2019/451', '0.00', '-', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('93', 'REPAIR7870', '692491403', '0000-00-00', '2019/253', '0.00', '-', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('94', 'REPAIR7870', '692491403', '2019-12-27', '2019/660', '100.00', 'Cash', 'Test', '');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('95', 'REPAIR9021', '291249039', '2019-12-26', '2019/44', '6.00', 'Cash', 'Test', 'bangi');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('96', 'REPAIR4720', '1920586045', '0000-00-00', '', '0.00', '', '', 'bangi');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('97', 'REPAIR5886', '2086295926', '0000-00-00', '', '0.00', '', '', 'bangi');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('98', 'REPAIR5886', '2086295926', '2019-12-26', '2019/12', '7.00', 'Cash', 'Test', 'bangi');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('99', 'REPAIR5886', '2086295926', '2019-12-26', '2019/770', '10.00', 'Cash', 'Test', 'bangi');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('100', 'REPAIR5886', '2086295926', '2019-12-26', '2019/416', '10.00', 'Cash', 'Test', 'bangi');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('101', 'REPAIR7087', '1964831362', '0000-00-00', '', '0.00', '', '', 'bangi');
INSERT INTO `tbl_payment` (`pay_id`, `r_repairno`, `hold_id`, `pay_date`, `pay_ref`, `pay_amount`, `pay_type`, `pay_note`, `u_branch`) VALUES ('102', 'REPAIR7087', '1964831362', '2019-12-25', '2019/366', '6.00', 'Cash', 'Test', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_posdetails
#

DROP TABLE IF EXISTS `tbl_posdetails`;

CREATE TABLE `tbl_posdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) NOT NULL,
  `c_id` varchar(255) NOT NULL,
  `total` double(9,2) NOT NULL,
  `total_paid` double(9,2) NOT NULL,
  `date_pos` datetime NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `user_incharge` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_posdetails` (`id`, `transaction_id`, `c_id`, `total`, `total_paid`, `date_pos`, `hold_id`, `user_incharge`, `u_branch`) VALUES ('140', 'POS5748', '50', '21.00', '22.00', '2019-12-16 15:14:35', '975', 'Aliff', 'bangi');
INSERT INTO `tbl_posdetails` (`id`, `transaction_id`, `c_id`, `total`, `total_paid`, `date_pos`, `hold_id`, `user_incharge`, `u_branch`) VALUES ('141', 'POS4890', '51', '153.00', '153.00', '2019-10-01 16:08:29', '2371', 'Aliff', 'bangi');
INSERT INTO `tbl_posdetails` (`id`, `transaction_id`, `c_id`, `total`, `total_paid`, `date_pos`, `hold_id`, `user_incharge`, `u_branch`) VALUES ('143', 'POS1189', '50', '147.00', '147.00', '2019-12-18 22:57:25', '3251', 'Aliff', 'bangi');
INSERT INTO `tbl_posdetails` (`id`, `transaction_id`, `c_id`, `total`, `total_paid`, `date_pos`, `hold_id`, `user_incharge`, `u_branch`) VALUES ('145', 'POS3626', '40', '63.00', '10.00', '2019-12-22 01:05:54', '2760', 'Aliff', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_pospayment
#

DROP TABLE IF EXISTS `tbl_pospayment`;

CREATE TABLE `tbl_pospayment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_ref` varchar(255) NOT NULL,
  `pay_date` varchar(255) NOT NULL,
  `pay_amount` double(9,2) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `pay_note` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('12', '2019/261', '2019-12-16 15:14:35', '0.00', '', '', 'POS5748', '975', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('13', '2019/260', '2019-12-19', '11.00', 'Cash', 'Test', 'POS5748', '975', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('14', '2019/984', '2019-12-17', '11.00', 'Cash', 'Test', 'POS5748', '975', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('15', '', '2019-12-16 16:08:29', '0.00', '', '', 'POS4890', '2371', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('20', '2019/93', '2019-12-18', '11.00', 'Cash', 'Test', 'POS4890', '2371', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('21', '2019/839', '2019-12-26', '142.00', 'Cash', 'Test', 'POS4890', '2371', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('22', '', '2019-12-18 18:03:50', '0.00', '', '', 'POS9218', '4446', '');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('24', '', '2019-12-18 22:57:25', '0.00', '', '', 'POS1189', '3251', '');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('26', '', '2019-12-22 01:04:49', '0.00', '', '', 'POS417', '9124', '');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('27', '', '2019-12-22 01:05:54', '0.00', '', '', 'POS3626', '2760', '');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('28', '', '2019-12-22 01:07:08', '0.00', '', '', 'POS9841', '6625', '');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('29', '2019/832', '2019-12-22 14:05:33', '11.00', '', 'Test', 'POS7193', '5266', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('30', '2019/132', '2019-12-22 14:06:05', '11.00', '', 'Test', 'POS1610', '1453', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('31', '2019/377', '2019-12-22 14:11:08', '25.00', '', 'Test', 'POS2128', '5818', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('32', '2019/927', '2019-12-22 14:20:28', '11.00', '', 'Test', 'POS4330', '871', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('33', '2019/258', '2019-12-22 14:31:00', '11.00', '', 'Test', 'POS8009', '3374', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('34', '2019/258', '2019-12-22 14:32:07', '11.00', '', 'Test', 'POS8009', '3374', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('35', '2019/114', '2019-12-22 14:33:11', '25.00', '', 'Test', 'POS6009', '5618', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('36', '2019/265', '2019-12-25', '10.00', 'Cash', 'Test', 'POS7193', '5266', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('37', '2019/265', '2019-12-25', '10.00', 'Cash', 'Test', 'POS7193', '5266', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('38', '2019/349', '2019-12-23', '1.00', 'Cash', 'Test', 'POS7193', '5266', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('39', '2019/618', '2019-12-17', '19.00', 'Cash', 'Test', 'POS7193', '5266', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('40', '2019/107', '2019-12-24', '50.00', 'Cash', 'Test', 'POS9218', '4446', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('41', '2019/526', '2019-12-25', '10.00', 'Cash', 'Test', 'POS1610', '1453', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('57', '2019/369', '2019-12-25', '7.00', 'Cash', 'Test', 'POS1189', '3251', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('58', '2019/947', '2019-12-26', '100.00', 'Cash', 'Test', 'POS1189', '3251', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('59', '2019/173', '2019-12-26', '100.00', 'Cash', 'Test', 'POS1189', '3251', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('84', '2019/927', '0000-00-00', '0.00', '-', 'Test', 'POS3626', '2760', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('85', '2019/54', '0000-00-00', '0.00', '-', 'Test', 'POS3626', '2760', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('86', '2019/695', '2019-12-25', '10.00', 'Cash', 'Test', 'POS3626', '2760', 'bangi');
INSERT INTO `tbl_pospayment` (`id`, `pay_ref`, `pay_date`, `pay_amount`, `pay_type`, `pay_note`, `transaction_id`, `hold_id`, `u_branch`) VALUES ('87', '2019/733', '0000-00-00', '0.00', '-', 'Test', 'POS3626', '2760', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_print_client
#

DROP TABLE IF EXISTS `tbl_print_client`;

CREATE TABLE `tbl_print_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hold_id` varchar(255) NOT NULL,
  `c_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_print_client` (`id`, `hold_id`, `c_id`) VALUES ('2', '1418943719', '1');


#
# TABLE STRUCTURE FOR: tbl_print_purchase
#

DROP TABLE IF EXISTS `tbl_print_purchase`;

CREATE TABLE `tbl_print_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hold_id` varchar(255) NOT NULL,
  `pur_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_print_purchase` (`id`, `hold_id`, `pur_id`) VALUES ('101', '1320810709', '40');
INSERT INTO `tbl_print_purchase` (`id`, `hold_id`, `pur_id`) VALUES ('102', '1280154307', '42');
INSERT INTO `tbl_print_purchase` (`id`, `hold_id`, `pur_id`) VALUES ('103', '1280154307', '39');
INSERT INTO `tbl_print_purchase` (`id`, `hold_id`, `pur_id`) VALUES ('105', '1775204527', '42');


#
# TABLE STRUCTURE FOR: tbl_print_sales
#

DROP TABLE IF EXISTS `tbl_print_sales`;

CREATE TABLE `tbl_print_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_details_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `custAddress` varchar(255) NOT NULL,
  `custPhone` int(11) NOT NULL,
  `custEmail` varchar(255) NOT NULL,
  `custBranch` varchar(255) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `proQty` int(11) NOT NULL,
  `proPrice` double(9,2) NOT NULL,
  `proTax` double(9,2) NOT NULL,
  `user_incharge` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('1', '0', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', '', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '2128674645', '');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('2', '0', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1844737109', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('3', '0', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1304152508', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('27', '0', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1336043634', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('28', '0', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1800706041', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('29', '140', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '66087229', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('30', '140', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '462818525', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('31', '140', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '639914749', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('32', '140', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '992980609', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('33', '140', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '992980609', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('34', '140', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '992980609', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('35', '140', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1489690501', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('36', '140', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1489690501', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('37', '140', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1813626938', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('38', '140', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1466370576', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('39', '140', 'POS5748', 'Syraf', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '752464810', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('44', '158', 'POS4330', 'Ashrullllllllll', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1872628853', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('45', '146', 'POS9841', 'Ashrullllllllll', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', '', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1872628853', '');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('46', '155', 'POS2128', 'Ashrullllllllll', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1872628853', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('47', '162', 'POS6009', 'Ashruloooooooooooooo', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1872628853', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('48', '149', 'POS7193', 'Ashrullllllllll', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1872628853', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('49', '142', 'POS9218', 'Pian', 'Salak Selatan', '191725352', 'asyrafsam14@gmail.com', 'bangi', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1872628853', 'bangi');
INSERT INTO `tbl_print_sales` (`id`, `p_details_id`, `transaction_id`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custBranch`, `proName`, `proQty`, `proPrice`, `proTax`, `user_incharge`, `hold_id`, `u_branch`) VALUES ('50', '159', 'POS8009', 'Ashrullllllllll', 'Salak Selatan', '172563723', 'asyrafsam14@gmail.com', '', 'Samsung Galaxy S10', '1', '21.00', '0.00', 'Aliff', '1872628853', '');


#
# TABLE STRUCTURE FOR: tbl_print_stock
#

DROP TABLE IF EXISTS `tbl_print_stock`;

CREATE TABLE `tbl_print_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_code` varchar(255) NOT NULL,
  `p_cost` double(9,2) NOT NULL,
  `p_price` double(9,2) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_alertQuantity` int(11) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('3', '35', 'Battery', '43650', '11.00', '29.00', '21', '11', '', '856073731');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('4', '33', 'Samsung Galaxy S10', '70000', '11.00', '21.00', '7', '11', '', '856073731');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('5', '33', 'Samsung Galaxy S10', '70000', '11.00', '21.00', '7', '11', 'bangi', '1225501868');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('6', '35', 'Battery', '43650', '11.00', '29.00', '21', '11', 'bangi', '1225501868');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('7', '33', 'Samsung Galaxy S10', '70000', '11.00', '21.00', '7', '11', 'bangi', '1045223422');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('8', '36', 'Camera Sony Xperia M', '43650', '11.00', '21.00', '12', '11', 'bangi', '1045223422');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('9', '33', 'Samsung Galaxy S10', '70000', '11.00', '21.00', '7', '11', 'bangi', '615873935');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('10', '34', 'Battery', '70000', '11.00', '21.00', '21', '11', 'bangi', '615873935');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('11', '34', 'Battery', '70000', '11.00', '21.00', '21', '11', 'bangi', '2026431385');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('12', '34', 'Battery', '70000', '11.00', '21.00', '21', '11', 'bangi', '1068032094');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('13', '36', 'Camera Sony Xperia M', '43650', '11.00', '21.00', '12', '11', 'bangi', '1068032094');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('14', '37', 'Camera Sony Xperia Z', '70000', '11.00', '21.00', '21', '17', 'bangi', '1068032094');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('15', '34', 'Battery', '70000', '11.00', '21.00', '21', '11', 'bangi', '2123733440');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('16', '35', 'Battery', '43650', '11.00', '29.00', '21', '11', 'bangi', '2123733440');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('17', '36', 'Camera Sony Xperia M', '43650', '11.00', '21.00', '12', '11', 'bangi', '2123733440');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('18', '33', 'Samsung Galaxy S10', '70000', '11.00', '21.00', '7', '11', 'bangi', '697658457');
INSERT INTO `tbl_print_stock` (`id`, `p_id`, `p_name`, `p_code`, `p_cost`, `p_price`, `p_quantity`, `p_alertQuantity`, `u_branch`, `hold_id`) VALUES ('19', '33', 'Samsung Galaxy S10', '70000', '11.00', '21.00', '-6', '11', 'bangi', '1278797781');


#
# TABLE STRUCTURE FOR: tbl_product
#

DROP TABLE IF EXISTS `tbl_product`;

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_type` varchar(255) NOT NULL,
  `p_code` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_category` varchar(255) NOT NULL,
  `p_subCategory` varchar(255) NOT NULL,
  `p_detail` varchar(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_unit` varchar(255) NOT NULL,
  `p_cost` double(9,2) NOT NULL,
  `p_price` double(9,2) NOT NULL,
  `p_supplier` varchar(255) NOT NULL,
  `p_model` varchar(255) NOT NULL,
  `p_alertQuantity` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_tax` varchar(255) NOT NULL,
  `p_taxMethod` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_product` (`p_id`, `p_type`, `p_code`, `p_name`, `p_category`, `p_subCategory`, `p_detail`, `p_image`, `p_unit`, `p_cost`, `p_price`, `p_supplier`, `p_model`, `p_alertQuantity`, `p_quantity`, `p_tax`, `p_taxMethod`, `hold_id`, `u_branch`) VALUES ('33', 'Service', '70000', 'Samsung Galaxy S10', '', '123', 'Test', '0ee96f390701b0d23245af0e4a7e9c72.png', '12', '11.00', '21.00', 'Padil Bundle', 'Service', '11', '1000', 'Service', 'Service', '6505', 'bangi');
INSERT INTO `tbl_product` (`p_id`, `p_type`, `p_code`, `p_name`, `p_category`, `p_subCategory`, `p_detail`, `p_image`, `p_unit`, `p_cost`, `p_price`, `p_supplier`, `p_model`, `p_alertQuantity`, `p_quantity`, `p_tax`, `p_taxMethod`, `hold_id`, `u_branch`) VALUES ('34', 'Service', '70000', 'Battery', '', '110', 'Test', '2209b865f245e7ab1d244a5434a02664.png', '12', '11.00', '21.00', 'Kedai Ustaz', 'Service', '11', '0', 'Service', 'Service', '4016', 'bangi');
INSERT INTO `tbl_product` (`p_id`, `p_type`, `p_code`, `p_name`, `p_category`, `p_subCategory`, `p_detail`, `p_image`, `p_unit`, `p_cost`, `p_price`, `p_supplier`, `p_model`, `p_alertQuantity`, `p_quantity`, `p_tax`, `p_taxMethod`, `hold_id`, `u_branch`) VALUES ('35', 'Service', '43650', 'Battery', '42', '110', 'Test', '6d545a690ffbdb57c4796817a012b581.png', '12', '11.00', '29.00', 'Kedai Ustaz', 'Service', '11', '21', 'Service', 'Service', '143', 'bangi');
INSERT INTO `tbl_product` (`p_id`, `p_type`, `p_code`, `p_name`, `p_category`, `p_subCategory`, `p_detail`, `p_image`, `p_unit`, `p_cost`, `p_price`, `p_supplier`, `p_model`, `p_alertQuantity`, `p_quantity`, `p_tax`, `p_taxMethod`, `hold_id`, `u_branch`) VALUES ('36', 'Service', '43650', 'Camera Sony Xperia M', '42', '124', 'Test21', 'a27a64fee77ddf6a27132b5f345f58e5.png', '12', '11.00', '21.00', 'Kedai Ustaz', 'Service', '11', '4', 'Service', 'Service', '249', 'bangi');
INSERT INTO `tbl_product` (`p_id`, `p_type`, `p_code`, `p_name`, `p_category`, `p_subCategory`, `p_detail`, `p_image`, `p_unit`, `p_cost`, `p_price`, `p_supplier`, `p_model`, `p_alertQuantity`, `p_quantity`, `p_tax`, `p_taxMethod`, `hold_id`, `u_branch`) VALUES ('37', 'Service', '70000', 'Camera Sony Xperia Z', '60', '124', 'Test', 'fb28eea7508dc5d2c87cc1e2332c5c9f.png', '12', '11.00', '21.00', 'Nabil', 'Service', '17', '21', 'Service', 'Service', '6294', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_purchase
#

DROP TABLE IF EXISTS `tbl_purchase`;

CREATE TABLE `tbl_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pur_date` datetime NOT NULL,
  `pur_ref` varchar(255) NOT NULL,
  `pur_status` varchar(255) NOT NULL,
  `pur_file` varchar(255) NOT NULL,
  `purSupplier` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `pur_total` double(9,2) NOT NULL,
  `pur_tax` varchar(255) NOT NULL,
  `pur_discount` varchar(255) NOT NULL,
  `pur_ship` varchar(255) NOT NULL,
  `pur_note` varchar(255) NOT NULL,
  `afterDisc` double(9,2) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_purchase` (`id`, `pur_date`, `pur_ref`, `pur_status`, `pur_file`, `purSupplier`, `hold_id`, `pur_total`, `pur_tax`, `pur_discount`, `pur_ship`, `pur_note`, `afterDisc`, `u_branch`) VALUES ('41', '2019-11-27 12:13:36', '018273', 'Pending', 'c8b7c72906408354df96f63179d6d0c9.png', 'Kedai Ustaz', '982794647', '26.00', 'VAT', '10', 'test', '<p>testing</p>', '0.00', 'bangi');
INSERT INTO `tbl_purchase` (`id`, `pur_date`, `pur_ref`, `pur_status`, `pur_file`, `purSupplier`, `hold_id`, `pur_total`, `pur_tax`, `pur_discount`, `pur_ship`, `pur_note`, `afterDisc`, `u_branch`) VALUES ('42', '2019-12-12 01:20:51', '018273', 'Pending', '4ea5c0caff1556213b1d8f22e412e16d.png', 'Kedai Ustaz', '1590520413', '26.00', 'VAT', '10', 'test', '<p>Test</p>', '23.40', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_purchase_item
#

DROP TABLE IF EXISTS `tbl_purchase_item`;

CREATE TABLE `tbl_purchase_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemPrice` double(9,2) NOT NULL,
  `itemQuantity` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('75', '', 'Plug In All Android (100008)  ', '17.00', '1', '1033392947', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('76', '', 'Plug In All Android (100010)  ', '9.00', '1', '1033392947', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('80', '', 'Plug In All Android (100008)  ', '17.00', '1', '397955798', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('81', '', 'Plug In All Android (100010)  ', '9.00', '1', '397955798', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('83', '1', 'Plug In All Android (100008)  ', '17.00', '1', '1961745983', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('85', '1', 'Plug In All Android (100008)  ', '17.00', '1', '1252514272', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('86', '2', 'Plug In All Android (100010)  ', '9.00', '1', '1252514272', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('87', '1', 'Plug In All Android (100008)  ', '17.00', '1', '1252514272', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('88', '1', 'Plug In All Android (100008)  ', '17.00', '1', '666793347', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('89', '2', 'Plug In All Android (100010)  ', '9.00', '1', '666793347', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('90', '1', 'Plug In All Android (100008)  ', '17.00', '1', '2057061476', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('91', '2', 'Plug In All Android (100010)  ', '9.00', '1', '2057061476', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('92', '1', 'Plug In All Android (100008)  ', '17.00', '1', '2057061476', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('93', '1', 'Plug In All Android (100008)  ', '17.00', '1', '982794647', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('94', '2', 'Plug In All Android (100010)  ', '9.00', '1', '982794647', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('95', '1', 'Plug In All Android (100008)  ', '17.00', '1', '34557229', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('96', '2', 'Plug In All Android (100010)  ', '9.00', '1', '34557229', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('97', '1', 'Plug In All Android (100008)  ', '17.00', '1', '1590520413', 'bangi');
INSERT INTO `tbl_purchase_item` (`id`, `itemID`, `itemName`, `itemPrice`, `itemQuantity`, `hold_id`, `u_branch`) VALUES ('98', '2', 'Plug In All Android (100010)  ', '9.00', '1', '1590520413', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_repair_details
#

DROP TABLE IF EXISTS `tbl_repair_details`;

CREATE TABLE `tbl_repair_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hold_id` varchar(255) NOT NULL,
  `r_diagnostics` varchar(255) NOT NULL,
  `r_repairstatus` varchar(255) NOT NULL,
  `r_repairno` varchar(255) NOT NULL,
  `r_file` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('42', '126969499', 'Test99', 'Done by Asyraf', 'REPAIR3653', '02ac426c12d423abf1f5277f31bfadcc.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('43', '56122533', 'Test11', 'Done by Asyraf', 'REPAIR281', '0504fa5bd460b1a26ca7b63cfa7d0052.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('44', '2107685547', 'Test17', 'New Job', 'REPAIR9222', 'aae51a015b0fa8458f794eae016e8cc8.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('45', '1083033830', 'Test99', 'Done by Asyraf', 'REPAIR3015', 'e35f900d8c11b09ca81833e8d0f2114f.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('46', '1012177755', 'Test99', 'Done by Asyraf', 'REPAIR5549', '20b44c250ee5cef7bc96da8ebb08606d.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('47', '530492861', 'Test11', 'Done by Asyraf', 'REPAIR5261', '086ffd38b385128fbb58469421cfbcb5.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('48', '1831098617', 'Test13', 'Done by Asyraf', 'REPAIR2915', '9b8d57abbc2e8e1bb088d412976001e1.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('49', '387644351', 'Test99', 'Done by Asyraf', 'REPAIR1519', '3db2a7ce5eb33440b42488c22590345c.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('50', '1378917563', 'Test99', 'Done by Asyraf', 'REPAIR1468', '117a6489758e323f1ade966a47bd5712.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('51', '907741208', 'Test99', 'Done by Asyraf', 'REPAIR5092', '117a6489758e323f1ade966a47bd5712.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('52', '1901711216', 'Test99', 'Done by Asyraf', 'REPAIR8133', '09b65c4c14fed60a457d58c80fc57ca9.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('53', '614690892', 'Test99', 'Done by Asyraf', 'REPAIR1817', 'e5267e8d544d58a2022107a8b5158102.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('55', '632833885', 'Test99', 'Done by Asyraf', 'REPAIR1749', '233b46268bfff54e0eba3efc2b9045df.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('57', '806280801', 'Test10101', 'Done by Asyraf', 'REPAIR4499', '38cc93ed4107b06a1631306be32a1c4c.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('61', '255465711', 'Test', 'Done by Asyraf', 'REPAIR9305', '3f66118044f5c457c3d4a3ebcc24dc41.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('62', '692491403', 'Test', 'Done by Asyraf', 'REPAIR7870', '667c4acb4d14942f9c3221e19a511d85.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('63', '291249039', 'Test', 'Done by Asyraf', 'REPAIR9021', '8473d92eff8636be17fc96987df09989.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('64', '1303954294', 'Test', 'Done by Asyraf', 'REPAIR6441', '9efae7767e21ac3ec7445738cddcb3b7.png', '');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('65', '2086295926', '', 'Done by Ashrul', 'REPAIR5886', 'd35b7bafbc7bbc7bbc762bbea87bab7c.png', 'bangi');
INSERT INTO `tbl_repair_details` (`id`, `hold_id`, `r_diagnostics`, `r_repairstatus`, `r_repairno`, `r_file`, `u_branch`) VALUES ('66', '1964831362', 'Test', 'Done by Ashrul', 'REPAIR7087', 'b7ffbb45ff5da1923b7b80c247017452.png', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_repair_status
#

DROP TABLE IF EXISTS `tbl_repair_status`;

CREATE TABLE `tbl_repair_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statusName` varchar(255) NOT NULL,
  `statusDescription` varchar(255) NOT NULL,
  `statusBGColor` varchar(255) NOT NULL,
  `statusTextColor` varchar(255) NOT NULL,
  `position_order` int(11) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_repair_status` (`id`, `statusName`, `statusDescription`, `statusBGColor`, `statusTextColor`, `position_order`, `u_branch`) VALUES ('7', '<button class=\"btn\" style=\"background-color:#516253;color: #827362;font-weight: bold;\">Done by Pian</button>', '', '#516253', '#827362', '0', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_reparation
#

DROP TABLE IF EXISTS `tbl_reparation`;

CREATE TABLE `tbl_reparation` (
  `r_code` varchar(255) NOT NULL DEFAULT '0',
  `c_id` int(11) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `r_email` varchar(255) NOT NULL,
  `r_imei` varchar(255) DEFAULT NULL,
  `r_telephone` int(12) DEFAULT NULL,
  `r_defect` varchar(255) DEFAULT NULL,
  `r_model` varchar(255) DEFAULT NULL,
  `r_opened` datetime DEFAULT NULL,
  `r_status` varchar(255) DEFAULT NULL,
  `r_assigned` varchar(255) DEFAULT NULL,
  `r_created` varchar(255) DEFAULT NULL,
  `r_lastmodified` varchar(255) DEFAULT NULL,
  `r_file` varchar(255) NOT NULL,
  `r_total` double(9,2) NOT NULL,
  `r_paid` double(9,2) NOT NULL,
  `r_repairno` varchar(255) DEFAULT NULL,
  `r_category` varchar(255) NOT NULL,
  `r_manufacturer` varchar(255) NOT NULL,
  `r_servicecharge` double(9,2) NOT NULL,
  `r_closedate` varchar(255) NOT NULL,
  `r_period` varchar(255) NOT NULL,
  `r_comment` varchar(255) NOT NULL,
  `r_taxtype` varchar(255) NOT NULL,
  `r_subtotal` double(9,2) NOT NULL,
  `r_tax` double(9,2) NOT NULL,
  `r_signature` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`r_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_reparation` (`r_code`, `c_id`, `r_name`, `r_email`, `r_imei`, `r_telephone`, `r_defect`, `r_model`, `r_opened`, `r_status`, `r_assigned`, `r_created`, `r_lastmodified`, `r_file`, `r_total`, `r_paid`, `r_repairno`, `r_category`, `r_manufacturer`, `r_servicecharge`, `r_closedate`, `r_period`, `r_comment`, `r_taxtype`, `r_subtotal`, `r_tax`, `r_signature`, `hold_id`, `u_branch`) VALUES ('CUS00068', '50', 'Syraf', 'asyrafsam14@gmail.com', '155534253455456', '172563723', 'Screen Break', 'Vivo S1', '2019-12-16 12:31:08', 'Pending', 'Asyraf', 'Aliff', 'Aliff', '', '53.00', '53.00', 'REPAIR7870', 'Camera', 'Xiaomi', '10.00', '11/30/2019', '3 Week', 'Test', 'VAT', '43.00', '10.00', 'image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAuMAAADICAYAAABCie94AAAgAElEQVR4Xu3dCXxcVb0H8N//3EnSppR9EZBHRUC2KrKWTUFc4flEfVZxeyBgmplQ1raZmbQMdJaE1qJpM2kExIcKzz5UwKegUmVTaJGtQGUVECRYoEixbZa55/8+Z5JA2qZtkiaTOzO/+ZhPt3vP+f+/5xb/PTn3HAE/FKAABSiAtra2ivZ1lRNCazsmGO', '692491403', 'bangi');
INSERT INTO `tbl_reparation` (`r_code`, `c_id`, `r_name`, `r_email`, `r_imei`, `r_telephone`, `r_defect`, `r_model`, `r_opened`, `r_status`, `r_assigned`, `r_created`, `r_lastmodified`, `r_file`, `r_total`, `r_paid`, `r_repairno`, `r_category`, `r_manufacturer`, `r_servicecharge`, `r_closedate`, `r_period`, `r_comment`, `r_taxtype`, `r_subtotal`, `r_tax`, `r_signature`, `hold_id`, `u_branch`) VALUES ('CUS00069', '51', 'Nabil', 'asyrafsam14@gmail.com', '175534253455456', '172563723', 'Screen Break', 'Vivo S1', '2019-12-16 12:34:29', 'Approved by Aliff', 'Asyraf', 'Aliff', 'Aliff', '', '36.00', '36.00', 'REPAIR9021', 'Camera', 'Xiaomi', '10.00', '12/19/2019', '3 Week', 'Test', 'VAT', '26.00', '10.00', 'image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAuMAAADICAYAAABCie94AAAgAElEQVR4Xu3dCXhcZb0/8O/vnZmkZW0LpRRZCoKiiCuLIFAQLosCgksVFe8FwTaTwr0gpZmZBAaSWdKictPOpBGUe6uAf1A2RWSRRYoFWcWLCmUpuyC2pQs0yZz393/eSULTtCXrLGfme54nT0Jzzvv+3s97Sr85Oec9Am4UoAAFKEABClCAAhSgQEkEpC', '291249039', 'bangi');
INSERT INTO `tbl_reparation` (`r_code`, `c_id`, `r_name`, `r_email`, `r_imei`, `r_telephone`, `r_defect`, `r_model`, `r_opened`, `r_status`, `r_assigned`, `r_created`, `r_lastmodified`, `r_file`, `r_total`, `r_paid`, `r_repairno`, `r_category`, `r_manufacturer`, `r_servicecharge`, `r_closedate`, `r_period`, `r_comment`, `r_taxtype`, `r_subtotal`, `r_tax`, `r_signature`, `hold_id`, `u_branch`) VALUES ('CUS00070', '49', 'Pian', 'asyrafsam14@gmail.com', '155534253455456', '191725352', 'Screen Break', 'Redmi Note 7', '2019-12-18 05:36:16', 'Pending', 'Asyraf', 'Aliff', 'Aliff', '', '70.00', '70.00', 'REPAIR6441', 'Camera', 'Xiaomi', '10.00', '11/30/2019', '1 Week', 'Test', 'VAT', '60.00', '10.00', 'image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAuMAAADICAYAAABCie94AAAgAElEQVR4Xu3dCZhcVZk38P97bvWWDQKEBAFlcxl20LAr++Y24yigzjeOOmDS1QEhkHRtgQqppTtBVEhVExBxfMBRcMQZcRRGAiIKRJYIgrKIaIIEEkMCaZLurnve7znV3ZB0Okl3p/b61/MUXV117jnv+zuX7je37z1XwAcFKEABClCAAhSgAAUoUBYBKc', '1303954294', 'bangi');
INSERT INTO `tbl_reparation` (`r_code`, `c_id`, `r_name`, `r_email`, `r_imei`, `r_telephone`, `r_defect`, `r_model`, `r_opened`, `r_status`, `r_assigned`, `r_created`, `r_lastmodified`, `r_file`, `r_total`, `r_paid`, `r_repairno`, `r_category`, `r_manufacturer`, `r_servicecharge`, `r_closedate`, `r_period`, `r_comment`, `r_taxtype`, `r_subtotal`, `r_tax`, `r_signature`, `hold_id`, `u_branch`) VALUES ('CUS00071', '40', '', 'on', '155534253455456', '0', 'Screen Break', 'Redmi Note 7', '2019-12-26 03:44:26', 'Pending', 'Asyraf', 'Aliff', 'Aliff', '', '37.00', '27.00', 'REPAIR5886', 'Camera', 'Xiaomi', '11.00', '12/26/2019', '1 Week', 'Test', 'VAT', '26.00', '11.00', 'image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAuMAAADICAYAAABCie94AAAgAElEQVR4Xu3dC3hV1Zk38P+79kkCVrEqauu9HbEqiq0XkItBRO303uJlOtNp52qRBJjRr5jknKBHyTkn0Y5tgSTQattpO1Or0JuoVYEQCCTgDUHrpRdEpzcvSFGEJGev93vWTgInhwBJIDmX/PfznCc+ZO+93vVbG3mzsva7BDwoQAEKUIACFKAABShAgY', '2086295926', 'bangi');
INSERT INTO `tbl_reparation` (`r_code`, `c_id`, `r_name`, `r_email`, `r_imei`, `r_telephone`, `r_defect`, `r_model`, `r_opened`, `r_status`, `r_assigned`, `r_created`, `r_lastmodified`, `r_file`, `r_total`, `r_paid`, `r_repairno`, `r_category`, `r_manufacturer`, `r_servicecharge`, `r_closedate`, `r_period`, `r_comment`, `r_taxtype`, `r_subtotal`, `r_tax`, `r_signature`, `hold_id`, `u_branch`) VALUES ('CUS00072', '50', 'Syraf', 'asyrafsam14@gmail.com', '155534253455456', '172563723', 'Screen Break', 'Redmi Note 7', '2019-12-26 04:54:20', 'Pending', 'Asyraf', 'Aliff', 'Aliff', '', '36.00', '6.00', 'REPAIR7087', 'Camera', 'Xiaomi', '10.00', '11/29/2019', '1 Week', 'Test', 'VAT', '26.00', '10.00', '', '1964831362', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_reparation_item
#

DROP TABLE IF EXISTS `tbl_reparation_item`;

CREATE TABLE `tbl_reparation_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` varchar(255) NOT NULL,
  `hold_id` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemQuantity` varchar(255) NOT NULL,
  `itemPrice` double(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_reparation_item` (`id`, `id_item`, `hold_id`, `itemName`, `itemQuantity`, `itemPrice`) VALUES ('107', '1', '126969499', 'Plug In All Android (100008)  ', '1', '17.00');
INSERT INTO `tbl_reparation_item` (`id`, `id_item`, `hold_id`, `itemName`, `itemQuantity`, `itemPrice`) VALUES ('108', '2', '126969499', 'Plug In All Android (100010)  ', '1', '9.00');
INSERT INTO `tbl_reparation_item` (`id`, `id_item`, `hold_id`, `itemName`, `itemQuantity`, `itemPrice`) VALUES ('109', '2', '56122533', 'Plug In All Android (100010)  ', '1', '9.00');
INSERT INTO `tbl_reparation_item` (`id`, `id_item`, `hold_id`, `itemName`, `itemQuantity`, `itemPrice`) VALUES ('110', '1', '56122533', 'Plug In All Android (100008)  ', '1', '17.00');
INSERT INTO `tbl_reparation_item` (`id`, `id_item`, `hold_id`, `itemName`, `itemQuantity`, `itemPrice`) VALUES ('111', '2', '56122533', 'Plug In All Android (100010)  ', '1', '9.00');
INSERT INTO `tbl_reparation_item` (`id`, `id_item`, `hold_id`, `itemName`, `itemQuantity`, `itemPrice`) VALUES ('112', '1', '126969499', 'Plug In All Android (100008)  ', '1', '17.00');
INSERT INTO `tbl_reparation_item` (`id`, `id_item`, `hold_id`, `itemName`, `itemQuantity`, `itemPrice`) VALUES ('113', '2', '126969499', 'Plug In All Android (100010)  ', '1', '9.00');
INSERT INTO `tbl_reparation_item` (`id`, `id_item`, `hold_id`, `itemName`, `itemQuantity`, `itemPrice`) VALUES ('114', '1', '56122533', 'Plug In All Android (100008)  ', '1', '17.00');
INSERT INTO `tbl_reparation_item` (`id`, `id_item`, `hold_id`, `itemName`, `itemQuantity`, `itemPrice`) VALUES ('115', '2', '56122533', 'Plug In All Android (100010)  ', '1', '9.00');


#
# TABLE STRUCTURE FOR: tbl_reparation_log
#

DROP TABLE IF EXISTS `tbl_reparation_log`;

CREATE TABLE `tbl_reparation_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hold_id` varchar(255) NOT NULL,
  `r_repairno` varchar(255) NOT NULL,
  `log_date` datetime NOT NULL,
  `log_user` varchar(255) NOT NULL,
  `log_action` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('1', '1083033830', 'REPAIR3015', '2019-12-05 02:51:49', 'Aliff', 'Insert Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('2', '1012177755', 'REPAIR5549', '0000-00-00 00:00:00', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('3', '530492861', 'REPAIR5261', '0000-00-00 00:00:00', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('4', '1831098617', 'REPAIR2915', '2019-12-05 10:22:19', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('5', '1083033830', 'REPAIR3015', '2019-12-05 10:38:33', 'Aliff', 'Status Update', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('6', '126969499', 'REPAIR3653', '2019-12-05 11:04:51', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('7', '', 'REPAIR3653', '2019-12-05 12:18:02', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('8', '', 'REPAIR3653', '2019-12-05 12:20:47', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('9', '126969499', 'REPAIR3653', '2019-12-05 12:24:41', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('10', '', 'REPAIR3653', '2019-12-05 12:25:03', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('11', '2107685547', 'REPAIR9222', '2019-12-05 02:07:40', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('12', '', 'REPAIR9222', '2019-12-05 02:07:58', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('13', '1831098617', 'REPAIR2915', '2019-12-05 02:13:27', 'Aliff', 'Reparation updated', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('14', '2107685547', 'REPAIR9222', '2019-12-05 02:13:38', 'Aliff', 'Reparation updated', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('15', '2107685547', 'REPAIR9222', '2019-12-05 02:15:45', 'Aliff', 'Reparation updated', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('16', '2107685547', 'REPAIR9222', '2019-12-05 02:16:00', 'Aliff', 'Reparation updated', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('17', '2107685547', 'REPAIR9222', '2019-12-05 02:37:50', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('18', '2107685547', 'REPAIR9222', '2019-12-05 02:39:36', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('19', '2107685547', 'REPAIR9222', '2019-12-05 02:39:54', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('20', '2107685547', 'REPAIR9222', '2019-12-05 04:41:17', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('21', '2107685547', 'REPAIR9222', '2019-12-05 04:42:31', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('22', '2107685547', 'REPAIR9222', '2019-12-05 04:43:20', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('23', '2107685547', 'REPAIR9222', '2019-12-05 04:46:14', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('24', '2107685547', 'REPAIR9222', '2019-12-05 04:48:43', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('25', '2107685547', 'REPAIR9222', '2019-12-05 04:48:58', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('26', '2107685547', 'REPAIR9222', '2019-12-05 04:49:55', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('27', '2107685547', 'REPAIR9222', '2019-12-05 04:54:04', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('28', '2107685547', 'REPAIR9222', '2019-12-05 04:54:04', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('29', '2107685547', 'REPAIR9222', '2019-12-05 04:56:02', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('30', '2107685547', 'REPAIR9222', '2019-12-05 04:56:02', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('31', '2107685547', 'REPAIR9222', '2019-12-05 04:57:28', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('32', '387644351', 'REPAIR1519', '2019-12-05 05:07:24', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('33', '387644351', 'REPAIR1519', '2019-12-05 05:08:08', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('34', '387644351', 'REPAIR1519', '2019-12-05 05:08:08', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('35', '387644351', 'REPAIR1519', '2019-12-05 05:08:44', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('36', '387644351', 'REPAIR1519', '2019-12-05 05:09:20', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('37', '387644351', 'REPAIR1519', '2019-12-05 05:09:20', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('38', '387644351', 'REPAIR1519', '2019-12-05 05:11:29', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('39', '1378917563', 'REPAIR1468', '2019-12-05 08:07:15', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('40', '387644351', 'REPAIR1519', '2019-12-05 08:12:43', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('41', '1378917563', 'REPAIR1468', '2019-12-05 08:13:22', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('42', '907741208', 'REPAIR5092', '2019-12-05 08:24:40', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('43', '907741208', 'REPAIR5092', '2019-12-05 08:25:57', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('44', '907741208', 'REPAIR5092', '2019-12-05 08:27:50', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('45', '1378917563', 'REPAIR1468', '2019-12-06 03:38:08', 'Aliff', 'Status Update', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('46', '1378917563', 'REPAIR1468', '2019-12-06 03:40:10', 'Aliff', 'Status Update', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('47', '1901711216', 'REPAIR8133', '2019-12-06 03:57:59', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('48', '907741208', 'REPAIR5092', '2019-12-06 05:11:14', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('49', '614690892', 'REPAIR1817', '2019-12-06 05:37:56', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('50', '1788919830', 'REPAIR3607', '2019-12-06 05:38:38', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('51', '1788919830', 'REPAIR3607', '2019-12-06 05:41:02', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('52', '1788919830', 'REPAIR3607', '2019-12-06 05:41:24', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('53', '632833885', 'REPAIR1749', '2019-12-07 01:10:44', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('54', '632833885', 'REPAIR1749', '2019-12-07 01:11:56', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('55', '', '', '2019-12-07 10:31:05', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('56', '', '', '2019-12-07 10:31:14', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('57', '', '', '2019-12-07 10:31:50', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('58', '', '', '2019-12-07 10:32:42', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('59', '', '', '2019-12-07 10:35:16', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('60', '', '', '2019-12-07 10:35:27', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('61', '', '40', '2019-12-07 10:40:49', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('62', '364061962', 'REPAIR420', '2019-12-07 05:43:29', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('63', '364061962', 'REPAIR420', '2019-12-07 05:44:17', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('64', '806280801', 'REPAIR4499', '2019-12-07 05:44:36', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('65', '806280801', 'REPAIR4499', '2019-12-07 05:48:42', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('66', '806280801', 'REPAIR4499', '2019-12-07 05:49:00', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('67', '', '45', '2019-12-07 10:50:30', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('68', '806280801', 'REPAIR4499', '2019-12-07 05:52:33', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('69', '', '44', '2019-12-07 10:53:05', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('70', '', 'REPAIR4499', '2019-12-07 10:55:14', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('71', '806280801', 'REPAIR4499', '2019-12-07 06:10:21', 'Aliff', 'Status Update', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('72', '1538848305', 'REPAIR2141', '2019-12-07 06:11:31', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('73', '1538848305', 'REPAIR2141', '2019-12-07 06:12:29', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('74', '476615075', 'REPAIR5684', '2019-12-16 12:55:49', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('75', '476615075', 'REPAIR5684', '2019-12-16 11:19:54', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('76', '476615075', 'REPAIR5684', '2019-12-16 11:20:14', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('77', '476615075', 'REPAIR5684', '2019-12-16 11:27:43', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('78', '476615075', 'REPAIR5684', '2019-12-16 11:48:41', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('79', '476615075', 'REPAIR5684', '2019-12-16 11:57:20', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('80', '476615075', 'REPAIR5684', '2019-12-16 11:57:35', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('81', '', 'REPAIR5684', '2019-12-16 05:21:48', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('82', '', 'REPAIR5684', '2019-12-16 05:24:23', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('83', '476615075', 'REPAIR5684', '2019-12-16 12:24:35', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('84', '476615075', 'REPAIR5684', '2019-12-16 12:24:54', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('85', '', 'REPAIR5684', '2019-12-16 05:25:19', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('86', '476615075', 'REPAIR5684', '2019-12-16 12:25:22', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('87', '', 'REPAIR5684', '2019-12-16 05:25:59', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('88', '476615075', 'REPAIR5684', '2019-12-16 12:26:03', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('89', '1538848305', 'REPAIR2141', '2019-12-16 12:26:18', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('90', '', 'REPAIR2141', '2019-12-16 05:26:42', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('91', '', 'REPAIR2141', '2019-12-16 05:26:52', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('92', '', 'REPAIR2141', '2019-12-16 05:26:58', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('93', '', 'REPAIR2141', '2019-12-16 05:27:04', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('94', '', 'REPAIR2141', '2019-12-16 05:27:10', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('95', '1997814573', 'REPAIR1112', '2019-12-16 12:27:16', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('96', '1997814573', 'REPAIR1112', '2019-12-16 12:28:11', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('97', '1997814573', 'REPAIR1112', '2019-12-16 12:28:25', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('98', '', 'REPAIR1112', '2019-12-16 05:28:51', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('99', '', 'REPAIR5684', '2019-12-16 05:28:57', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('100', '', 'REPAIR1112', '2019-12-16 05:29:38', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('101', '', 'REPAIR5684', '2019-12-16 05:30:01', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('102', '255465711', 'REPAIR9305', '2019-12-16 12:30:02', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('103', '', 'REPAIR9305', '2019-12-16 05:31:06', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('104', '692491403', 'REPAIR7870', '2019-12-16 12:31:08', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('105', '692491403', 'REPAIR7870', '2019-12-16 12:32:24', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('106', '', 'REPAIR7870', '2019-12-16 05:32:46', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('107', '291249039', 'REPAIR9021', '2019-12-16 12:34:29', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('108', '291249039', 'REPAIR9021', '2019-12-16 12:35:09', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('109', '', 'REPAIR9021', '2019-12-16 05:35:43', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('110', '291249039', 'REPAIR9021', '2019-12-16 12:35:45', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('111', '291249039', 'REPAIR9021', '2019-12-17 09:45:54', 'Aliff', 'Status Update', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('112', '1538848305', 'REPAIR2141', '2019-12-17 09:46:22', 'Aliff', 'Status Update', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('113', '', 'REPAIR9021', '2019-12-18 09:24:01', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('114', '291249039', 'REPAIR9021', '2019-12-18 04:24:17', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('115', '291249039', 'REPAIR9021', '2019-12-18 04:24:34', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('116', '1303954294', 'REPAIR6441', '2019-12-18 05:36:16', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('117', '1303954294', 'REPAIR6441', '2019-12-18 05:37:57', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('118', '1303954294', 'REPAIR6441', '2019-12-18 05:39:56', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('119', '', 'REPAIR6441', '2019-12-18 10:40:49', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('120', '476615075', 'REPAIR5684', '2019-12-22 10:39:12', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('121', '1303954294', 'REPAIR6441', '2019-12-22 10:39:34', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('122', '692491403', 'REPAIR7870', '2019-12-22 10:40:55', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('123', '692491403', 'REPAIR7870', '2019-12-22 10:41:50', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('124', '', 'REPAIR5684', '2019-12-22 05:17:45', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('125', '476615075', 'REPAIR5684', '2019-12-23 12:17:48', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('126', '', 'REPAIR5684', '2019-12-22 05:18:51', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('127', '476615075', 'REPAIR5684', '2019-12-23 12:18:53', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('128', '', 'REPAIR5684', '2019-12-22 05:20:49', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('129', '1303954294', 'REPAIR6441', '2019-12-23 12:21:10', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('130', '692491403', 'REPAIR7870', '2019-12-23 12:21:49', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('131', '692491403', 'REPAIR7870', '2019-12-23 12:22:06', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('132', '', 'REPAIR7870', '2019-12-22 05:22:44', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('133', '', 'REPAIR7870', '2019-12-22 05:22:53', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('134', '', 'REPAIR7870', '2019-12-22 05:23:11', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('135', '', 'REPAIR7870', '2019-12-22 05:23:17', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('136', '692491403', 'REPAIR7870', '2019-12-23 12:23:20', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('137', '692491403', 'REPAIR7870', '2019-12-23 09:50:24', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('138', '', 'REPAIR7870', '2019-12-23 02:50:58', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('139', '', 'REPAIR7870', '2019-12-23 02:51:04', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('140', '692491403', 'REPAIR7870', '2019-12-23 09:51:07', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('141', '', 'REPAIR9021', '2019-12-23 02:58:33', 'Aliff', 'Payment Deleted', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('142', '291249039', 'REPAIR9021', '2019-12-26 03:41:00', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('143', '2086295926', 'REPAIR5886', '2019-12-26 03:44:26', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('144', '2086295926', 'REPAIR5886', '2019-12-26 03:44:47', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('145', '2086295926', 'REPAIR5886', '2019-12-26 03:46:17', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('146', '2086295926', 'REPAIR5886', '2019-12-26 03:47:54', 'Aliff', 'Payment Added', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('147', '1964831362', 'REPAIR7087', '2019-12-26 04:54:20', 'Aliff', 'Insert New Reparation', 'bangi');
INSERT INTO `tbl_reparation_log` (`id`, `hold_id`, `r_repairno`, `log_date`, `log_user`, `log_action`, `u_branch`) VALUES ('148', '1964831362', 'REPAIR7087', '2019-12-26 04:55:16', 'Aliff', 'Payment Added', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_reparation_seq
#

DROP TABLE IF EXISTS `tbl_reparation_seq`;

CREATE TABLE `tbl_reparation_seq` (
  `r_code` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`r_code`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('1');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('2');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('3');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('4');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('5');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('6');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('7');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('8');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('9');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('10');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('11');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('12');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('13');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('14');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('15');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('16');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('17');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('18');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('19');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('20');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('22');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('23');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('24');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('25');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('26');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('27');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('28');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('29');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('30');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('31');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('32');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('33');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('34');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('35');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('36');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('37');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('38');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('39');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('40');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('41');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('42');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('43');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('44');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('46');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('47');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('48');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('49');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('50');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('51');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('52');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('53');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('54');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('55');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('56');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('57');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('58');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('59');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('60');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('61');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('62');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('63');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('64');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('65');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('66');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('67');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('68');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('69');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('70');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('71');
INSERT INTO `tbl_reparation_seq` (`r_code`) VALUES ('72');


#
# TABLE STRUCTURE FOR: tbl_reparation_status
#

DROP TABLE IF EXISTS `tbl_reparation_status`;

CREATE TABLE `tbl_reparation_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statusName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_reparation_status` (`id`, `statusName`) VALUES ('1', 'New Job');
INSERT INTO `tbl_reparation_status` (`id`, `statusName`) VALUES ('2', 'Process');
INSERT INTO `tbl_reparation_status` (`id`, `statusName`) VALUES ('3', 'Done by Asyraf');


#
# TABLE STRUCTURE FOR: tbl_revenue
#

DROP TABLE IF EXISTS `tbl_revenue`;

CREATE TABLE `tbl_revenue` (
  `revenue_id` int(11) NOT NULL AUTO_INCREMENT,
  `revenue_date` date NOT NULL,
  `revenue_subtotal` double(9,2) NOT NULL,
  `revenue_holdid` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`revenue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('1', '2019-11-13', '70.00', 'REPAIR6441', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('2', '2019-12-24', '133.00', 'POS9218', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('3', '2019-11-20', '147.00', 'POS1189', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('4', '0000-00-00', '0.00', 'POS417', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('5', '2019-12-25', '0.00', 'POS3626', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('6', '0000-00-00', '0.00', 'POS9841', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('7', '2019-12-22', '11.00', 'POS4868', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('8', '2019-12-22', '11.00', 'POS563', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('9', '2019-12-17', '38.00', 'POS7193', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('10', '2019-12-17', '38.00', 'POS7193', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('11', '2019-12-17', '38.00', 'POS7193', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('12', '2019-12-25', '0.00', 'POS1610', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('13', '2019-12-22', '11.00', 'POS3342', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('14', '2019-12-22', '11.00', 'POS3342', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('15', '2019-12-22', '21.00', 'POS2128', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('16', '2019-12-22', '21.00', 'POS4446', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('17', '2019-12-22', '21.00', 'POS4446', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('18', '2019-12-22', '11.00', 'POS4330', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('19', '2019-12-22', '11.00', 'POS8009', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('20', '2019-12-22', '11.00', 'POS8009', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('21', '2019-12-22', '21.00', 'POS5855', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('22', '2019-12-22', '21.00', 'POS6009', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('23', '0000-00-00', '0.00', 'REPAIR4720', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('24', '2019-12-26', '27.00', 'REPAIR5886', 'bangi');
INSERT INTO `tbl_revenue` (`revenue_id`, `revenue_date`, `revenue_subtotal`, `revenue_holdid`, `u_branch`) VALUES ('25', '2019-12-25', '6.00', 'REPAIR7087', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_supplier
#

DROP TABLE IF EXISTS `tbl_supplier`;

CREATE TABLE `tbl_supplier` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` text NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `s_country` varchar(255) NOT NULL,
  `s_postal` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_company` varchar(255) NOT NULL,
  `s_city` varchar(255) NOT NULL,
  `s_state` varchar(255) NOT NULL,
  `s_phone` int(11) NOT NULL,
  `s_vat` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_supplier` (`s_id`, `s_name`, `s_address`, `s_country`, `s_postal`, `s_email`, `s_company`, `s_city`, `s_state`, `s_phone`, `s_vat`, `u_branch`) VALUES ('2', 'Kedai Ustaz', 'Salak Selatan', 'Malaysia', '70000', 'nabil@gmail.com', 'UTeM', 'Sepang', 'NEGERI SEMBILAN', '172563723', '123123123', '');
INSERT INTO `tbl_supplier` (`s_id`, `s_name`, `s_address`, `s_country`, `s_postal`, `s_email`, `s_company`, `s_city`, `s_state`, `s_phone`, `s_vat`, `u_branch`) VALUES ('4', 'Padil Bundle', 'Salak Selatan', 'Malaysia', '70000', 'nabil@gmail.com', 'UTeM', 'Sepang', 'NEGERI SEMBILAN', '172563723', '123123123', 'bangi');
INSERT INTO `tbl_supplier` (`s_id`, `s_name`, `s_address`, `s_country`, `s_postal`, `s_email`, `s_company`, `s_city`, `s_state`, `s_phone`, `s_vat`, `u_branch`) VALUES ('5', 'Bundle', 'Test', 'test', '72633', 'test@gmail.com', 'test', 'test', 'test', '18273723', 'test', 'bangi');


#
# TABLE STRUCTURE FOR: tbl_user
#

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `ul_name` varchar(255) NOT NULL,
  `u_image` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_phone` int(15) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_role` varchar(255) NOT NULL,
  `u_company` varchar(255) NOT NULL,
  `u_status` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_user` (`id`, `u_name`, `ul_name`, `u_image`, `u_email`, `u_phone`, `u_pass`, `u_role`, `u_company`, `u_status`, `u_branch`) VALUES ('1', 'Aliff', 'Test2', '0d93f9ed6a56bf3c378214d94a608b56.png', 'cs_aliaffan@gmail.com', '172563723', 'gadget7070', 'master', 'UTeM', 'Active', 'bangi');
INSERT INTO `tbl_user` (`id`, `u_name`, `ul_name`, `u_image`, `u_email`, `u_phone`, `u_pass`, `u_role`, `u_company`, `u_status`, `u_branch`) VALUES ('2', 'Asyraf', 'acap', '', 'asyraf@gmail.com', '0', 'asyraf', 'master', '', 'Active', 'cyberjaya');


#
# TABLE STRUCTURE FOR: tbl_user_group
#

DROP TABLE IF EXISTS `tbl_user_group`;

CREATE TABLE `tbl_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(255) NOT NULL,
  `groupDescription` varchar(255) NOT NULL,
  `groupPermission` varchar(255) NOT NULL,
  `u_branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_user_group` (`id`, `groupName`, `groupDescription`, `groupPermission`, `u_branch`) VALUES ('1', 'master', 'master user', '', 'bangi');
INSERT INTO `tbl_user_group` (`id`, `groupName`, `groupDescription`, `groupPermission`, `u_branch`) VALUES ('4', 'Admin', 'general user', '', 'bangi');


