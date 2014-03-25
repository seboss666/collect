Collect
=======

This is a PHP/MySQL application (should work with MariaDB too, but not tested -- yet) that allows you to manage your media collection. Interface is built with jQuery Mobile, nativeDroid theme by godesign.ch.

It is developed by me, Seboss666, entirely with self-learned skills (at least what I consider to be skills). Just a personal need at the beginning (especially with 400+ movies), I'm considering sharing the code resulting from weeks of very unplanned work. 

At this time, it features add/update/remove movies, and keep track of lended ones (with the name of the person who temporarily owns YOUR film).

The choice of web-hosted HTML app was driven by a need to instantly check if I already own a film I'm looking at at the mall before buying it, and it can be done on my smartphone. Actually it's reachable on any device with a (pretty recent) web browser and internet access.


Installation
============

Collect needs a web server with php and mysql/mariadb support (tested on Debian Wheezy with nginx/php/mariadb). Just put the files in a folder of your choice and you're almost good to go.

Until future development, you need to manually create the database, import the .sql file provided and modify 'config.inc.php' to put host, db name, user/password, and the secret needed to get add/modify/delete access into the app.


Todo
====

-Tools to manage types;
-Full search (at this time only on title);
-Internationalization (a real big work, because I can only translate french and english without help);
-Poster support, with thumbnails in the listings (only on large screens).
-Object conversion. I'm still unconfortable with the concepts, but definitely I'll have to go through it.
-Rewrite the app to make-it work through an API. So the project will be split in two parts.
