<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItems extends Model
{
    use HasFactory;
    protected $table='stock_item';
    protected $guarded=[];
    protected $fillable=[];
}
