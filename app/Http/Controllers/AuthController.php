<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $creds = [
            'email' => $request->email,
            'password' => $request->password
        ];
        //Checking User Registeration Code Start
        $user = User::where('email',$request->email)->first();
        if(!$user)
        {
            toastr()->error('User is Not Registered.');
            return redirect()->back();
        }
        if($user && !$user->is_verified || !$user->is_active)
        {
            toastr()->error('User is Not Active or verified by admin please contact.');
            return redirect()->back();
        }
        //Checking User Registeration Code End
        //User Authentication Code Start
        if(Auth::guard('user')->attempt($creds))
        {
            if($user->role->name == 'Super Admin')
            {
                toastr()->success('You Login Successfully');
                return redirect()->intended(route('admin.dashboard.index'));
            }else if($user->role->name == 'Project Manager')
            {
                toastr()->success('You Login Successfully');
                return redirect()->intended(route('project.dashboard.index'));
            }
            else if($user->role->name == 'Field Staff')
            {
                toastr()->success('You Login Successfully');
                return redirect()->intended(route('field_staff.dashboard.index'));
            }
            else if($user->role->name == 'Crp')
            {
                toastr()->success('You Login Successfully');
                return redirect()->intended(route('crp.dashboard.index'));
            }
            else if($user->role->name == 'Executive')
            {
                toastr()->success('You Login Successfully');
                return redirect()->intended(route('executive.dashboard.index'));
            }
            else{
                Auth::logout();
                toastr()->error('User is In Active or Not Verified Yet By Admin.');
                return redirect()->back();

            }
        } else {
            toastr()->error('Wrong Password.');
            return redirect()->back();
        }
        //User Authentication Code End
    }
    
    public function logout()
    {        
        Auth::logout();
        toastr()->success('You Logout Successfully');
        return redirect('/');
    }
    public function register(Request $request)
    {
        try{
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required',
                'image' => 'required',
                'password' => 'required',
                'role_id' => 'required',
            ]);
            if($request->password != $request->confirm_password)
            {
                toastr()->error('Password do not match');
                return redirect()->back();
            }
            $validator = Validator::make($request->all(),[
                'email' => 'required|unique:users'
            ]);
            if($validator->fails()){
                toastr()->error('Email already exists');
                return redirect()->back();
            }
            $user = User::create($request->all());
            toastr()->success('Your Account Has Been successfully Created, Please Login and See Next Step Guides.');
            return redirect(url('/'));
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return back();
        }
    
    }
    public function getCityAgainstStates(Request $request)
    {
        $cities = City::where('state_id',$request->state_id)->get();        
        return response()->json($cities);

    }
    public function getStateAgainstCountries(Request $request)
    {
        $states = State::where('country_id',$request->country_id)->get();        
        return response()->json($states);

    }
}
