<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){


    }
    public function corporate($corporate_id){
        $customer   = Customer::find($corporate_id);
        $faq        = Faq::where('corporate_id', $corporate_id)->get();
        $data =[
            'title'     => 'FAQ Corporate',
            'class'     => 'Faq',
            'sub_class' => 'Index',
            'faq'       => $faq,
            'customer'  => $customer
        ];

        return view('client.faq.index', $data);
    }
    public function store(Request $request, $corporate_id){

        $faq = new Faq();
        $input  = [
            'corporate_id'  => $corporate_id,
            'nomor_urut'    => (int) $request->nomor_urut,
            'pertanyaan'    => $request->pertanyaan,
            'jawaban'       => $request->jawaban
        ];
        $create     = $faq->create($input);
        if($create){
            return back()->with('success', 'Data berhasil disimpan');
        }
    }
    public function update(Request $request, $faq_id){

        $faq = Faq::find($faq_id);
        $input  = [
            'nomor_urut'    => (int) $request->nomor_urut,
            'pertanyaan'    => $request->pertanyaan,
            'jawaban'       => $request->jawaban
        ];
        $create     = $faq->update($input);
        if($create){
            return back()->with('success', 'Data berhasil dimutahirkan');
        }
    }
}
