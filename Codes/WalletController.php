<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

function walletbalance()
{
					$data = DB::table('wallet_users')->where('mobileno','=',$_SESSION['mobileno'])->get();
					foreach($data as $d)
					{
					$walletbalance = $d->walletbalance;
					}
					return $walletbalance;
}

function mobilebalance()
{
					$data = DB::table('wallet_users')->where('mobileno','=',$_SESSION['mobileno'])->get();
					foreach($data as $d)
					{
					$mobilebalance= $d->mobilebalance;
					}
					return $mobilebalance;
}

function rechargethreshold()
{
					$data = DB::table('wallet_users')->where('mobileno','=',$_SESSION['mobileno'])->get();
					foreach($data as $d)
					{
					$rechargethreshold = $d->rechargethreshold;
					}
					return $rechargethreshold;
}

class WalletController extends Controller
{

	
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function loginview(Request $request)
    {
					session_start();
					if(!isset($_SESSION['mobileno']))
					{
					return view('wallet.loginview')->with('msg','');
					}
					else
					{
					return redirect()->action('WalletController@loadhome');
					}
			
    }
    
     public function login(Request $request)
    {
    					session_start();
					
					if(DB::table('wallet_users')->where('mobileno','=',$request->mobileno)->get())
					{
					if(DB::table('wallet_users')->where('mobileno','=',$request->mobileno)->where('password','=',$request->password)->get())
					{
					$_SESSION['mobileno'] = $request->mobileno;
					return redirect()->action('WalletController@loadhome');
					}
					else
					{
					$msg = "<p>Incorrect Password. Please try again</p>";
					}
					}
					else
					{
					$msg = "<p>User not registered</p>";
					}
					return view('wallet.loginview')->with('msg',$msg);
			
    }  
    
    
     public function registerview(Request $request)
    {
					session_start();
					if(!isset($_SESSION['mobileno']))
					{
					return view('wallet.registerview')->with('msg','');
					}
					else
					{
					return redirect()->action('WalletController@loadhome');
					}
			
    }
    
     public function register(Request $request)
    {
					session_start();
					if(DB::table('wallet_users')->where('mobileno','=',$request->mobileno)->get())
					{
					$msg = "<p>User already registered.Plase login.</p>";
					return view('wallet.loginview')->with('msg',$msg);
					}
					else
					{
					DB::table('wallet_users')->insert(['name' => $request->name,'mobileno' => $request->mobileno,'password' => $request->password]);
					$_SESSION['mobileno'] = $request->mobileno;
					return redirect()->action('WalletController@loadhome');
					}
			
    } 
    
    	public function loadhome(Request $request)
    	{
			session_start();
			if(isset($_SESSION['mobileno']))
			{	
					return view('wallet.homepage')->with('msg','')->with('walletbalance',walletbalance())->with('rechargethreshold',rechargethreshold())->with('mobileno',$_SESSION['mobileno']);
						
			}
			else
			{
				return redirect()->action('WalletController@loginview');
			}	
    	}
    	
    
    public function addmoney(Request $request)
    {
    			session_start();
			if(isset($_SESSION['mobileno']))
			{
    					$data = DB::table('wallet_users')->where('mobileno','=',$_SESSION['mobileno'])->get();
					foreach($data as $d)
					{
					$oldwalletbalance = $d->walletbalance;
					}
					$updatedwalletbalance = $oldwalletbalance + $request->amount;
					DB::table('wallet_users')->where('mobileno','=', $_SESSION['mobileno'])->update(array('walletbalance'=>$updatedwalletbalance));
					$msg = $request->amount." Rs was added successfully to your accoount. Updated wallet balance: ".$updatedwalletbalance;
					return view('wallet.homepage')->with('msg',$msg)->with('walletbalance',walletbalance())->with('rechargethreshold',rechargethreshold())->with('mobileno',$_SESSION['mobileno']);
					
			}
			else
			{
				return redirect()->action('WalletController@loginview');
			}
					
			
    }
    
