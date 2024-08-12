<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
            if (in_array($user->role, ['video_man','video_editor','admin'])) {
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();

                    // Redirect based on the user role
//                    if ($user->role === 'public') {
//                        return redirect()->route('dashboard');  // Public user dashboard
//                    }
                    if ($user->role === 'video_man') {
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


    public function PublicLogin(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        // Check if the phone number exists
        $user = User::where('phone', $credentials['phone'])->first();

        if ($user) {
            // Check if the role is public or video man
            if (in_array($user->role, ['public'])) {
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();

                    // Redirect based on the user role
                    if ($user->role === 'public') {
                        return redirect()->route('dashboard');  // Public user dashboard
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

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Path to default image
            $defaultImage = 'images/default.png';

            // Ensure the public/logos directory exists
            Storage::makeDirectory('public/logos');

            // Copy default image to storage
            $filePath = 'public/logos/default.png';
            if (!Storage::exists($filePath)) {
                Storage::copy($defaultImage, $filePath);
            }

            User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'photo' => 'logos/default.png', // Default photo path
                'password' => Hash::make($request->password),
                'role' => 'public',
            ]);

            return redirect()->route('landingPage')->with('success', 'Registration successful. Please login.');
        } catch (\Exception $e) {
            \Log::error('Registration Error: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');

    }

    public function PublicLogOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }
}
