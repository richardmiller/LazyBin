<?php

namespace RMiller\LazyBin\Process\CommandRunner;

use RMiller\LazyBin\Process\CommandRunner;

class PcntlCommandRunner implements CommandRunner
{
    /**
     * @var CliFunctionChecker
     */
    private $functionChecker;

    /**
     * @param CliFunctionChecker $functionChecker
     */
    public function __construct(CliFunctionChecker $functionChecker) {
        $this->functionChecker = $functionChecker;
    }

    /**
     * @param $path
     * @param $args
     */
    public function runCommand($path, $args)
    {
        pcntl_exec($path, $args);
    }

    public function isSupported()
    {
        return $this->functionChecker->functionCanBeUsed('pcntl_exec');
    }
}
