<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Model\Users;
use App\Model\Fileupload;

class FileuploadController extends Controller {
    
    public function __construct() {
        $this->middleware('admin');
        //echo "hi";exit;
    }
    
   
    public function fileupload(Request $request) {
        $data['pagetitle'] = 'File Upload';
        $data['metatitle'] = 'File Upload List';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'pages'=>'File Upload List',
        );
        
        $data['css'] = array('plugins/dataTables/datatables.min.css');
        
        $objFileupload = new Fileupload;
        $objFileuploadResult = $objFileupload->getFileuploadList();
        $data['objFileuploadResult'] = $objFileuploadResult;
        
       
        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/fileupload.js',
        );
        $data['funinit'] = array(
            'File.fileUploadList()',
        );
       
        return view('admin.fileupload.fileupload-list',$data);
    }
    
    public function fileuploadadd(Request $request) {
        
        $data['pagetitle'] = 'Upload New File';
        $data['metatitle'] = 'Upload New File';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'edit-profile'=>'Upload New File',
        );
        
        $data['css'] = array('plugins/jasny/jasny-bootstrap.min.css');
        $data['pluginjs'] = array();
        $data['js'] = array(
            'plugins/jsForm/jquery.form.min.js',
             'plugins/jasny/jasny-bootstrap.min.js',
            'admin/fileupload.js',
        );
        $data['funinit'] = array(
            'File.fileAdd()',
           
        );
        $useId = Auth::guard('admin')->user()->id;
        if ($request->isMethod('post')) {
            
            //$company = new Company;
            //$companyId = $company->updateCompanyInfo($request);
            
            $user = new Fileupload;
            $usersaved = $user->fileuploadadd($request);
            
            if($usersaved)
            {
                $return['status'] = 'success';
                $return['message'] = 'Your profile update successfully.';
               // $return['redirect'] = 'login';
                $data['funinit'] = array(
                     'File.fileAdd()',
                     'File.fileuploadsuccess()',
                );
            }
        }
        $user = new Users;
        $userDetail = $user->getUserInfo($useId);
       
        $data['userDetail'] = $userDetail;
        
        
       // $data['slider'] = DB::table('slider')->get();
        return view('admin.fileupload.fileupload-add',$data);
    }
    
    public function fileUploadEdit($id,Request $request)
    {
        $data['pagetitle'] = 'File Upload Edit';
        $data['metatitle'] = 'File Upload Edit';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
             '../pages'=>'File Upload  List',
             ''=>'Pages Edit',
        );
        
        $data['css'] = array(
            'plugins/jasny/jasny-bootstrap.min.css',
            'plugins/datapicker/datepicker3.css',
            'plugins/jasny/jasny-bootstrap.min.css');
        
        if ($request->isMethod('post')) {
            $objMuck = new Fileupload;
            $muckDetail = $objMuck->editFileupload($request);
            
            if($muckDetail)
            {
                $return['status'] = 'success';
                $return['message'] = 'Page update successfully.';
                $return['redirect'] =  route('file-upload');
                echo json_encode($return);
                exit;
            }
        }
        
        $objFileupload = new Fileupload;
        $objFileuploadDetail = $objFileupload->getFileDetail($id);
        $data['objFileuploadDetail'] = $objFileuploadDetail;
        
        
        $data['pluginjs'] = array();
        $data['js'] = array(
            'plugins/jsForm/jquery.form.min.js',
            'plugins/jasny/jasny-bootstrap.min.js',
            'plugins/datapicker/bootstrap-datepicker.js',
            'admin/fileupload.js',
        );
        $data['funinit'] = array(
             'File.fileAdd()',
        );
       // $data['slider'] = DB::table('slider')->get();
        return view('admin.fileupload.fileupload-edit',$data);
    }
    
    public function fileUploadDelete(Request $request)
    {
        
        if ($request->isMethod('post')) {
            $objMuck = new Fileupload;
            $muckDetail = $objMuck->FileuploadDelete($request);
           
            if($muckDetail)
            {
                $return['status'] = 'success';
                $return['message'] = 'File delete successfully.';
                $return['redirect'] =  route('file-upload');
               
                echo json_encode($return);
                exit;
            }
        
        }
    }
    
    public function fileUploadStatus($id)
    {
        
            $objMuck = new Fileupload;
            $muckDetail = $objMuck->fileUploadStatus($id);
           
            if($muckDetail)
            {
                return redirect()->route('file-upload');
            }
        
    }
    
}
?>
