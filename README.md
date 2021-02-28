# Embedded collaboration pad

## About
Software of Master Thesis that enable students to develop embedded IoT in a collaborative environment.
It consist of

* realtime colaboration text editor
* video chat system based on webrtc 
* mqtt client 
* are to include tutorial content
* user authentication to organize groups

## Installation
Use an instance of mysql database, create a database and execute the following sql statement to create the two nessesary tables. 

```
CREATE TABLE `securitytokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `securitytoken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```

This create two tables. Use the **users** table to insert/create group logins.

After you've done this copy the content of this repository to a webserver of your choice that is able to connect to the database you created. Alter the **inc/config.inc.php** file and enter your database credentials.

The project is now ready to go. 