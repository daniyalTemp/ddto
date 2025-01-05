<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

use Psy\VersionUpdater\Downloader\FileDownloader;
use Throwable;

class userController extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('dashboard.user.list', compact('users'));
    }

    public function add()
    {

        return view('dashboard.user.form');
    }

    public function save(Request $request, int $id)
    {
        $valRules = [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'image' => 'image',
        ];
        $valMassage = [
            'firstName.required' => 'ورود نام الزامیست',
            'lastName.required' => 'ورود نام خانوادگی الزامیست',
            'email.required' => 'ورود ایمیل الزامیست',
            'email.email' => 'ایمیل وارد شده معتبر نیست',
//            'email.unique' => 'ایمیل وارد شده تکراری نیست',
//            'password.required' => 'ورود رمز الزامیست',

            'image.image' => 'عکس ارسالی معتبر نیست',
        ];
        if ($id == -1) {
            $valMassage = ['email.unique' => 'ایمیل وارد شده تکراری است'];
            $valRules = ['email' => 'required|email|unique:App\Models\User,email'];

        }
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
        if ($id == -1) {
            $user = User::create([
                'firstName' => $request->firstname ? $request->firstname : '-',
                'lastName' => $request->lastName ? $request->lastName : "-",
                'email' => $request->email,
                'NationalCode' => $request->NationalCode ? $request->NationalCode : null,
                'password' => $request->password ? $request->password : '123456789',
                'cardNumber' => $request->cardNumber ? $request->cardNumber : null,
                'birthday' => $request->birthDate ? $request->birthday : null,
                'isActive' => $request->isActive ? true : false,
                'sex' => $request->sex ? $request->sex : null,
                'role' => $request->role ? $request->role : 'user',
            ]);
        } else {

            $user = User::find($id);
            $user->firstName = $request->firstname ? $request->firstname : $user->firstName;
            $user->lastName = $request->lastName ? $request->lastName : $user->lastName;
            $user->email = $request->email;
            $user->NationalCode = $request->NationalCode ? $request->NationalCode : $user->NationalCode;
            if ($request->password != null)
                $user->password = $request->password;
            $user->cardNumber = $request->cardNumber ? $request->cardNumber : null;
            $user->birthday = $request->birthday ? $request->birthday : null;
            $user->isActive = $request->isActive ? true : false;
            $user->sex = $request->sex ? $request->sex : $user->sex;
            $user->role = $request->role ? $request->role : $user->role;
            $user->save();

        }

        if ($request->files->count() > 0) {
            $user->pic = $request->file('image')->getClientOriginalName();
            $user->save();
            $request->file('image')->move(storage_path('app/public/images/profiles/' . $user->id . '/'), $request->file('image')->getClientOriginalName());
        }
        return redirect()->route('dashboard.user.list')->with(['msg' => 'عملیات با موفیت انجام شد']);
//        dd($request->all());
    }

    public function del(Request $request, int $id)
    {
        User::destroy([$id]);
        return redirect()->route('dashboard.user.list')->with(['msg' => 'عملیات با موفیت انجام شد']);

    }

    public function Profile()
    {
        $user = Auth::user();
        return view('dashboard.user.profile', compact('user'));
    }

    public function saveProfile(Request $request)
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
        $user->firstName = $request->firstname ? $request->firstname : $user->firstName;
        $user->lastName = $request->lastName ? $request->lastName : $user->lastName;
//        $user->email = $request->email;
        $user->NationalCode = $request->NationalCode ? $request->NationalCode : $user->NationalCode;
        if ($request->password != null)
            $user->password = $request->password;
        $user->cardNumber = $request->cardNumber ? $request->cardNumber : null;
        $user->birthday = $request->birthday ? $request->birthday : null;
//        $user->isActive = $request->isActive ? true : false;
        $user->sex = $request->sex ? $request->sex : $user->sex;
//        $user->role = $request->role ? $request->role : $user->role;
        $user->save();


        if ($request->files->count() > 0) {
            $user->pic = $request->file('image')->getClientOriginalName();
            $user->save();
            $request->file('image')->move(storage_path('app/public/images/profiles/' . $user->id . '/'), $request->file('image')->getClientOriginalName());
        }
        return redirect()->route('dashboard.user.Profile')->with(['msg' => 'عملیات با موفیت انجام شد']);
    }


    public function edit(Request $request, int $id)
    {
        $user = User::find($id);
//        dd($user);
        return view('dashboard.user.form', compact('user'));
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {

        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required',
            ]
            , [
                'email.required' => 'وارد کردن ایمیل الزامی است',
                'password.required' => 'وارد کردن رمز الزامی است',
            ]

        );

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], ($request->has('remember') ? true : false))) {

            if (\Illuminate\Support\Facades\Cookie::has('ddtoOrderId')) {
                $order = orders::find((\Illuminate\Support\Facades\Cookie::get('ddtoOrderId')));
                if ($order->user == null) {
                    $order->user = Auth::user()->id;
                    $order->save();
                } elseif ($order->user != Auth::user()->id) {
                    \Illuminate\Support\Facades\Cookie::expire('ddtoOrderId');
                }
            }
            if (Auth::user()->role == 'user')
                return redirect()->route('index');
            return redirect()->route('dashboard.index');
        } else
            return redirect()->route('login')->withErrors(['msg' => 'ورود ناموفق']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Redirect the user to Google’s OAuth page.
     */


}
