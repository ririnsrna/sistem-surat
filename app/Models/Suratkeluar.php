<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Suratkeluar extends Model
{
    protected $guarded = [];
    public function dayCount()
    {
        if (!blank($this->return_at)) {
            return $this->created_at->diffInDays($this->return_at);
        }

        return '';
    }
}
