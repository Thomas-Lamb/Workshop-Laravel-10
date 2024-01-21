<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    public static function getAll() {
        return self::all();
    }

    public function getMessages() {
        return Message::query()->where("channel_id", "=", $this->id)->get();
    }
}