	public function rechargemobile(Request $request)
    	{
			session_start();
			if(isset($_SESSION['mobileno']))
			{		
					$data = DB::table('wallet_users')->where('mobileno','=',$_SESSION['mobileno'])->get();
					foreach($data as $d)
					{
					$oldwalletbalance = $d->walletbalance;
					$oldmobilebalance = $d->mobilebalance;
					}
					$updatedwalletbalance = $oldwalletbalance - $request->amount;
					DB::table('wallet_users')->where('mobileno','=', $_SESSION['mobileno'])->update(array('walletbalance'=>$updatedwalletbalance));
					$msg = "Thank You for recharging your mobile. ".$request->amount." Rs was deducted from your wallet for the recharge done. Updated wallet balance: ".$updatedwalletbalance;
					
					if($request->mobileno == $_SESSION['mobileno'])
					{
					$updatedmobilebalance = $oldmobilebalance + $request->amount;
					DB::table('wallet_users')->where('mobileno','=', $_SESSION['mobileno'])->update(array('mobilebalance'=>$updatedmobilebalance));
					}
					return view('wallet.homepage')->with('msg',$msg)->with('walletbalance',walletbalance())->with('rechargethreshold',rechargethreshold())->with('mobileno',$_SESSION['mobileno']);
					
			}
			else
			{
				return redirect()->action('WalletController@loginview');
			}		
    	}
    
    	public function changerechargethreshold(Request $request)
    	{
			session_start();
			if(isset($_SESSION['mobileno']))
			{		
					DB::table('wallet_users')->where('mobileno','=', $_SESSION['mobileno'])->update(array('rechargethreshold'=>$request->rechargethreshold));
					return view('wallet.homepage')->with('msg','')->with('walletbalance',walletbalance())->with('rechargethreshold',rechargethreshold())->with('mobileno',$_SESSION['mobileno']);
			}
			else
			{
				return redirect()->action('WalletController@loginview');
			}		
    	}
    	
    	public function mytransactions(Request $request)
    	{
			session_start();
			if(isset($_SESSION['mobileno']))
			{	
					$data = DB::table('wallet_transactions')->where('mobileno','=',$_SESSION['mobileno'])->get();
					$html = '<thead>
					<tr>
						<th>Invoice#</th>
						<th>Date</th>
						<th>Amount</th>
						<th>Status</th>
						<th>Transaction Type</th>
					</tr>
				 </thead>
				 <tbody>';
					foreach($data as $d)
					{
					$html.= '<tr>
						<td>'.$d->transactionid.'</td>
						<td>'.$d->transactiondate.'</td>
						<td>'.$d->amount.'Rs</td>
						<td>'.$d->status.'</td>
						<td>'.$d->transactiontype.'</td>
						</tr>';
					}
					$html.='</tbody>';
					return view('wallet.transactions')->with('html',$html);
				}
			else
			{
				return redirect()->action('WalletController@loginview');
			}	
    	}
    	
    	public function callsimulator(Request $request)
    	{
			session_start();
			if(isset($_SESSION['mobileno']))
			{				
					return view('wallet.callsimulator1')->with('mobilebalance',mobilebalance());
			}
			else
			{
				return redirect()->action('WalletController@loginview');
			}		
    	}
    	
    	public function dial(Request $request)
    	{
			session_start();
			if(isset($_SESSION['mobileno']))
			{
					return view('wallet.callsimulator2')->with('mobileno',$request->mobileno);
			}
			else
			{
				return redirect()->action('WalletController@loginview');
			}		
    	}
    	
    	public function disconnect(Request $request)
    	{
    			session_start();
			if(isset($_SESSION['mobileno']))
			{
    				$str = $request->total;
				$seconds = strtotime("1970-01-01 $str UTC");
				
				$updatedmobilebalance = mobilebalance() - ($seconds/100);
				DB::table('wallet_users')->where('mobileno','=', $_SESSION['mobileno'])->update(array('mobilebalance'=>$updatedmobilebalance));
				return redirect()->action('WalletController@callsimulator');
    			}
			else
			{
				return redirect()->action('WalletController@loginview');
			}	
					
    	}
    	
    	public function logout()
	{	
		session_start();
		session_unset();
		return redirect()->action('WalletController@loginview');
	}
 }
    
    