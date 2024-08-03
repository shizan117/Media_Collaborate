<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        // Check if the phone number exists
        $user = User::where('phone', $credentials['phone'])->first();

        if ($user) {
            // Check if the role is public or video man
            if (in_array($user->role, ['public', 'video_man','video_editor','admin'])) {
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();

                    // Redirect based on the user role
                    if ($user->role === 'public') {
                        return redirect()->route('dashboard');  // Public user dashboard
                    } elseif ($user->role === 'video_man') {
                        return redirect()->route('video_man.dashboard');  // Video man dashboard
                    }
                    elseif ($user->role === 'video_editor') {
                        return redirect()->route('video_editor.dashboard');  // Video editor dashboard
                    }
                    elseif ($user->role === 'admin') {
                        return redirect()->route('admin.dashboard');  // admin dashboard
                    }
                }

                return back()->withErrors([
                    'password' => 'The provided password does not match our records.',
                ]);
            }

            return back()->with('error', 'Unauthorized access.');
        }

        return back()->withErrors([
            'phone' => 'The provided phone number does not match our records.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
