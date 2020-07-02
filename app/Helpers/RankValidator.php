<?php

namespace App\Helpers;

class RankValidator 
{
    protected $Level1 = 'user';
    protected $Level2 = 'laborer';
    protected $Level3 = 'worker';
    protected $Level4 = 'manager';

    /**
     * Validate user rank, expected values are user, worker and manager
     * 
     * @param string $level
     * @return boolean
     */
    public function check($level)
    {
        if (!auth()->user()) {
            return false;
        }

        switch ($level) {
            case 'level1':
                if (auth()->user()->rank === $this->Level1 
                    || auth()->user()->rank === $this->Level2 
                    || auth()->user()->rank === $this->Level3 
                    || auth()->user()->rank === $this->Level4) {
                        $allow = true;
                        break;
                }

            case 'level2':
                if (auth()->user()->rank === $this->Level2 
                    || auth()->user()->rank === $this->Level3 
                    || auth()->user()->rank === $this->Level4) {
                        $allow = true;
                        break;
                }

            case 'level3':
                if (auth()->user()->rank === $this->Level3 
                    || auth()->user()->rank === $this->Level4) {
                        $allow = true;
                        break;
                }

            case 'level4':
                if (auth()->user()->rank === $this->Level4) {
                    $allow = true;
                    break;
                }

            default:
                $allow = false;
                break;
        }

        return $allow;
    }

    /**
     * Confirm the user rank type, expected values are user, worker and manager
     * 
     * @param string $variable
     * @return string
     */
    public function type($variable)
    {
        if (!auth()->user()) {
            return 'level0';
        }

        switch ($variable) {
            case $this->Level1:
                $type='level1';
                break;
            
            case $this->Level2:
                $type='level2';
                break;

            case $this->Level3:
                $type='level3';
                break;

            case $this->Level4:
                $type='level4';
                break;

            default:
                $type='level0';
                break;
        }

        return $type;
    }

    /**
     * Get the user rank value, expected values are level1, level3 and level4
     * 
     * @param string $variable
     * @return string
     */
    public function explain($variable)
    {
        if (!auth()->user()) {
            return 'zero';
        }

        switch ($variable) {
            case 'level1':
                $value=$this->Level1;
                break;

            case 'level2':
                $value=$this->Level2;
                break;

            case 'level3':
                $value=$this->Level3;
                break;

            case 'level4':
                $value=$this->Level4;
                break;

            default:
                $value='zero';
                break;
        }

        return $value;
    }
}
