CREATE TABLE if NOT EXISTS  `#__share_draft`(
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL, 
  `sharelink` varchar(255) NOT NULL, 
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

