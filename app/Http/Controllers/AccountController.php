<?php

namespace App\Http\Controllers;

use App\Accounts;
use App\TransactionDetail;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function showAllAccounts(\Illuminate\Http\Request $request)
    {
		$temp_user_id="";	
		if(empty($request->header('user_id')))
		{
			$headers=getallheaders();
			foreach($headers as $key=>$val)
			{
				if($key=="user_id")
				{
					$temp_user_id=$val;
					break;
				}
			}
		} 
		else
		{
			$temp_user_id = $request->header('user_id');
		}
		
		if(empty($temp_user_id))
		{
			return "";
		}
        return response()->json(Accounts::where('assigned_user_id',$temp_user_id)->get());
    }

    public function showTransactionDetail($account_id)
    {
        return response()->json(TransactionDetail::where('account_id',$account_id)->get());
    }
	public function showOneAccount($id)
	{
		return response()->json(Accounts::find($id));
	}
    
}
