<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Throwable;

class userController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }


    /**
     * Handle the callback from Google.
     */
    public function callback(Request $request)
    {
//        dd($request->all());
//        dd(file('s',0,Socialite::driver('google')->user()->getAvatar()));
        try {
            // Get the user information from Google
            $user = Socialite::driver('google')->user();
//            dd($user->user['given_name']);
        } catch (Throwable $e) {
            return redirect()->route('login')->withErrors(['msg' => 'ورود ناموفق - خطایی رخ داد']);
        }

        // Check if the user already exists in the database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            if (!File::isDirectory(storage_path('app/public/images/profiles/') . $existingUser->id))
                File::makeDirectory(storage_path('app/public/images/profiles/') . $existingUser->id);
            File::put(storage_path('app/public/images/profiles/' . $existingUser->id . '/' . $existingUser->email . '.jpg'), file_get_contents($user->avatar));

            // Log the user in if they already exist
            Auth::login($existingUser);
            $newUser = $existingUser;

        } else {
            // Otherwise, create a new user and log them in
            $newUser = User::updateOrCreate([
                'email' => $user->email
            ], [
                'firstName' => $user->user['given_name'],
                'lastName' => $user->user['family_name'],
                'googleId' => $user->id,
                'password' => bcrypt(Str::random(8)), // Set a random password
                'pic' => $user->email . '.jpg', // pic name for db
                'email_verified_at' => now()
            ]);

            File::makeDirectory(storage_path('app/public/images/profiles/') . $newUser->id);
            File::put(storage_path('app/public/images/profiles/' . $newUser->id . '/' . $user->email . '.jpg'), file_get_contents($user->avatar));

            Auth::login($newUser);
        }
//        dd(\Illuminate\Support\Facades\Cookie::has('ddtoOrderId'));
        if (\Illuminate\Support\Facades\Cookie::has('ddtoOrderId')) {
            $order = orders::find((\Illuminate\Support\Facades\Cookie::get('ddtoOrderId')));
//            dd($newUser);
            if ($order->user == null) {
                $order->user = $newUser->id;
                $order->save();
            } elseif ($order->user != $newUser->id) {
                \Illuminate\Support\Facades\Cookie::expire('ddtoOrderId');
            }
        }


        if ($newUser->NationalCode != null && $newUser->phone != null)
            return redirect()->route('index');
        else
            return redirect()->route('profile');
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
//        dd($user->Orders()->get());
        return view('front.user.profile', compact('user'));

    }

    public function profileSave(Request $request)
    {
        $valRules = [
            'firstName' => 'required',
            'lastName' => 'required',
            'image' => 'image',
        ];
        $valMassage = [
            'firstName.required' => 'ورود نام الزامیست',
            'lastName.required' => 'ورود نام خانوادگی الزامیست',
//            'email.unique' => 'ایمیل وارد شده تکراری نیست',
//            'password.required' => 'ورود رمز الزامیست',

            'image.image' => 'عکس ارسالی معتبر نیست',
        ];

//        dd($request->all());
        if ($request->get('password') != null) {
            $valMassage = ['password.min' => 'رمز عبور کمتر از 6 کاراکتر',
                'password.max' => 'رمز عبور بیشتر از 12 کاراکتر',];
            $valRules = ['password' => 'min:6|max:12',
            ];

        }
        if ($request->get('cardNumber') != null) {
            $valMassage = ['cardNumber.digits' => 'شماره کارت 16 مجاز نیست',
            ];
            $valRules = ['cardNumber' => 'digits:16',

            ];

        }

        $this->validate($request, $valRules, $valMassage);
//        dd(substr($request->birthday ,8,2 ));
//dd(Verta::createJalaliDate(substr($request->birthday ,0,4 ) , substr($request->birthday ,5,2 ) ,substr($request->birthday ,8,2 ))->toCarbon());


        $user = Auth::user();
//        dd($request->all());
        $user->firstName = $request->firstName ? $request->firstName : $user->firstName;
        $user->lastName = $request->lastName ? $request->lastName : $user->lastName;
//        $user->email = $request->email;
        $user->NationalCode = $request->NationalCode ? $request->NationalCode : $user->NationalCode;
        if ($request->password != null)
            $user->password = $request->password;
        $user->cardNumber = $request->cardNumber ? $request->cardNumber : null;
        $user->phone = $request->phone ? $request->phone : null;
        $user->birthday = $request->birthday ? $request->birthday : null;
//        $user->isActive = $request->isActive ? true : false;
        $user->sex = $request->sex ? $request->sex : $user->sex;
//        $user->role = $request->role ? $request->role : $user->role;
        $user->save();

//        dd($user);

        if ($request->files->count() > 0) {
            $user->pic = $request->file('image')->getClientOriginalName();
            $user->save();
            $request->file('image')->move(storage_path('app/public/images/profiles/' . $user->id . '/'), $request->file('image')->getClientOriginalName());
        }
        return redirect()->route('profile')->with(['msg' => 'عملیات با موفیت انجام شد']);

    }
}
