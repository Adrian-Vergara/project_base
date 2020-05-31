<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseType extends Model
{
    use SoftDeletes;
    protected $table = "expense_types";
    protected $fillable = array("name");
    protected $hidden = array("created_at", "updated_at", "deleted_at");
}
