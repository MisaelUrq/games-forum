<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function get_image_path() {
        if (strcmp($this->image, 'no image') == 0) {
            return asset('storage/games_covers/no image.jpg');
        } else {
            return asset('storage/games_covers/'.$this->image);
        }
    }

    public function guides() {
        return $this->hasMany('App\Guides', 'game_id', 'id');
    }

    public function posts() {
        return $this->hasMany('App\Blog', 'game_id', 'id');
    }

    public function reviews() {
        return $this->hasMany('App\Review', 'game_id', 'id');
    }
}
