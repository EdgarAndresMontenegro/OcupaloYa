<?php 

class Db extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [];
	}

	// función para guardar un usuario
	public function create()
	{
		parent::customer(" CREATE TABLE IF NOT EXISTS `allies` (`id` int(11) NOT NULL, `user_id` int(11) NOT NULL, `social_reason` varchar(250) COLLATE utf8_spanish_ci NOT NULL, `slug` varchar(250) COLLATE utf8_spanish_ci NOT NULL, `nit` varchar(15) COLLATE utf8_spanish_ci NOT NULL, `logo` text COLLATE utf8_spanish_ci NOT NULL, `website` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL, `description` varchar(250) COLLATE utf8_spanish_ci NOT NULL, `foundation_date` date NOT NULL, `created_at` datetime NOT NULL, `updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `allies_sucursal` (`id` int(11) NOT NULL,`ally_id` int(11) NOT NULL,`city_id` int(11) NOT NULL,`telephone` int(11) DEFAULT NULL,`cellphone` int(11) DEFAULT NULL,`address` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`lattitude` float NOT NULL,`longitude` float NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `bedroom` (`id` int(11) NOT NULL,`washing_machine` tinyint(1) NOT NULL,`kitchen` tinyint(1) NOT NULL,`pet_allowed` tinyint(1) NOT NULL,`furnitured` tinyint(1) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `bedroom_area_bedroom` (`id` int(11) NOT NULL,`house_flat_id` int(11) NOT NULL,`bedroom_kind` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`area` float NOT NULL,`description` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `bedroom_share_bedroom` (`id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`bedroom_id` int(11) NOT NULL,`share_bedroom_id` int(11) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULl) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `book_immovable` (`id` int(11) NOT NULL,`user_id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`taking_date` date NOT NULL,`advanced_budget` float(11,2) NOT NULL,`state` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`took_by_interested` tinyint(1) NOT NULL,`gave_by_owner` tinyint(1) NOT NULL,`retire_state` int(1) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `cities` (`id` int(11) NOT NULL,`state_id` int(11) NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`code` int(11) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `countries` (`id` int(11) NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`time_zone` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`prefix` varchar(5) COLLATE utf8_spanish_ci NOT NULL,`icon` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `favorite_immovables` (`id` int(11) NOT NULL,`user_id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`created_at` date NOT NULL,`updated_at` date NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `following` (`id` int(11) NOT NULL,`user_id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`created_at` date NOT NULL,`updated_at` date NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `house_flat` (`id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`bedroom_quantity` int(11) NOT NULL,`bathroom_quantity` int(11) NOT NULL,`garage` tinyint(1) NOT NULL,`number_of_floors` int(11) NOT NULL,`yard` tinyint(1) NOT NULL,`social_zone` tinyint(1) NOT NULL,`administration_price` int(11) DEFAULT NULL,`clothes_room` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`elevator` tinyint(1) NOT NULL,`balcony` tinyint(1) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `immovable` (`id` int(11) NOT NULL,`user_id` int(11) NOT NULL,`immovable_type` int(11) NOT NULL DEFAULT '1',`area` float NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`slug` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`price` int(11) NOT NULL,`contract_type` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'con inmobiliaria o directo',`process_type` int(11) DEFAULT NULL COMMENT 'venta, arriendo, permuta, etc',`antiquity` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`stratum` int(11) DEFAULT NULL,`state` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`tcm` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`poster` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`description` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `immovable_kind` (`id` int(11) NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`icon` varchar(100) COLLATE utf8_spanish_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `immovable_picture` (`id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `lot` (`id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`water` tinyint(1) NOT NULL,`electricity` tinyint(1) NOT NULL,`gas` tinyint(1) NOT NULL,`road` tinyint(1) NOT NULL,`paved_road` tinyint(1) NOT NULL,`fenced` tinyint(1) NOT NULL,`pruned` tinyint(1) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `movements` (`id` int(11) NOT NULL,`user_id` int(11) NOT NULL,`budget` float(11,2) NOT NULL,`balance` float(11,2) NOT NULL,`type` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`message` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `number_of_uses` (`id` int(11) NOT NULL,`promotion_code_id` int(11) NOT NULL,`quantity` int(11) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `office_local` (`id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`water` tinyint(1) NOT NULL,`gas` tinyint(1) NOT NULL,`electricity` tinyint(1) NOT NULL,`kitchen` tinyint(1) NOT NULL,`air_conditioner` tinyint(1) NOT NULL,`bathroom` tinyint(1) NOT NULL,`floor_quantity` int(11) NOT NULL,`storage` tinyint(1) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `parking_lot` (`id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`underground` tinyint(1) NOT NULL,`roofed` tinyint(1) NOT NULL,`private_security` tinyint(1) NOT NULL,`thieveproof` tinyint(1) NOT NULL,`schedule` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`bathroom` tinyint(1) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `plan` (`id` int(11) NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`price` int(11) NOT NULL,`active_days` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `plan_sections` (`id` int(11) NOT NULL,`plan_id` int(11) NOT NULL,`section_id` int(11) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `prominent_immovable` (`id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`plan_id` int(11) NOT NULL,`start_date` date NOT NULL,`finish_date` date NOT NULL,`state` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `promotion_codes` (`id` int(11) NOT NULL,`user_id` int(11) NOT NULL,`code` varchar(10) COLLATE utf8_spanish_ci NOT NULL,`status` int(11) NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`slug` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`description` text COLLATE utf8_spanish_ci NOT NULL,`starting_date` datetime NOT NULL,`finish_date` datetime NOT NULL,`image` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `roles` (`id` int(11) NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `sections` (`id` int(11) NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `share_bedroom` (`id` int(11) NOT NULL,`bathroom` tinyint(1) NOT NULL,`closet` tinyint(1) NOT NULL,`wifi` tinyint(1) NOT NULL,`fridge` tinyint(1) NOT NULL,`cleaning` tinyint(1) NOT NULL,`visit_schedule` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`environment` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`arrival_hour` time NOT NULL,`garage` tinyint(1) NOT NULL,`elevator` tinyint(1) NOT NULL,`social_zone` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `share_share_bedroom` (`id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`share_id` int(11) NOT NULL,`share_bedroom_id` int(11) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

		parent::customer(" CREATE TABLE IF NOT EXISTS `states` (`id` int(11) NOT NULL,`country_id` int(11) NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`code` int(11) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `storage` (`id` int(11) NOT NULL,`immovable_id` int(11) NOT NULL,`height` float NOT NULL,`max_volume` float NOT NULL,`entries_quantity` int(11) NOT NULL,`average_temperature` int(11) NOT NULL,`store_recomendation` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`vehicle_entry_height` float NOT NULL,`garage` tinyint(1) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `survey` (`id` int(11) NOT NULL,`id_encuesta` int(11) NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`lastname` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`age` int(11) DEFAULT NULL,`city` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`immovable_kind` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`stratum` int(11) DEFAULT NULL,`pets` int(11) DEFAULT NULL,`enviroment` int(11) DEFAULT NULL,`smooke` int(11) DEFAULT NULL,`budget` int(11) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `universitary_share` (`id` int(11) NOT NULL,`feeding_days` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`washing` tinyint(1) NOT NULL,`studying_zone` tinyint(1) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `users` (`id` int(11) NOT NULL,`rol_id` int(11) NOT NULL,`name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`username` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`password` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`slug` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`icon` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`state` int(11) NOT NULL,`block` int(11) NOT NULL,`balance` float(11,2) NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULl) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");

		parent::customer(" CREATE TABLE IF NOT EXISTS `user_data` (`id` int(11) NOT NULL,`user_id` int(11) NOT NULL,`city_id` int(11) NOT NULL,`document_type` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,`document_number` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,`sex` int(11) DEFAULT NULL,`telephone` varchar(20) COLLATE utf8_spanish_ci NOT NULL,`address` varchar(250) COLLATE utf8_spanish_ci NOT NULL,`birth_date` date NOT NULL,`created_at` datetime NOT NULL,`updated_at` datetime DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; ");
	}
}