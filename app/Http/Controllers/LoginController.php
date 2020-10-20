<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
  public function loginVK()
  {
    if (Auth::check()) {
      return redirect()->route('home');
    }
    return Socialite::with('vkontakte')->redirect();
  }

  public function callbackVK(UserRepository $userRepository)
  {
    if (Auth::check()) {
      return redirect()->route('home');
    }
    $user = Socialite::driver('vkontakte')->user();
//    dd($user);

    $userInSystem = $userRepository->getUserBySocId($user, 'vk');
    Auth::login($userInSystem);
    return redirect()->route('home');
  }

  public function loginGitHub()
  {
    if (Auth::check()) {
      return redirect()->route('home');
    }
    return Socialite::with('github')->redirect();
  }

  public function callbackGitHub(UserRepository $userRepository)
  {
    if (Auth::check()) {
      return redirect()->route('home');
    }
    $user = Socialite::driver('github')->user();
//    dd($user);

    $userInSystem = $userRepository->getUserBySocId($user, 'github');

    Auth::login($userInSystem);
    return redirect()->route('home');
  }
}
