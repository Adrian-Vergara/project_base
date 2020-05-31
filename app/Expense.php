<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;
    protected $table = "expenses";
    protected $fillable = array("expense_type_id", "value", "date");
    protected $hidden = array("created_at", "updated_at", "deleted_at");

    public function type()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type_id');
    }
}
