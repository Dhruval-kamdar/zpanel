<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\Users;

class DashboardController extends Controller {
    
    public function __construct() {
        $this->middleware('admin');
        //echo "hi";exit;
    }
    
   
    public function dashboard(Request $request) {
        
        $data['pagetitle'] = 'Dashboard';
        $data['metatitle'] = 'Dashboard';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'dashboard1'=>'Dashboard',
        );
        
        $data['plugincss'] = array();
        $data['css'] = array();
        $data['pluginjs'] = array(
            'jquery-validation/js/jquery.validate.min.js',
            
        );
        $data['js'] = array(
            'front/signup.js',
        );
        $data['funinit'] = array(
            'Singup.init()',
        );
       // $data['slider'] = DB::table('slider')->get();
        return view('admin.dashboard.dashboard',$data);
    }
    
}
?>
