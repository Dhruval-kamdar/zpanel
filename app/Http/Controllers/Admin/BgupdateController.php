<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Model\Users;
use App\Model\Company;


class BgupdateController extends Controller {
    
    public function __construct() {
        $this->middleware('admin');
        //echo "hi";exit;
    }
    
   
    public function bgUpdate(Request $request) {
        
        $data['pagetitle'] = 'Update Back Ground';
        $data['metatitle'] = 'Update Back Ground';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'bg-update'=>'Update Back Ground',
        );
        
        $data['css'] = array(
            'plugins/jasny/jasny-bootstrap.min.css',
            'plugins/colorpicker/bootstrap-colorpicker.min.css'
            );
        
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
             'plugins/colorpicker/bootstrap-colorpicker.min.js',
            'admin/bgupdate.js',
        );
        $data['funinit'] = array(
            'Bgupdate.init()',
        );
       // $data['slider'] = DB::table('slider')->get();
        return view('admin.bgupdate.bgupdate',$data);
    }
    
}
?>