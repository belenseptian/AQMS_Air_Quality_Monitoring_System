<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Main;
use App\Account;
use App\Log;
use Session;
use Mail;
use Illuminate\Support\Facades\Storage;

class BackendController extends Controller
{
    public function index()
	{
		if(isset($_COOKIE['cookie_ngayau_user']) && $_COOKIE['cookie_ngayau_user']!='')
		{
			$log = Log::all();
			
			$parameters=array(
				'log'=>$log
			);
			
			return view('backend.index',$parameters);
			
		}
		else
		{
			if (Session::has('user_ngayauv2.0')){
				$log = Log::all();
			
				$parameters=array(
					'log'=>$log
				);
				return view('backend.index',$parameters);
				
			}else{
				return view('backend.login');
			}		
		}
	}
	
	public function login()
	{
		if(isset($_COOKIE['cookie_ngayau_user']) && $_COOKIE['cookie_ngayau_user']!='')
		{
			$log = Log::all();
			
			$parameters=array(
				'log'=>$log
			);
			
			return view('backend.index',$parameters);
			//return redirect(url('/').'/admin');
		}
		else
		{
			
			if (Session::has('user_ngayauv2.0')){
			$log = Log::all();
			
			$parameters=array(
				'log'=>$log
			);
				return view('backend.index',$parameters);
				//return redirect(url('/').'/admin');
			}else{
				return view('backend.login');
			}		
		}
	}
	
	public function signin()
	{
		$this->validate(request(),[
			'username' => 'required',
			'password' => 'required',
		]);
		
		$find=Account::where([
			['username',request('username')],
			['activation',1]
		])->first();
		
		if($find)
		{
			if(Hash::check(request('password'),$find->password))
			{
				if(request('cook')!="")
				{
					setcookie('cookie_ngayau_user', $find->username, time() + (86400 * 30), "/");
					setcookie('cookie_ngayau_admin', $find->is_admin, time() + (86400 * 30), "/");
				}
				else
				{
					Session::put('user_ngayauv2.0',$find->username);
					Session::put('admin_ngayauv2.0',$find->is_admin);
				}
				
				$notif=array(
					'notif'=>'You have been signed in!'
				);
				
				Account::where('username', $find->username)->update(['date' => gmdate('j/m/Y H:i:s', time()+3600*5.5)]);
				
				return redirect(url('/').'/admin')->with('status','You have been signed in!');
				
			}
			else
			{
				$notif=array(
					'notif'=>'Login is failed!'
				);
				
				return view('backend.login',$notif);
			}
		}
		else
		{
			$notif=array(
				'notif'=>'Login is failed!'
			);
			
			return view('backend.login',$notif);
		}
	}
	
	public function register()
	{
			return view('backend.register');
	}
	
	public function store()
	{
		$this->validate(request(),[
			'username' => 'required',
			'password' => 'required',
		]);
		
		$find=Account::where('username',request('username'))->get();
		
		if(count($find)==0)
		{
			if(request('password')==request('repeatpassword'))
			{
				$notif=array(
					'notif' => 'Your registration is successful. Please wait for some time, administrator will scrutinize your account!'
				);
				
				$account = new Account;
				
				$account->username=request('username');
				$account->password=Hash::make(request('password'));
				$account->date='';
				$account->registered_date=gmdate("j/m/Y H:i:s", time()+3600*5.5);
				$account->is_admin=0;
				$account->activation=0;
				$account->unique='default-xxxx';
				$account->save();
				
				return view('backend.register',$notif);
			}
			else
			{
				$notif=array(
					'notif' => 'Please match your passwords!'
				);
				
				return view('backend.register',$notif);
			}
		}
		else
		{
			$notif=array(
				'notif'=>'This username already exists!'
			);
			
			return view('backend.register',$notif);
		}
		
		
	}
	
	public function forgotPassword()
	{
			return view('backend.forgot-password');
	}
	
	public function sendEmail()
	{
		$this->validate(request(),[
			'username' => 'required'
		]);
		
		$find=Account::where('username',request('username'))->first();
		$time=time();
		if($find)
		{
			$data=array('name'=>request('username'),'time'=>$time);
			
			
			
			Mail::send('mail.mail',$data,function($message){
				
				$message->to(request('username'),request('username'))->subject('Password Reset Confirmation');
				$message->from('belenseptian@ppihyderabad.com','Belen Septian');
			});
			
			$notif=array(
				'notif'=>'Password reset confirmation has been sent to your email!'
			);
			
			Account::where('username',request('username'))->update(['unique'=>$time]);
			return view('backend.forgot-password',$notif);
		}
		else
		{
			$notif=array(
				'notif'=>'Your email is not registered in our server!'
			);
			
			return view('backend.forgot-password',$notif);
		}
		
	}
	
