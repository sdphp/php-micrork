<?php
/*
 * This file is part of the SDPHP {php-micrork} Package.
 * For the full copyright and license information, 
 * please view the LICENSE file that was distributed 
 * with this source code.
 */

namespace SDPHP\PHPMicrork\IO;

use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * GamePrinter - Description. 
 *
 * @author Juan Manuel Torres <juan@cpcstrategy.com>
 */
class GameCLIIO implements GameIOInterface
{
    /**
     * @var
     */
    private $questionHelper;

    /**
     * @var
     */
    private $input;

    /**
     * @var
     */
    private $output;

    public function __construct(QuestionHelper $questionHelper, InputInterface $input, OutputInterface $output)
    {

        $this->questionHelper = $questionHelper;
        $this->input = $input;
        $this->output = $output;
    }

    public function printPlace($room)
    {
        $this->output->writeln(sprintf('Current location: %s', $room['name']));
        $this->printInfo(sprintf($room['description']));

        foreach ($room['directions'] as $key => $value) {
            $this->printComment(sprintf('%s: %s', $value, $key));
        }

        if (isset($room['actions'])) {
            $this->printInfo('The following actions are available:');
            foreach ($room['actions'] as $key => $value) {
                $this->printComment(sprintf('%s: [%s]', $key, implode(', ', $value)));
            }
        }
    }

    public function askQuestion($questionString, $default = null)
    {
        $question = new Question($questionString, $default);
        return $this->questionHelper->ask($this->input, $this->output, $question);
    }

    public function printInfo($value)
    {
        $this->output->writeln(sprintf('<info>%s</info>', $value));
    }

    public function printComment($value)
    {
        $this->output->writeln(sprintf('<comment>%s</comment>', $value));
    }

    public function printQuestion($value)
    {
        $this->output->writeln(sprintf('<question>%s</question>', $value));
    }

    public function printError($value)
    {
        $this->output->writeln(sprintf('<error>%s</error>', $value));
    }
}
