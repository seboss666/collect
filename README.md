Collect
=======

This is a PHP/MySQL application (should work with MariaDB too, but not tested -- yet) that allows you to manage your media collection. Interface is built with jQuery Mobile, nativeDroid theme by godesign.ch.

It is developed by me, Seboss666, entirely with self-learned skills (at least what I consider to be skills). Just a personal need at the beginning (especially with 400+ movies), I'm considering sharing the code resulting from weeks of very unplanned work. 

At this time, it features add/update/remove movies, and keep track of lended ones (with the name of the person who temporarily owns YOUR film).

The choice of web-hosted HTML app was driven by a need to instantly check if I already own a film I'm looking at at the mall before buying it, and it can be done on my smartphone. Actually it's reachable on any device with a (pretty recent) web browser and internet access.


Installation
============

Collect needs a web server with php and mysql support (tested on Debian Squeeze with nginx 1.2.8, php5.3, mysql 5.5). Just put the files in a folder of your choice and you're almost good to go.

Until future development, you need to manually create the database, import the .sql file provided and modify 'config.inc.php' to put host, db name, user/password, and the secret needed to get add/modify/delete access into the app.


Todo
====

Now that I have a codebase that is easily extendible, I plan to add some features :
-Swype-to-reveal panel (I have some trouble with the pageinit behaviour, so I stick with the button for the moment);
-New db table to push more media types (books, and others if you want), with tools to manage types;
-Full search (at this time only on title);
-Internationalization (a real big work, because I can only translate french and english without help);
-Poster support, with thumbnails in the listings.