	public function startReset($email,$time)
	{
		/*
		$account = Account::all();
		$data=array();
		foreach($account as $acc)
		{
			$data[]=$acc;
		}
		
		echo json_encode($data);
		*/
		
		$parameters=array(
			'email'=>$email,
			'time'=>$time,
		);
		
		$find=Account::where('username',$email)->first();
		$findunique=Account::where('unique',$time)->first();
		
		if(!$find)
		{
			return redirect(url('/').'/admin/login')->with('status','Your email is not registered!');
		}
		else if(!$findunique)
		{
			return redirect(url('/').'/admin/login')->with('status','Your unique code is not found!');
		}
		else
		{
			return view('backend.reset-password',$parameters);
		}
		
	}
	
	public function resetPassword()
	{
		$this->validate(request(),[
			'password' => 'required',
			'ulangipassword' => 'required',
			'emailx' => 'required',
			'timex' => 'required',
		]);
		
		if(request('password')!=request('ulangipassword'))
		{
			return redirect(url('/').'/reset/'.request('emailx').'/'.request('timex'))->with('status', 'Please match your passwords!');
		}
		else
		{
			$password=Hash::make(request('ulangipassword'));
			Account::where('username', request('emailx'))->update(['password' => $password, 'unique' => 'default-xxxx']);
			return redirect(url('/').'/admin/login')->with('status', 'You have successfully changed your password and will be redirected to login page!');
		}
	}
	
	

    public function ajaxRequestPost(Request $request)
    {   
		$log = Log::select('timex','co2','date')->orderBy('id')->limit(100)->get();
		$data=array();
		foreach($log as $lg)
		{
			$data[]=$lg;
		}
		
        return response()->json($data);

    }
	
	public function ajaxRequestPostData(Request $request)
    {   
		//$request->input('data1')
		$main = Main::where('serial',$request->input('data1'))->get();
		$data=array();
		foreach($main as $mains)
		{
			$data[]=$mains;
		}
		
        return response()->json($data);

    }
	
	public function contents($names)
	{
		if(isset($_COOKIE['cookie_ngayau_user']) && $_COOKIE['cookie_ngayau_user']!='')
		{
			$main = Main::all();
			$log = Log::all();
			$account = Account::all();
			$parameters=array(
				'name'=>$names,
				'main'=>$main,
				'log'=>$log,
				'account'=>$account,
			);

			return view('backend.index',$parameters);

		}
		else
		{
			if (Session::has('user_ngayauv2.0')){
				
				$main = Main::all();
				$log = Log::all();
				$account = Account::all();
				$parameters=array(
					'name'=>$names,
					'main'=>$main,
					'log'=>$log,
					'account'=>$account,
				);

				return view('backend.index',$parameters);
			}else{
				return view('backend.login');
			}
		}


	}
	
	public function changePassword()
	{
		$this->validate(request(),[
			'sandilama' => 'required',
			'sandibaru' => 'required',
			'ulangsandi' => 'required',
			'username' => 'required',
		]);


		$find=Account::where('username',request('username'))->first();



		if($find)
		{
			if(Hash::check(request('sandilama'), $find->password))
			{
				if(request('sandibaru')!=request('ulangsandi'))
				{
					return redirect(url('/').'/admin/content/change-password')->with('status', 'Please match your password!');
				}
				else
				{
					Account::where('username', $find->username)->update(['password' => Hash::make(request('ulangsandi'))]);
					Session::forget('user_ngayauv2.0');
					Session::forget('admin_ngayauv2.0');
					unset($_COOKIE['cookie_ngayau_user']);
					unset($_COOKIE['cookie_ngayau_admin']);

					setcookie('cookie_ngayau_user', '', time() - 3600, '/');
					setcookie('cookie_ngayau_admin', '', time() - 3600, '/');
					return redirect(url('/').'/admin')->with('status', 'Your password has been successfully changed, please relogin to access your account!');
				}

			}
			else
			{
				return redirect(url('/').'/admin/content/change-password')->with('status', 'You have entered the wrong password!');
			}
		}

	}
	
