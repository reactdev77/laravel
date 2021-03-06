<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Datatable extends Model
{
    use Searchable;
    
    protected $table = 'datatables';

    protected $guarded  = ['id'];

}
