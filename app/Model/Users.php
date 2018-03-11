<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class Users extends Model {

    protected $table = 'tbl_users';
    
    
    public function saveUserInfo($request,$companyId) {
        
        $newpassword = ($request->input('password') != '') ? $request->input('password') : null;
        $newpass = Hash::make($newpassword);
        
        $objUser = new Users();
        $objUser->first_name = $request->input('first_name');
        $objUser->last_name = $request->input('last_name');
        $objUser->mobile = $request->input('mobile');
        $objUser->email = $request->input('email');
        $objUser->role_type = 'company';
        $objUser->password = $newpass;
        $objUser->company_id  = $companyId;
        $objUser->created_at = date('Y-m-d H:i:s');
        $objUser->save();
        return TRUE;
    }
    public function updateUserInfo($request) {
        
        $userId = $request->input('user_id');
        $objUser =  Users::find($userId);
        $objUser->first_name = $request->input('first_name');
        $objUser->last_name = $request->input('last_name');
        $objUser->mobile = $request->input('mobile');
        $objUser->save();
        return TRUE;
    }
    public function getUserInfo($userId) {
        
        $user = Users::select('tbl_users.id',
                'tbl_users.first_name',
                'tbl_users.last_name',
                'tbl_users.mobile',
                'tbl_users.company_id'
                )
                ->where('tbl_users.id', '=', $userId)
                ->get()->toArray();
        return $user[0];
    }
    public function checkUserInfo($request) {
        
        $user = Users::select('tbl_users.id',
                'tbl_users.first_name',
                'tbl_users.last_name',
                'tbl_users.mobile'
                )
                ->where('tbl_users.email', '=', $request->input('email'))
                ->get()->toArray();
        return $user;
    }
    
   public function updateUserPassword($request) {
        
        $newpassword = ($request->input('new_password') != '') ? $request->input('new_password') : null;
        $newpass = Hash::make($newpassword);
        $userId = $request->input('user_id');
        $objUser = Users::find($userId);
        $objUser->password = $newpass;
        $objUser->save();
        return TRUE;
    }
    
    public function changePic($request)
    {
        $destinationPath = public_path() . '/uploads/company';

        $file1 = $request->file('profilepic');
       
        $file_name1 = '';
        $file_name2 = '';
        if (!empty($file1)) {
            $time = time();
            $file_name1 = $time .'-'. $file1->getClientOriginalName();
            $file1->move($destinationPath, $file_name1);
        }
        $userId = $request->input('user_id');
        $objUser = Users::find($userId);
        $objUser->profile_pic = $file_name1;
        $objUser->save();
        return TRUE;
    }
    public function fileupload($request)
    {
        $destinationPath = public_path() . '/uploads/company';

        $file1 = $request->file('profilepic');
       
        $file_name1 = '';
        $file_name2 = '';
        if (!empty($file1)) {
            $time = time();
            $file_name1 = $time .'-'. $file1->getClientOriginalName();
            $file1->move($destinationPath, $file_name1);
        }
        $userId = $request->input('user_id');
        $objUser = Users::find($userId);
        $objUser->profile_pic = $file_name1;
        $objUser->save();
        return TRUE;
    }
    
    public function getUserList($company_id)
    {
        $getUser = Users::select('*');
        $getUser->where('role_type','member');
        $getUser->where('company_id',$company_id);
        
        $result = $getUser->get()->toArray();

        return $result;
    }
    
    public function memberAdd($request,$companyId)
    {
        $newpassword = ($request->input('password') != '') ? $request->input('password') : null;
        $newpass = Hash::make($newpassword);
        
        $objUser = new Users();
        $objUser->first_name = $request->input('first_name');
        $objUser->last_name = $request->input('last_name');
        $objUser->mobile = $request->input('mobile');
        $objUser->email = $request->input('email');
        $objUser->role_type = 'member';
        $objUser->password = $newpass;
        $objUser->company_id  = $companyId;
        $objUser->created_at = date('Y-m-d H:i:s');
        $objUser->save();
        return TRUE;
    }
    
    public function getUserDetail($userId)
    {
         $getUser = Users::select('tbl_users.*')
               ->where('tbl_users.id',$userId)
                ->get()->toArray();
          
        return $getUser[0];
    }
    
    public function userDelete($request)
    {
          return Users::where('id', $request->input('id'))->delete();
    }
}