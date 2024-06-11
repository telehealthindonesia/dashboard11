<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\CodeHierarchy;
use App\Models\ParentCode;

class CodeHierarchyController extends Controller
{
    public function index(){
        $code_hierarchy = CodeHierarchy::where('is_parent', true)->paginate(10);
        $code           = Code::all();
        $data = [
            "title"             => "Data Code",
            "class"             => "code all",
            "sub_class"         => "Get All",
            "content"           => "layout.admin",
            "code"              => $code,
            "code_hierarchies"  => $code_hierarchy,
        ];
        return view('admin.code.hierarchy.index', $data);
    }

}
