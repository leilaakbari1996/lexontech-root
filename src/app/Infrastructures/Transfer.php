<?php

namespace Lexontech\Root\app\Infrastructures;

class Transfer
{
    /**
     * @var
     */
    public $path;


    /**
     * @param $path
     */
    public function __construct($path="")
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function loadAsset($p)
    {
        $path = $p;
        if(file_exists(public_path($path)))
        {
            return asset($path)."?".filemtime(public_path($path));
        }

        return asset($path);
    }

}
