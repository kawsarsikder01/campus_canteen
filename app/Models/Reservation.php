<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;
class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'tel_number',
        'email',
        'table_id',
        'res_date',
        'guest_number'
    ];
    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
