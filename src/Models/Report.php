<?php

namespace App\Models;

use App\Model;

class Report extends Model
{
    protected static string $table = 'reports';
    public string $class;
    public string $data;
    public string $type;
}