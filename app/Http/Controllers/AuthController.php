<?php
namespace App\Http\Controllers;

use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;

class AuthController extends Controller
{
    /**
     * @var SteamAuth
     */
    private $steam;

    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    public function login()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();
            if (!is_null($info)) {
                $user = User::where('steam64', $info->steamID64)->first();
                if (is_null($user)) {
                    $user = User::create([
                        'steam64' => $info->steamID64,
                        'steam_name' => $info->personaname,
                        'avatar' => $info->avatarfull
                    ]);

                    if($user->id == 1)
                        $user->assignRole('owner', 'superadmin', 'admin');
                    else
                        $user->assignRole('guest');
                }

                Auth::login($user, true);
                return redirect()->route('forum.index'); // redirect to site
            }
        }
        return $this->steam->redirect(); // redirect to Steam login page
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('forum.index');
    }
}