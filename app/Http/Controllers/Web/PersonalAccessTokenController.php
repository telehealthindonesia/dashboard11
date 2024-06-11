<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PersonalAccessToken;
use Illuminate\Http\Request;

class PersonalAccessTokenController extends Controller
{
    public function index(Request $request){

        $database_token         = PersonalAccessToken::where('tokenable_id', '!=', null)->orderBy('created_at', 'DESC');
        $personal_access_tokens = $database_token->get();
        $data = [
            "title"     => "List Petugas",
            "class"     => "User",
            "sub_class" => "Petugas",
            "content"   => "layout.admin",
            "tokens"    => $personal_access_tokens
        ];
        return view('admin.token.index', $data);
    }
}
