<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AdminGame;
use App\WebAdmin;

class UserRolesController extends Controller
{
    public function make_gameadmin($user_id, $game_id) {
        if (User::is_current_user_webadmin_or_gameadmin($game_id) &&
            AdminGame::is_user_admin_of_this_game($user_id, $game_id) === null) {
            AdminGame::create([
                'user_id' => $user_id,
                'game_id' => $game_id,
            ]);
            session()->flash('alert-success', 'User ' . User::find($user_id)->name . ' has been added to the game admin list.');
        }

        return redirect(url()->previous());
    }

    public function remove_gameadmin($game_admin_id, $game_id) {
        $admin_of_game = AdminGame::is_user_admin_of_this_game($game_admin_id, $game_id);
        if (User::is_current_user_webadmin_or_gameadmin($game_id) && $admin_of_game !== null) {
            session()->flash('alert-success',
                             'User ' . User::find($admin_of_game->user_id)->name . ' has been remove from the game admin list.');
            $admin_of_game->delete();
        }
        return redirect(url()->previous());
    }

    public function make_webadmin($user_id) {
        if (User::is_current_user_webadmin() && WebAdmin::is_user_webadmin($user_id) === null) {
            WebAdmin::create([
                'user_id' => $user_id
            ]);
            session()->flash('alert-success', 'User ' . User::find($user_id)->name . ' has been added to the webadmin list.');
        }
        return redirect(url()->previous());
    }

    public function remove_webadmin($admin_id) {
        $user = \Auth::user();
        $webadmin = WebAdmin::is_user_webadmin($admin_id);
        if (User::is_current_user_webadmin() && $webadmin !== null && strcmp($webadmin->name, 'root') != 0) {
            $webadmin->delete();
            session()->flash('alert-success', 'User ' . $user->name . ' has been remove from the webadmin list.');
        }
        return redirect(url()->previous());
    }
}
