<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Services\File\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FileController extends Controller
{
    private FileService $fileService;
    public function __construct(FileService $fileService) {
        $this->fileService = $fileService;
    }
    public function index(Request $request)
    {
        if(! empty($request->type) )  {
            if($request->type == 'image'){
                $files = File::whereIn('extention', ['jpg', 'jpeg'])->get();
            }elseif ($request->type == 'image'){
                $files = File::whereIn('extention', ['jpg', 'jpeg'])->get();
            }
            $type = $request->type;

        }else{
            $type = "Get All";
            $files = File::all();
        }

        $data = [
            "title"     => "File List",
            "class"     => "File",
            "sub_class" => $type,
            "content"   => "layout.admin",
            "files"      => $files
        ];
        return view('admin.file.index', $data);
    }
    public function mine(Request $request){
        $files = File::where('user_id', Auth::id())->get();
        dd($files);
    }
    public function show($id){
        $file = File::find();
        dd($file);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_file' => 'required',
            'file'      => 'required|image'
        ]);
        if ($validator->fails()) {
            return redirect()->route('member.file')
                ->withErrors($validator)
                ->withInput();
        }else{
            $file = $request->file('file');

            $result     = Storage::disk('s3')->putFileAs('image', $file, $file->hashName(), 'public');
//            dd($result);
            $url        = Storage::disk('s3')->url($result);
            $data_file  = [
                'nama_file' => $request->nama_file,
                'name'      => $file->hashName(),
                'extention' => $file->getClientOriginalExtension(),
                'mimeType'  => $file->getClientMimeType(),
                'size'      => $file->getSize(),
                'user_id'   => Auth::id(),
                'url'       => url($url)
            ];
            if(!empty($url)){
                $create_file = new File();
                $save = $create_file->create($data_file);
                if($save){
                    return back()->with('success', 'File berhasil diunggah');
                }else{
                    return back()->with('danger', 'File gagal diunggah');
                }
            }else{
                $status_code    = 422;
                $message        = "Tidak ada gambar";
                $data = [
                    'file' => $data_file,
                ];
            }
        }
    }

}
