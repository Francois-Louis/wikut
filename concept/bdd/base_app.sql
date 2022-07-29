#user
INSERT INTO `user`(`id`, `rank_id`, `status_id`, `city_id`, `country_code`, `email`, `roles`, `password`, `pseudo`, `slug`, `avatar`, `about`, `facebook`, `instagram`, `website`, `score`, `company`, `banned`, `created_at`, `updated_at`) VALUES (1,1,3,NULL,'FR','god@wikut.net','["ROLE_ADMIN"]','$2y$13$rI53W6ngwXU7RKhRKcheUu3VeByV8LcY3FKMLeKkXlFlpGUDN0mPu','demiurge','demiurge','','','','','',0,'',false,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `user`(`id`, `rank_id`, `status_id`, `city_id`, `country_code`, `email`, `roles`, `password`, `pseudo`, `slug`, `avatar`, `about`, `facebook`, `instagram`, `website`, `score`, `company`, `banned`, `created_at`, `updated_at`) VALUES (2,1,1,NULL,'FR','modo@wikut.net','["ROLE_MODO"]','modo','modo','modo','','','','','',0,'',false,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `user`(`id`, `rank_id`, `status_id`, `city_id`, `country_code`, `email`, `roles`, `password`, `pseudo`, `slug`, `avatar`, `about`, `facebook`, `instagram`, `website`, `score`, `company`, `banned`, `created_at`, `updated_at`) VALUES (3,1,1,NULL,'FR','testor@wikut.net','["ROLE_USER"]','testor','testor','testor','','','','','',0,'',false,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

#rank
INSERT INTO `rank`(`id`, `access`, `name`, `description`, `badge`, `created_at`, `updated_at`) VALUES (1,0,'Néophyte','Fait ses premiers pas dans le métier','bronze_rank.png',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `rank`(`id`, `access`, `name`, `description`, `badge`, `created_at`, `updated_at`) VALUES (2,35,'Talentueux','','silver_rank.png',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `rank`(`id`, `access`, `name`, `description`, `badge`, `created_at`, `updated_at`) VALUES (3,55,'Aguerri','Les rudiments du métier lui sont acquis','gold_rank.png',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `rank`(`id`, `access`, `name`, `description`, `badge`, `created_at`, `updated_at`) VALUES (4,70,'Expert','','platinum_rank.png',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `rank`(`id`, `access`, `name`, `description`, `badge`, `created_at`, `updated_at`) VALUES (5,80,'Maître','','diamond_rank.png',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `rank`(`id`, `access`, `name`, `description`, `badge`, `created_at`, `updated_at`) VALUES (6,85,'Grand-maître','','master_rank.png',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `rank`(`id`, `access`, `name`, `description`, `badge`, `created_at`, `updated_at`) VALUES (7,90,'Légende','','legend_rank.png',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

# blade
INSERT INTO blade(id,name,slug, `created_at`, `updated_at`) VALUES (1,'n690','n690',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO blade(id,name,slug, `created_at`, `updated_at`) VALUES (2,'14c28n','14c28n',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO blade(id,name,slug, `created_at`, `updated_at`) VALUES (3,'xc75','xc75',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO blade(id,name,slug, `created_at`, `updated_at`) VALUES (4,'rwl34','rwl34',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO blade(id,name,slug, `created_at`, `updated_at`) VALUES (5,'d2','d2',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO blade(id,name,slug, `created_at`, `updated_at`) VALUES (6,'90mcv8','90mcv8',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO blade(id,name,slug, `created_at`, `updated_at`) VALUES (7,'z20','z20',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO blade(id,name,slug, `created_at`, `updated_at`) VALUES (8,'z40','z40',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO blade(id,name,slug, `created_at`, `updated_at`) VALUES (9,'damas inox','damas-inox',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO blade(id,name,slug, `created_at`, `updated_at`) VALUES (10,'damas carbone','damas-carbone',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

# handle
INSERT INTO handle(id,name,slug, `created_at`, `updated_at`) VALUES (1,'g10','g10',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO handle(id,name,slug, `created_at`, `updated_at`) VALUES (2,'micarta','micarta',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO handle(id,name,slug, `created_at`, `updated_at`) VALUES (3,'fibre de carbone','fibre-de-carbone',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO handle(id,name,slug, `created_at`, `updated_at`) VALUES (4,'bois de fer','bois-de-fer',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO handle(id,name,slug, `created_at`, `updated_at`) VALUES (5,'croute de mammouth','croute-de-mammouth',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO handle(id,name,slug, `created_at`, `updated_at`) VALUES (6,'défense de phacochère','defense-de-phacochère',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO handle(id,name,slug, `created_at`, `updated_at`) VALUES (7,'loupe de cade','loupe-de-cade',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO handle(id,name,slug, `created_at`, `updated_at`) VALUES (8,'ébène','ebene',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO handle(id,name,slug, `created_at`, `updated_at`) VALUES (9,'olivier','olivier',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO handle(id,name,slug, `created_at`, `updated_at`) VALUES (10,'corne de buffle','corne-de-buffle',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

# style
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (1,'tactique','tactique',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (2,'ancien','ancien',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (3,'moderne','moderne',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (4,'edc','edc',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (5,'japonais','japonais',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (6,'marin','marin',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (7,'chasse','chasse',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (8,'laguiole','laguiole',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (9,'thiers','thiers',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (10,'opinel','opinel',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (11,'piémontais','piemontais',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (12,'2 clous','2-clous',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (13,'office','office',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (14,'éminceur','eminceur',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (15,'linerlock','linerlock',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (16,'pompe arrière','pompe-arriere',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (17,'cran forcé','cran-force',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (18,'crant plat','cran-plat',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (19,'plate semelle','plate-semelle',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO style(id,name,slug, `created_at`, `updated_at`) VALUES (20,'soie traversante','soie-traversante',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

# category
INSERT INTO category(id,name,slug, `created_at`, `updated_at`) VALUES (1,'Plein air','plein-air',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category(id,name,slug, `created_at`, `updated_at`) VALUES (2,'Cuisine','cuisine',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category(id,name,slug, `created_at`, `updated_at`) VALUES (3,'Art de la table','art-de-la-table',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO category(id,name,slug, `created_at`, `updated_at`) VALUES (4,'De poche','de-poche',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

# status
INSERT INTO status(id,name,description, `created_at`, `updated_at`) VALUES (1,'Cultelluphiliste','Amateur ou collectionneur de couteaux.',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO status(id,name,description, `created_at`, `updated_at`) VALUES (2,'Hobbyist','Fabricant non professionnel de couteaux.',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO status(id,name,description, `created_at`, `updated_at`) VALUES (3,'Artisan','Fabricant professionnel de couteaux,produits majoritairement par procédés et méthodes artisanales (découpe laser des pièces autorisée), travaillant principalement seul.',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO status(id,name,description, `created_at`, `updated_at`) VALUES (4,'Semi-industriel','Fabricant professionnel de couteaux, en grande quantité et produits majoritairement par procédés et méthodes artisanales (pas de travail à la chaîne), accueillant des salariés.',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO status(id,name,description, `created_at`, `updated_at`) VALUES (5,'Industriel','Fabricant professionnel de couteaux, en grande quantité et produits majoritairement par procédés et méthodes industrielles, accueillant des salariés.',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

# project

INSERT INTO `project`(`id`, `user_id`, `category_id`, `blade_id`, `name`, `slug`, `description`, `score`, `views`, `created_at`, `updated_at`) VALUES (1,1,4,1,'Kikoup','kikoup','Zic Zac',50,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `project`(`id`, `user_id`, `category_id`, `blade_id`, `name`, `slug`, `description`, `score`, `views`, `created_at`, `updated_at`) VALUES (2,3,4,3,'Laguiole','laguiole','Un vrai laguiole de thiers',0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `project`(`id`, `user_id`, `category_id`, `blade_id`, `name`, `slug`, `description`, `score`, `views`, `created_at`, `updated_at`) VALUES (3,3,4,4,'Thiers','thiers','le Thiernois de Thiers',0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

# votes
INSERT INTO `vote`(`id`, `user_id`, `project_id`, `rate`, `created_at`, `updated_at`) VALUES (1,2,1,50,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

# Pictures
INSERT INTO `picture`(`id`, `project_id`, `path`, `place`, `created_at`, `updated_at`) VALUES (1,1,'IMG_0224 (2).jpg',0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `picture`(`id`, `project_id`, `path`, `place`, `created_at`, `updated_at`) VALUES (2,1,'IMG_0225 (2).jpg',1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `picture`(`id`, `project_id`, `path`, `place`, `created_at`, `updated_at`) VALUES (3,2,'Laguiole-Honoré-Durand-image-principale.jpg',0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `picture`(`id`, `project_id`, `path`, `place`, `created_at`, `updated_at`) VALUES (4,3,'COUVERTURE-scaled-700x700.jpg',0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);

# Comments
INSERT INTO `comment`(`id`, `user_id`, `project_id`, `answer_id`, `content`, `created_at`, `updated_at`) VALUES (1,2,1,2,'Mais c\'est de la merde !',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `comment`(`id`, `user_id`, `project_id`, `answer_id`, `content`, `created_at`, `updated_at`) VALUES (2,1,1,3,'Enculé va !',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
INSERT INTO `comment`(`id`, `user_id`, `project_id`, `answer_id`, `content`, `created_at`, `updated_at`) VALUES (3,2,1,NULL,'Du calme bijou ^^ !',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
