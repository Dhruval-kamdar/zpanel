<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Model\Users;
use App\Model\Company;

class ProfileController extends Controller {
    
    public function __construct() {
        $this->middleware('admin');
        //echo "hi";exit;
    }
    
   
    public function editProfile(Request $request) {
        
        $data['pagetitle'] = 'Edit Profile';
        $data['metatitle'] = 'Edit Profile';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'edit-profile'=>'Edit Profile',
        );
        
        $data['css'] = array('plugins/jasny/jasny-bootstrap.min.css');
        
        $useId = Auth::guard('admin')->user()->id;
        if ($request->isMethod('post')) {
            
            //$company = new Company;
            //$companyId = $company->updateCompanyInfo($request);
            
            $user = new Users;
            $usersaved = $user->updateUserInfo($request);
            
            if($usersaved)
            {
                $return['status'] = 'success';
                $return['message'] = 'Your profile update successfully.';
               // $return['redirect'] = 'login';
                echo json_encode($return);
                exit;
            }
        }
        $user = new Users;
        $userDetail = $user->getUserInfo($useId);
       
        $data['userDetail'] = $userDetail;
        $data['pluginjs'] = array();
        $data['js'] = array(
            'plugins/jsForm/jquery.form.min.js',
             'plugins/jasny/jasny-bootstrap.min.js',
            'company/profile.js',
        );
        $data['funinit'] = array(
            'Profile.init()',
        );
       // $data['slider'] = DB::table('slider')->get();
        return view('admin.profile.editprofile',$data);
    }
    
    public function changePassword(Request $request)
    {
         if ($request->isMethod('post')) {
             
             $password_data = Auth::guard('admin')->user()->password;
             $password = $request->input('old_password');
            if (Hash::check($password, $password_data)) {
                $user = new Users;
                $usersaved = $user->updateUserPassword($request);
                if($usersaved)
                {
                    $return['status'] = 'success';
                    $return['message'] = 'Your password is changed successfully.';
                   // $return['redirect'] = 'login';
                    echo json_encode($return);
                    exit;
                }
                
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Your old password is wronge.';
               // $return['redirect'] = 'login';
                echo json_encode($return);
                exit;
            }
        }
    }
    
    public function changeProfilePic(Request $request)
    {
          if ($request->isMethod('post')) {
              $user = new Users;
              $usersaved = $user->changePic($request);
              if($usersaved)
                {
                    $return['status'] = 'success';
                    $return['message'] = 'Your profile pic change successfully.';
                   // $return['redirect'] = 'login';
                    echo json_encode($return);
                    exit;
                }
          }
    }
}
?>
