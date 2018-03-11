<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class Pages extends Model {

    protected $table = 'tbl_pages';
    
    
    public function fileupload($request)
    {
        $destinationPath = public_path() . '/uploads/company';

        $file1 = $request->file('profilepic');
       
        $file_name1 = '';
        $file_name2 = '';
        if (!empty($file1)) {
            $time = time();
//            $file_name1 = $time .'-'. $file1->getClientOriginalName();
            $file_name1 = $request->input('first_name') .'.'. $file1->getClientOriginalExtension();
            $file1->move($destinationPath, $file_name1);
        }
        $userId = 1;
        $objUser = Fileupload::find($userId);
        $objUser->file_name = $file_name1;
        $objUser->save();
        return TRUE;
    }
    
     public function getPageList()
    {
         $getMenu = Pages::select('tbl_pages.*')
              // ->where('tbl_pages.parent_id',0)
                ->get()->toArray();
          
        return $getMenu;
    }
     public function getParentPages()
    {
         $getMenu = Pages::select('tbl_pages.*')
               ->where('tbl_pages.parent_id',0)
                ->get()->toArray();
          
        return $getMenu;
    }
     public function getPagesDetail($id)
    {
         $getMenu = Pages::select('tbl_pages.*')
               ->where('tbl_pages.id',$id)
                ->get()->toArray();
          
        return $getMenu;
    }
    
    public function addPages($request)
    {
        $objPages = new Pages();
        $objPages->menu_name = $request->input('menu_name');
        $objPages->parent_id = $request->input('parent_id');
        $objPages->page_description = $request->input('page_description');
        $objPages->created_at = date('Y-m-d H:i:s');
        $objPages->save();
        return TRUE;
    }
    public function editPages($request)
    {
        $id = $request->input('id');
        $objPages = Pages::find($id);
        $objPages->menu_name = $request->input('menu_name');
        $objPages->parent_id = $request->input('parent_id');
        $objPages->page_description = $request->input('page_description');
        $objPages->created_at = date('Y-m-d H:i:s');
        $objPages->save();
        return TRUE;
    }
    public function pagesDelete($request)
    {
         $id = $request->input('id');
        return Pages::where('id', $id)->delete();
    }
    
}