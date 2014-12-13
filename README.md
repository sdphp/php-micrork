php-micrork
===========

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/86000835-dace-41da-aa4a-6cd93f9c56a0/big.png)](https://insight.sensiolabs.com/projects/86000835-dace-41da-aa4a-6cd93f9c56a0)

Text based action adventure game build on PHP and Symfony components. 
This is a work in progress and is part of the end of the year 2014 SDPHP studygroup programming project. 

##Installation 
- Download/Clone the project
- Change directory to the project root: `cd php-micrork`
- Download Composer  `curl -sS https://getcomposer.org/installer | php`
- Install Dependencies `php composer.phar install`

##Start the game
Just type the following command
```
> php app/game run [character name]
```

## Things to work on
- [ ] Update Game Mechanics 
  - [X] Create an YAML config loader
  - [ ] Create an XML config loader (optional)
  - [ ] Update game to load additional rooms/worlds
  - [ ] Add persistent storage to save game state (optional)
  - [ ] Use DI container to setup game based on parameters.yml file. 
- [ ] Update Gameplay
  - [ ] Add world objectives
  - [ ] Add enemies 
  - [ ] Add hero stats
  - [ ] Add a fight system
  - [ ] Add an interaction system
  - [ ] Give an end to the game
- [ ] Update Configuration
  - [ ] Extend the story 
  - [ ] Create user configuration
  - [ ] Create NPC configuration
  - [ ] Create item configuration

##Resources
####ZORK Text: 
http://i7-dungeon.sourceforge.net/source.txt

####ZORK Emulator:
http://thcnet.net/zork/index.php

####Text based game configuration
- [Text-based world planning](http://www.tuxradar.com/practicalphp/21/4/1)
- [game loop and logic](http://www.tuxradar.com/practicalphp/21/4/2)

####Symfony 
- [Loading Resources](http://symfony.com/doc/current/components/config/resources.html)
- [The Console Component](http://symfony.com/doc/current/components/console/introduction.html)
- [Question Helper](http://symfony.com/doc/current/components/console/helpers/questionhelper.html)
- [YAML Component](http://symfony.com/doc/current/components/console/helpers/questionhelper.html)
- [File System Component](http://symfony.com/doc/current/components/filesystem/introduction.html)

####Design
- [Prototype design pattern](http://gameprogrammingpatterns.com/prototype.html)
- [Designing an RPG Inventory System That Fits: Preliminary Steps](http://gamedevelopment.tutsplus.com/articles/designing-an-rpg-inventory-system-that-fits-preliminary-steps--gamedev-14725)
- [Designing an RPG Inventory System That Fits: Echoes of Eternea](http://gamedevelopment.tutsplus.com/articles/designing-an-rpg-inventory-system-that-fits-echoes-of-eternea--gamedev-14947)
- [Weapon design patterns in computer games](http://dl.acm.org/citation.cfm?id=2427119)
- 