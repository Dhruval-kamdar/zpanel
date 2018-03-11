<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\Users;
use App\Model\Pages;
use App\Model\Fileupload;

class LoginController extends Controller {
    
    public function __construct() {
     //   $this->middleware('auth');
        //echo "hi";exit;
    }
    
    public function register(Request $request) {
        
        $data['pagetitle'] = 'Register';
        
        if ($request->isMethod('post')) {
            
            $user = new Users;
            $userchecked = $user->checkUserInfo($request);
            
            if($userchecked)
            {
                $return['status'] = 'error';
                $return['message'] = 'User already Exist.';
              //  $return['redirect'] = 'login';
                echo json_encode($return);
                exit;
            }
            
            $company = new Company;
            $companyId = $company->saveCompanyInfo($request);
            
            
            $usersaved = $user->saveUserInfo($request,$companyId);
            
            if($usersaved)
            {
                $return['status'] = 'success';
                $return['message'] = 'Your are successfully signup.';
                $return['redirect'] = 'login';
                echo json_encode($return);
                exit;
            }
        }
        
        $data['js'] = array(
            'front/signup.js',
        );
        $data['funinit'] = array(
            'Singup.init()',
        );
       
        return view('front.login.register',$data);
    }
    
    public function login(Request $request) {
        
        $data['pagetitle'] = 'Login';
        $username = $request->input('email');
        $password = $request->input('password');
        $data['funinit'] = array(
            'Login.init()',
        );
        if ($request->isMethod('post')) {
            if (Auth::guard('admin')->attempt(['email' => $username, 'password' => $password,'role_type'=>'company'])) {
                 return redirect()->intended(route('company-dashboard'));
             }elseif(Auth::guard('member')->attempt(['email' => $username, 'password' => $password,'role_type'=>'member'])) {
                 return redirect()->intended(route('member-dashboard'));
             }else{
                 $data['funinit'] = array(
                    'Login.wrongeId()',
                );
             }

        }
        
        $data['js'] = array(
            'front/login.js',
        );
        
       
        return view('front.login.login',$data);
    }
    
    public function logout(Request $request) {
         Auth::guard('admin')->logout();
         return redirect(route('login'));
    }
    
    public function home(Request $request)
    {
        $objMuck = new Pages;
        $getAllMenu = $objMuck->getPageList();
        $getParentPages = $objMuck->getParentPages();
        
        $objFileUpload = new Fileupload;
        $getfileList = $objFileUpload->getFileuploadActiveList();
       
        $data['getAllMenu'] = $getAllMenu;
        $data['getParentPages'] = $getParentPages;
        $data['getfileList'] = $getfileList;
        return view('front.login.home',$data);
    }
    public function pagedetail($id)
    {
        $objMuck = new Pages;
        $getPageDetail = $objMuck->getPagesDetail($id);
        $getAllMenu = $objMuck->getPageList();
        $getParentPages = $objMuck->getParentPages();
        
        $objFileUpload = new Fileupload;
        $getfileList = $objFileUpload->getFileuploadActiveList();
        
        $data['getPageDetail'] = $getPageDetail;
        $data['getAllMenu'] = $getAllMenu;
        $data['getParentPages'] = $getParentPages;
        $data['getfileList'] = $getfileList;
        return view('front.login.pagedetail',$data);
    }
    
    public function dashboard(Request $request) {
        
        $data['pagetitle'] = 'Home - Dashboard';
        
        
        $data['plugincss'] = array();
        $data['css'] = array();
       
        $data['js'] = array(
            
        );
        $data['funinit'] = array(
           
        );
       // $data['slider'] = DB::table('slider')->get();
        return view('front.login.dashboard',$data);
    }
    
    public function getLatLong(Request $request) {
        if ($request->isMethod('post')) {
            
            $address = $request->input('address');
            
            $objSite = new Site;
            $latlongDetail = $objSite->getLatLong($address);
            echo json_encode($latlongDetail);
            exit;
        }
    }
    
    public function download($id) {
       
          $objSite = new Fileupload;
          $fileDetail = $objSite->getFileDetail($id);
         
           $destinationPath = public_path() . '/uploads/company/'.$fileDetail['file_name'];
          return response()->download($destinationPath);
    }
}
?>
