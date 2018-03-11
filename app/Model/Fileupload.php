<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\File;

class Fileupload extends Model {

    protected $table = 'tbl_fileupload';
    
    
    public function editFileupload($request)
    {
        $destinationPath = public_path() . '/uploads/company';

        $file1 = $request->file('profilepic');
        $id = $request->input('id');
        $file_name1 = '';
        $file_name2 = '';
        if (!empty($file1)) {
            $time = time();
//            $file_name1 = $time .'-'. $file1->getClientOriginalName();
            $file_name1 = $request->input('file_name') .'.'. $file1->getClientOriginalExtension();
            $file1->move($destinationPath, $file_name1);
            
            $objUser = Fileupload::find($id);
            $objUser->file_name = $file_name1;
            $objUser->save();
        }
        $fileName = $this->getFileDetail($id);
        File::move($destinationPath.'/'.$fileName['file_name'], $destinationPath.'/'.$request->input('file_name')); // keep the same folder to just rename 
        
        $objFile = Fileupload::find($id);
        $objFile->display_name = $request->input('display_name');
        $objFile->save();
        return TRUE;
    }
    public function fileuploadadd($request)
    {
        $destinationPath = public_path() . '/uploads/company';

        $file1 = $request->file('addnewfile');
       
        $file_name1 = '';
        $file_name2 = '';
        if (!empty($file1)) {
            $time = time();
//            $file_name1 = $time .'-'. $file1->getClientOriginalName();
            $file_name1 = $request->input('file_name') .'.'. $file1->getClientOriginalExtension();
            $file1->move($destinationPath, $file_name1);
        }
        $objFile = new Fileupload();
        $objFile->display_name = $request->input('display_name');
        $objFile->file_name = $file_name1;
        $objFile->status = $request->input('status');
        $objFile->created_at = date('Y-m-d H:i:s');
        $objFile->save();
       
        return TRUE;
    }
    
     public function getFileDetail($id)
    {
         $getUser = Fileupload::select('tbl_fileupload.*')
               ->where('tbl_fileupload.id',$id)
                ->get()->toArray();
          
        return $getUser[0];
    }
     public function getFileuploadList()
    {
         $getFile = Fileupload::select('tbl_fileupload.*')
                ->get()->toArray();
          
        return $getFile;
    }
     public function getFileuploadActiveList()
    {
         $getFile = Fileupload::select('tbl_fileupload.*')
                 ->where('status','active')
                ->get()->toArray();
          
        return $getFile;
    }
     public function FileuploadDelete($request)
    {
           $id = $request->input('id');
        return Fileupload::where('id', $id)->delete();
    }
     public function fileUploadStatus($id)
    {
       
        $fileName = $this->getFileDetail($id);
         
        $objFile = Fileupload::find($id);
        $objFile->status = ($fileName['status'] == 'active')?'inactive':'active';
        $objFile->save();
        return TRUE;
        
    }
    
}