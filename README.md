php-micrork
===========
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
> php app/game micrork:run
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
thcnet.net/zork/index.php

####Text based game configuration
configuration: http://www.tuxradar.com/practicalphp/21/4/1
game loop and logic: http://www.tuxradar.com/practicalphp/21/4/2

####Symfony - Loading Resources:
http://symfony.com/doc/current/components/config/resources.html

####Symfony - The Console Component:
http://symfony.com/doc/current/components/console/introduction.html

####Symfony - Question Helper:
http://symfony.com/doc/current/components/console/helpers/questionhelper.html

####Symfony - YAML Component:
http://symfony.com/doc/current/components/console/helpers/questionhelper.html

####Symfony - File System Component:
http://symfony.com/doc/current/components/filesystem/introduction.html
