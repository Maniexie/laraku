<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Chatify\Traits\UUID;

class ChMessage extends Model
{
    use UUID;
    use HasUuids;
}


$chatify = ChMessage::create(['user_id']);
$chatify->id;