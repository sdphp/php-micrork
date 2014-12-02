<?php
/*
 * This file is part of the SDPHP php-micrork Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\Command;

use SDPHP\PHPMicrork\IO\GameCLIIO;
use SDPHP\PHPMicrork\Logic\GameLogicInterface;
use SDPHP\PHPMicrork\Loop\GameLoop;
use SDPHP\PHPMicrork\State\GameStateInterface;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

/**
 * GameLoop - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 */
class GameCommand extends Command
{
    private $gameInfo;
    private $currentLevel;
    private $delegatingLoader;

    /**
     * @var GameStateInterface
     */
    private $gameState;

    /**
     * @var GameLogicInterface
     */
    private $gameLogic;

    public function __construct(DelegatingLoader $delegatingLoader, GameStateInterface $gameState, GameLogicInterface $gameLogic, $name = null)
    {
        parent::__construct($name);
        $this->delegatingLoader = $delegatingLoader;
        $this->gameState = $gameState;
        $this->gameLogic = $gameLogic;
    }

    protected function configure()
    {
        $this
            ->setName('micrork:run')
            ->setDescription('Main command to start a new PHPOrk game.')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Name of your hero.'
            )
            ->addOption(
                'level',
                null,
                InputOption::VALUE_REQUIRED,
                'If set, it will load the level name.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->loadConfiguration($input->getOption('level'));
        $name = $input->getArgument('name');
        $questionHelper = $this->getHelper('question');

        if (!$name) {
            $question = new Question('What is the name of your hero?', $this->gameInfo['player']['default_name']);
            $name = $questionHelper->ask($input, $output, $question);
        }

        $output->writeln('Hello '.$name);
        $gameIO = new GameCLIIO($questionHelper, $input, $output);
        $gameLoop = new GameLoop($gameIO);
        $this->gameState->getPlayer()->setName($name);
        $next = true;

        while ($next !== false) {
            $this->gameState->setLevel( $this->currentLevel['level']);
            $gameLoop->start($this->gameState, $this->gameLogic);

            if ($this->gameState->isGameOver()) {
                $next = false;
            } elseif ($this->gameState->isLevelOver()) {
                $next = $this->gameState->getNextLevel();
                $this->loadLevel($next);
            }
        }
    }


    private function loadConfiguration($level)
    {
        $this->loadGame();
        $this->loadLevel($level);
    }

    private function loadGame()
    {
        $fileName =  'game.yml';
        $this->gameInfo = $this->delegatingLoader->load($fileName);
    }

    private function loadLevel($level)
    {
        if ($level) {
            // A level option exist, try to find it and load it.
            if (isset($this->gameInfo['levels'][$level])) {
                $this->currentLevel = $this->gameInfo['levels'][$level];

            } else {
                throw new FileNotFoundException(sprintf('The level you are looking for "%s", is not part of the World configuration.', $level ));
            }

        } else {
            // Load first level from world configuration
            $this->currentLevel = array_shift(array_values($this->gameInfo['levels']));
        }
    }
}