	public function logout()
	{
		Session::forget('user_ngayauv2.0');
		Session::forget('admin_ngayauv2.0');
		unset($_COOKIE['cookie_ngayau_user']);
		unset($_COOKIE['cookie_ngayau_admin']);
		setcookie('cookie_ngayau_user', '', time() - 3600, '/');
		setcookie('cookie_ngayau_admin', '', time() - 3600, '/');
		return redirect(url('/').'/admin')->with('status', 'You have been logged out!');
	}
	
	
	public function blockActivation()
	{
		$this->validate(request(),[
			'valsite22' => 'required'
		]);

		Account::where('id', request('valsite22'))->update(['activation' => 0]);

		return redirect(url('/').'/admin/content/account')->with('status', 'This account has been blocked!');



	}
	
	public function activateActivation()
	{
		$this->validate(request(),[
			'valsite24' => 'required'
		]);

		Account::where('id', request('valsite24'))->update(['activation' => 1]);

		return redirect(url('/').'/admin/content/account')->with('status', 'This account has been activated!');



	}
	
	public function enableDevice()
	{
		$this->validate(request(),[
			'valsite24' => 'required'
		]);

		Main::where('serial', request('valsite24'))->update(['activation' => 1]);

		return redirect(url('/').'/admin/content/device')->with('status', 'This device has been enabled!');

	}
	
	public function disableDevice()
	{
		$this->validate(request(),[
			'valsite25' => 'required'
		]);

		Main::where('serial', request('valsite25'))->update(['activation' => 0]);

		return redirect(url('/').'/admin/content/device')->with('status', 'This device has been disabled!');

	}
	
	public function deviceSettings()
	{
		$serial=request('serial');
		$country=request('country');
		$region=request('region');
		

		Main::where('serial', $serial)->update(['country' => $country, 'region' => $region]);

		return redirect(url('/').'/admin/content/device')->with('status', 'Your data have been changed!');



	}

	public function removeActivation()
	{
		$this->validate(request(),[
			'valsite23' => 'required'
		]);

		Account::where('id', request('valsite23'))->delete();

		return redirect(url('/').'/admin/content/account')->with('status', 'This account has been removed!');



	}
	
	public function ajaxRequestPostAcc(Request $request)
    {   
		$data=$request->input('data1');
		
		for($i=0; $i<count($data); $i++)
		{
			Account::where('id', $data[$i])->delete();
		}
		
		/*
		Account::where('id', request('valsite23'))->delete();
				
		$main = Main::where('serial',$request->input('data1'))->get();
		$data=array();
		foreach($main as $mains)
		{
			$data[]=$mains;
		}
		
        return response()->json($request->input('data1'));
		*/
		return response()->json($data);
		
    }

	public function ajaxRequestPostActivate(Request $request)
    {   
		$data=$request->input('data1');
		
		$datal=array();
		for($i=0; $i<count($data); $i++)
		{
			Account::where('id', $data[$i])->update(['activation' => 1]);
	
			$acc = Account::where('id',$data[$i])->get();
			foreach($acc as $accs)
			{
				$datal[]=$accs;
			}
			
		}
		
		/*
		Account::where('id', request('valsite23'))->delete();
				
		$main = Main::where('serial',$request->input('data1'))->get();
		$data=array();
		foreach($main as $mains)
		{
			$data[]=$mains;
		}
		
        return response()->json($request->input('data1'));
		*/
		return response()->json($datal);
		
    }
	
	
	public function ajaxRequestPostDeactivate(Request $request)
    {   
		$data=$request->input('data1');
		
		$datal=array();
		for($i=0; $i<count($data); $i++)
		{
			Account::where('id', $data[$i])->update(['activation' => 0]);
	
			$acc = Account::where('id',$data[$i])->get();
			foreach($acc as $accs)
			{
				$datal[]=$accs;
			}
			
		}
		
		/*
		Account::where('id', request('valsite23'))->delete();
				
		$main = Main::where('serial',$request->input('data1'))->get();
		$data=array();
		foreach($main as $mains)
		{
			$data[]=$mains;
		}
		
        return response()->json($request->input('data1'));
		*/
		return response()->json($datal);
		
    }
	
	public function getFromDevice($s)
	{
		Storage::append('file.log', $s); 
	}
	
