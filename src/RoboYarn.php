<?php

/**
 * Trait RoboYarn
 */
trait RoboYarn
{
    /**
     *
     */
    public function checkBuild()
    {
        $this->stopOnFail(true);
        $fail = 'Directory not found';
        $success = 'Directory found';
        $exec = exec('[ -d dist ] && echo "' . $success . '" || echo "' . $fail . '"');
        if($exec === $fail) {
            exit(1);
        }
    }

    /**
     * @param bool $fail
     */
    public function yarnInstall($fail = true)
    {
        $this->stopOnFail($fail);
        $this->_exec('yarn install');
    }

    /**
     * @param bool $fail
     */
    public function yarnBuild($fail = true)
    {
        $this->stopOnFail($fail);
        $this->_exec('yarn run build');
    }

    /**
     * @param string $name
     * @param bool $fail
     */
    public function yarnRun(string $name, $fail = true)
    {
        $this->stopOnFail(fail);
        $this->_exec('yarn run generate-sw');
    }
}
