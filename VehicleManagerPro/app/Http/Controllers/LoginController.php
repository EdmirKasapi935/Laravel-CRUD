<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showlogin(): View
    {
        return view("auth.login");
    }

    public function logout(Request $request)
    {
      Auth::guard("web")->logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return to_route("homepage");
    }

    public function adminLogout(Request $request)
    {
      Auth::guard("web")->logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();
      $request->session()->flush();

      return to_route("homepage");
    }

    public function showregister(): View
    {
        return view("auth.register");
    }

    public function showReset(): View
    {
      return view("auth.resetpasswordform");
    }
}
