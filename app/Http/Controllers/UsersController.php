<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Employers;
use App\Noks;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountNumberEmail;
use App\Mail\ARMpensionEmail;
use App\Mail\VerificationCodeEmail;
class UsersController extends Controller
{
    //
    public function home_page(){
        return view('users.index');
    }
    public function register(){
        return view('users.register');
    }
    public function store(Request $request)
    {
        // `surname`, `firstname`, `email`, `address`, `phone`, `dob`, `code`, `is_verified`
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'surname' => 'required',
            'firstname' => 'required',
            'phone' => 'required',
            'dob' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $account_number = rand(1000000000,9999999999);
        $code = rand(1000,9999);
        $save = User::create([
            'email' => $request->email,
            'surname' => $request->surname,
            'firstname' => $request->firstname,
            'phone'=>$request->phone,
            'dob'=>$request->dob,
            'account_number'=>$account_number,
            'code' => $code
        ]);

        if(!$save){
            return redirect('/register')->with('error','Registration Failed, Contact the Admin');
        }

        Mail::to($request->email)->send(new AccountNumberEmail($account_number,$code));

        return redirect('/register')->with('success','Registration Successful an email has been sent to your email address with your  4-digit verification code');

    }

    public function verify_user(){
        return view('users.verify_user');
    }

    public function process_verify_user(Request $request){
        $validator = Validator::make($request->all(),[
            'code' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if($user == null){
            return back()->with('error','User with email doesnt exist ');
        }

        $user_code = $user->code;

        if($request->code != $user_code){
            return back()->with('error','Code is incorrect');
        }else{
            $user->is_verified = true;
            $user->save();
            return back()->with('success','User verified successfully');
        }
    }

    public function process_add_employer(Request $request){
        // <!-- `user_id`, `employer_name`, `employer_address`, `employer_email`, -->
        $validator = Validator::make($request->all(),[
            'user_email' => 'required',
            'employer_name' => 'required',
            'employer_address' => 'required',
            'employer_email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::where('email', $request->user_email)->first();

        if($user == null){
            return back()->with('error','User with email doesnt exist');
        }

        if($user->is_verified != true){
            return back()->with('error','Sorry User not verified');
        }

        $user_id = $user->id;

        $employer = new Employers();

        $employer->user_id = $user_id;
        $employer->employer_name = $request->employer_name;
        $employer->employer_address = $request->employer_address;
        $employer->employer_email = $request->employer_email;

        $save_employer =  $employer->save();

        if(!$save_employer){
            return back()->with('error','Sorry Employer could not be saved');
        }
        
        Mail::to('it@armpension.com')->send(new ARMpensionEmail($user));

        return back()->with('success','Employer Details saved successfully');
    }
    public function process_add_nok(Request $request){
        // <!-- `user_id`, `NOK_surname`, `NOK_firstname`, `NOK_address`, `NOK_mobile_number`, `NOK_email`,  -->
        $validator = Validator::make($request->all(),[
            'user_email' => 'required|email',
            'NOK_surname' => 'required',
            'NOK_firstname' => 'required',
            'NOK_address' => 'required',
            'NOK_mobile_number' => 'required',
            'NOK_email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::where('email', $request->user_email)->first();

        if($user == null){
            return back()->with('error','User with email doesnt exist');
        }

        if($user->is_verified != true){
            return back()->with('error','Sorry User not verified');
        }

        $user_id = $user->id;

        $nok = new Noks();

        $nok->user_id = $user_id;
       
        // `NOK_surname`, `NOK_firstname`, `NOK_address`, `NOK_mobile_number`, `NOK_email`,
        $nok->NOK_surname = $request->NOK_surname;
        $nok->NOK_firstname = $request->NOK_firstname;
        $nok->NOK_address = $request->NOK_address;
        $nok->NOK_mobile_number = $request->NOK_mobile_number;
        $nok->NOK_email = $request->NOK_email;

        $save_nok =  $nok->save();

        if(!$save_nok){
            return back()->with('error','Sorry Next of Kin could not be saved');
        }

        Mail::to('it@armpension.com')->send(new ARMpensionEmail($user));

        return back()->with('success','Next of Kin Details saved successfully');
    }
}
