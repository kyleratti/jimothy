<?php
namespace App\Http\Controllers;

use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use App\Group;
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
                        'avatar' => $info->avatarfull,
                        'level' => 5,
                    ]);

                    if($user->id == 1) {
                        $user->level = 1;
                        $user->save();

                        $objThreads = \App\Thread::all();

                        foreach($objThreads as $objThread) {
                            $objThread->owner = $user;
                            $objThread->save();
                        }

                        $objReplies = \App\Reply::all();

                        foreach($objReplies as $objReply) {
                            $objReply->owner = $user;
                            $objReply->save();
                        }
                    }
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