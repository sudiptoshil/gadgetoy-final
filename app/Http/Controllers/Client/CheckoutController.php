<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\str;
use Mail;
use App\Mail\verifyemail;

class CheckoutController extends Controller
{
    public function login()
    {
        return view('Client.login.login');

    }

    public function loginProcess(Request $request)
    {
        $client = Client::where('email', $request->email)->first();
        if ($client) {
            if (password_verify($request->password, $client->password)) {
                
                if($client->status == 1){
                    Session::put('client_id', $client->id);
                    Session::put('client_name', $client->full_name);
                    Session::put('client_first_name', $client->first_name);
                    Session::put('client_last_name', $client->last_name);
                    Session::put('client_email', $client->email);
                    Session::put('client_contact_no', $client->contact_no);
                    Session::put('client_nid', $client->nid);
                    Session::put('client_present_address', $client->present_address);
                    Session::put('client_permanent_address', $client->permanent_address);
                    return redirect('/');
                 }
                 else{
                    return redirect('client-login')->with('message', 'please verify your account first!!');
                 }
              
            } else {
                return redirect('client-login')->with('message', 'Wrong Password!!');
            }
        } else {
            return redirect('client-login')->with('message', 'Invalid email!!');
        }

    }


    public function register()
    {
        return view('Client.register.register');

    }

    public function registerProcess(Request $request)
    {

        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'required|unique:clients',
            'contact_no' => 'required',
            'password' => 'required'
        ]);
        $client = new Client();
        $client->full_name         = $request->full_name;
        $client->email             = $request->email;
        $client->contact_no        = $request->contact_no;
        $client->password          = bcrypt($request->password);
        $client->varify_token      = str::random(40);

        $client->save();
        $thisclient = Client::find($client->id);
        $this->sendemail($thisclient);
        // return $client;
        // Session::put('client_id',$client->id);
        // Session::put('client_name',$client->full_name);
        // Session::put('client_email',$client->email);
        // Session::put('client_contact_no',$client->contact_no);
        // Client::register($request);

        return redirect('verifyemailfirst');
        // return Redirect::to('/');
    }

    public function verify_email_first()
    {
        return view('Client.login.verifyemailfirst');
    }

    public function send_email_done($email,$varify_token)
    {
        // return $email;
        // return $varify_token;
        $client = Client::where(['email'=> $email,'varify_token'=>$varify_token])->first();
        // return $client;
        if($client)
        {
           return Client::where(['email'=> $email,'varify_token'=>$varify_token])->update(['status'=>'1',]);
        }
        // return redirect('/');
    }


    public function sendemail($thisclient)
    {
        Mail::to($thisclient['email'])->send(new verifyemail($thisclient));
    }

    public function logout()
    {

        Session::forget('client_id');
        // Session::forget('client_first_name');
        // Session::forget('client_last_name');
        // Session::forget('client_name');
        // Session::forget('client_email');
        // Session::forget('client_present_address');
        // Session::forget('client_permanent_address');
        // Session::forget('client_contact_no');
        // Session::forget('client_nid');

        return redirect('/');

    }
}
