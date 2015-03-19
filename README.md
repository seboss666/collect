Collect
=======

This is a PHP/MySQL application that allows you to manage your physical movie collection. Interface is built with jQuery Mobile, nativeDroid theme by [godesign.ch](http://nativedroid.godesign.ch).

It is developed by me, Seboss666, entirely with self-learned skills (at least what I consider to be skills). Just a personal need at the beginning (especially with 400+ movies), it is a project resulting from weeks of very unplanned work. 

At this time, you can :
 - view last 10 movies added
 - view all movies at once
 - search a movie by its title

And if you enter the password in the menu, you then have the additionnal capacities :
- add a new movie
- update an existing movie
- remove a movie, if you sale one/give one/duplicate one accidentaly
- keep track of lended ones (through the update function), with the name of the person who temporarily owns YOUR movie.

The choice of web-hosted HTML app was driven by a need to instantly check if I already own a film I'm looking at at the mall before buying it, and it can be done on my smartphone. Actually it's reachable on any device with a (pretty recent) web browser and, obviously, internet access.


Installation
============

See the [doc](https://github.com/seboss666/collect/tree/master/doc) folder for more details about what is needed and how to make it work. Basically, **collect** is a web application, so you need a "web stack", just as you were installing a blog.


Todo
====

- Tools to manage types (maybe abandoned)
- Full search (at this time only on title)
- Internationalization (a real big work, because I can only translate french and english without help)
- Poster support, with thumbnails in the listings (only on large screens). Need To rework theme for that I think
-Major rewrite of the design. I would like it to be the least overloaded, which is a convenient way to say 'kick ass of as much javascript as you can'. Saying, NativeDroid has to be replaced with something else.  
- OOP conversion. I'm still unconfortable with the concepts, but definitely I'll have to go through it
- Rewrite the app to make-it work through an API. So the project will be split in two parts. Probably the least urgent thing to do (and maybe a total rewrite)


Sreenshots
==========

Here are some images of the interface. First the default view :

![default view](https://raw.github.com/seboss666/collect/master/doc/images/collect-default.png)

And then when opening the menu :

![open menu](https://raw.github.com/seboss666/collect/master/doc/images/collect-menu.png)

Here is the form to modify an existing entry (with lender name support) :

![modify an entry](https://raw.github.com/seboss666/collect/master/doc/images/collect-modify.png)