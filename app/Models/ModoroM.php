<?php

namespace App\Models;

use CodeIgniter\Model;

class ModoroM extends Model
{
    protected $table            = 'modoro';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['feature', 'level', 'work_time', 'break_time'];
    protected $useTimestamps    = true;
}
