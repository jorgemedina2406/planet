<?php
namespace App\Config\Repositories;

use App\Config\Entities\Config;

/**
 * Class ConfigRepo
 *
 * @package App\Config\Repositories
 * @author  Jorge Medina
 */
class ConfigRepo
{
    
    public function createConfig($data)
    {
        return Config::create($data);
    }
    
}