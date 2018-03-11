<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Config;

use App\Model\Users;
use App\Model\Pages;
use App\Model\Material;
use App\Model\Unit;
use App\Model\Site;
use App\Model\Muckinterested;

class PagesController extends Controller {
    
    public function __construct() 
    {
        $this->middleware('admin');
        //echo "hi";exit;
    }
    
    public function index()
    {
        $data['pagetitle'] = 'Pages Available';
        $data['metatitle'] = 'Pages Available List';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
            'pages'=>'Pages Available List',
        );
        
        $data['css'] = array('plugins/dataTables/datatables.min.css');
        
        $objMuck = new Pages;
        $muckDetail = $objMuck->getPageList();
        $data['muckDetails'] = $muckDetail;
        
        $allMenu[0] = 'None';
        for($i=0;$i < count($muckDetail); $i++)
        {
            $allMenu[$muckDetail[$i]['id']] = $muckDetail[$i]['menu_name'];
        }
        
        
        $data['allMenu'] = $allMenu;
        $data['js'] = array(
            'plugins/dataTables/datatables.min.js',
            'admin/pages.js',
        );
        $data['funinit'] = array(
            'Pages.pagesAvailableList()',
        );
       
        return view('admin.pages.page-list',$data);
    }
    
    
    public function pagesAdd(Request $request)
    {
        $data['pagetitle'] = 'Pages Add';
        $data['metatitle'] = 'Pages Add';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
             'pages'=>'Pages Available List',
        );
        
        $data['css'] = array(
            'plugins/jasny/jasny-bootstrap.min.css',
            'plugins/datapicker/datepicker3.css',
            'plugins/jasny/jasny-bootstrap.min.css');
        
        if ($request->isMethod('post')) {
            $objMuck = new Pages;
            $muckDetail = $objMuck->addPages($request);
            
            if($muckDetail)
            {
                $return['status'] = 'success';
                $return['message'] = 'Page add successfully.';
                $return['redirect'] =  route('pages');
                echo json_encode($return);
                exit;
            }
        }
        
        $objPage = new Pages;
        $pageDetail = $objPage->getParentPages();
        
        $data['pageDetail'] = $pageDetail;
        $data['pluginjs'] = array();
        $data['js'] = array(
            'plugins/jsForm/jquery.form.min.js',
            'plugins/jasny/jasny-bootstrap.min.js',
            'plugins/datapicker/bootstrap-datepicker.js',
             'admin/pages.js',
        );
        $data['funinit'] = array(
            'Pages.pagesAdd()',
        );
       // $data['slider'] = DB::table('slider')->get();
        return view('admin.pages.page-add',$data);
    }
    public function pagesEdit($id,Request $request)
    {
        $data['pagetitle'] = 'Page Edit';
        $data['metatitle'] = 'Page Edit';
        $data['breadcrumb'] = array(
            'dashboard'=>'Home',
             '../pages'=>'Pages Available List',
             ''=>'Pages Edit',
        );
        
        $data['css'] = array(
            'plugins/jasny/jasny-bootstrap.min.css',
            'plugins/datapicker/datepicker3.css',
            'plugins/jasny/jasny-bootstrap.min.css');
        
        if ($request->isMethod('post')) {
            $objMuck = new Pages;
            $muckDetail = $objMuck->editPages($request);
            
            if($muckDetail)
            {
                $return['status'] = 'success';
                $return['message'] = 'Page update successfully.';
                $return['redirect'] =  route('pages');
                echo json_encode($return);
                exit;
            }
        }
        
        $objPage = new Pages;
        $pageDetail = $objPage->getParentPages();
        $data['pageDetail'] = $pageDetail;
        
        $pageEditDetail = $objPage->getPagesDetail($id);
        $data['pageEditDetail'] = $pageEditDetail;
        
        $data['pluginjs'] = array();
        $data['js'] = array(
            'plugins/jsForm/jquery.form.min.js',
            'plugins/jasny/jasny-bootstrap.min.js',
            'plugins/datapicker/bootstrap-datepicker.js',
            'admin/pages.js',
        );
        $data['funinit'] = array(
             'Pages.pagesAdd()',
        );
       // $data['slider'] = DB::table('slider')->get();
        return view('admin.pages.page-edit',$data);
    }
    
    public function pagesDelete(Request $request)
    {
        if ($request->isMethod('post')) {
            $objMuck = new Pages;
            $muckDetail = $objMuck->pagesDelete($request);
           
            if($muckDetail)
            {
                $return['status'] = 'success';
                $return['message'] = 'Pages delete successfully.';
                $return['redirect'] =  route('pages');
               
                echo json_encode($return);
                exit;
            }
        }
    }
    
}
?>