	public function getForIonic()
	{
		$postjson = json_decode(file_get_contents('php://input'), true);
		$user = $postjson['username'];
		if($postjson['aksi']=="login")
		{
			$find=Account::where([
				['username',$postjson['username']],
				['activation',1]
			])->first();
			
			if($find)
			{
				if(Hash::check($postjson['password'],$find->password))
				{
					$datauser = array(
						'user_id' => $find->id,
						'username' => $find->username,
						'password' => $find->password
					);
					
			    	Account::where('username', $find->username)->update(['date' => gmdate('j/m/Y H:i:s', time()+3600*5.5)]);
					
					$result = json_encode(array('success'=>true, 'result'=>$datauser));
				}
				else
				{
					$result = json_encode(array('success'=>false, 'msg'=>'Inactive account'));
				}
			}
			else
			{
				 $result = json_encode(array('success'=>false, 'msg'=>'Unregistered Account'));
			}
			
			echo $result;
		}
		else if($postjson['aksi']=="register")
		{
			$find=Account::where('username',$postjson['username'])->get();
			if(count($find)==0)
			{
				$account = new Account;
				
				$account->username=$postjson['username'];
				$account->password=Hash::make($postjson['password']);
				$account->date='';
				$account->registered_date=gmdate("j/m/Y H:i:s", time()+3600*5.5);
				$account->is_admin=0;
				$account->activation=0;
				$account->unique='default-xxxx';
				$account->save();

				$result = json_encode(array('success'=>true, 'result'=>'ok'));
			}
			else
			{
				$result = json_encode(array('success'=>false, 'msg'=>'Account has been registered'));
			}

			echo $result;
		}
		else if($postjson['aksi']=="forgot")
		{
			$find=Account::where('username',$user)->first();
			$time=time();
			if($find)
			{
				$data=array('name'=>$user,'time'=>$time);
				
				
				
				Mail::send('mail.mail',$data,function($message) use ($user){
					
					$message->to($user,$user)->subject('Password Reset Confirmation');
					$message->from('belenseptian@ppihyderabad.com','Belen Septian');
				});
				
				Account::where('username',$user)->update(['unique'=>$time]);

				$result = json_encode(array('success'=>true, 'result'=>'ok'));
			}
			else
			{
				$result = json_encode(array('success'=>false, 'msg'=>'Account has not been registered in the server'));	
			}

			echo $result;
		}
	}
	
	public function showDataFromIonic()
    {
		$postjson = json_decode(file_get_contents('php://input'), true);
		if($postjson['aksi']=="getdata")
		{		
			$log = Log::select('co2','temp','hum','hix','serial','country','region','date','day','month','year','timex','timstamp')->orderByDesc('id')->offset($postjson['start'])->limit($postjson['limit'])->get();
			$data=array();
			foreach($log as $lg)
			{
				$data[] = array(
		
					'co2' => $lg->co2,
					'temp' => $lg->temp,
					'hum' => $lg->hum,
					'hix' => $lg->hix,
					'serial' => $lg->serial,
					'country' => $lg->country,
					'region' => $lg->region,
					'date' => $lg->date,
					'day' => $lg->day,
					'month' => $lg->month,
					'year' => $lg->year,
					'timex' => $lg->timex,
					'timstamp' => $lg->timstamp
					
				);
			}
			
			$result = json_encode(array('success'=>true, 'result'=>$data));
			
			echo $result;
		}
		
    }
	
	public function showDataFromChart()
    {
		header("Access-Control-Allow-Origin: *");
		$postjson = json_decode(file_get_contents('php://input'), true);
		if($postjson['aksi']=="getChart")
		{		
			$log = Log::select('co2','temp','hum','hix','serial','country','region','date','day','month','year','timex','timstamp')->orderBy('id')->limit($postjson['limit'])->get();
			$data=array();
			foreach($log as $lg)
			{
				$data[] = array(
		
					'co2' => $lg->co2,
					'temp' => $lg->temp,
					'hum' => $lg->hum,
					'hix' => $lg->hix,
					'serial' => $lg->serial,
					'country' => $lg->country,
					'region' => $lg->region,
					'date' => $lg->date,
					'day' => $lg->day,
					'month' => $lg->month,
					'year' => $lg->year,
					'timex' => $lg->timex,
					'timstamp' => $lg->timstamp
					
				);
			}
			
			$result = json_encode(array('success'=>true, 'result'=>$data));
			
			echo $result;
		}
	}
}