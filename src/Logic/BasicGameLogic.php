<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */
namespace SDPHP\PHPMicrork\Logic;

use SDPHP\PHPMicrork\IO\GameIOInterface;
use SDPHP\PHPMicrork\Loop\FightLoop;
use SDPHP\PHPMicrork\State\GameStateInterface;

/**
 * BasicGameLogic - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 */
class BasicGameLogic implements GameLogicInterface
{
    public function switchState(GameStateInterface $gameState, GameIOInterface $gameIO)
    {
        $room = $gameState->getRoom();
        $directions = $room['directions'];
        $gameIO->printPlace($room);

        $input = $gameIO->askQuestion('Choose your next move: ');

        // get command an argument, usually a verb followed by noun
        $input = explode(' ', $input);
        $command = $input[0];
        $argument = isset($input[1]) ? $input[1] : false;

        switch(strtolower($command)) {
            case 'north':
                if (isset($directions[$command]) && $directions[$command] !== '-') {
                    $gameState->setPosition($directions[$command]);
                } else {
                    $gameIO->printError("You cannot go north!");
                }
                break;

            case 'south':
                if (isset($directions[$command]) && $directions[$command] !== '-') {
                    $gameState->setPosition($directions[$command]);
                } else {
                    $gameIO->printError("You cannot go south!");
                }
                break;

            case 'west':
                if (isset($directions[$command]) && $directions[$command] !=='-') {
                    $gameState->setPosition($directions[$command]);
                } else {
                    $gameIO->printError("You cannot go west!");
                }
                break;

            case 'east':
                if (isset($directions[$command]) && $directions[$command] !== '-') {
                    $gameState->setPosition($directions[$command]);
                } else {
                    $gameIO->printError("You cannot go east!");
                }
                break;

            case 'yell':
                    $gameIO->printError($argument);
                break;

            case 'fight':
                    if ($argument) {
                        $gameState->loadNPC($argument);
                        $fightLoop = new FightLoop($gameIO);
                        $fightLoop->start($gameState, new FightLogic());

                    } else {
                        $gameIO->printQuestion('You swing punches in the air, people think you are drunk, are you?');
                    }
                break;

            case 'get':

                break;

            case 'take':

                break;

            case 'drink':

                if ($argument) {
                    $gameIO->printComment(sprintf('Drinking %s, glup...', $argument));
                    if ($argument === 'water') {
                        $gameIO->printComment('Sissy!');
                    }
                } else {
                    $gameIO->printError('You need to choose what you are Drinking');
                }
                break;


            case 'inspect':

                break;


            case 'read':

                break;


            case 'look':
                $gameIO->printPlace($room);
                break;

            case 'quit':
            case 'exit':
                $gameState->quit();
                break;

            default:
                $gameIO->printError(sprintf('I do not understand what you mean! Please try again'));


        }

        $gameIO->printInfo('==================================================================================================');
    }
}
