<?php

namespace Rinjax\GameCeleb\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = ['id'];

    protected $table = 'game_questions';
}