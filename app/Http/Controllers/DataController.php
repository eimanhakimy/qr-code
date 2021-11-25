<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Data;
class DataController extends Controller
{
    public function index(){
        $data = Data::all();
        return view ('welcome', ['data' => $data]);
    }
    public function store(Request $request){
        $data = new Data;
        $data->owner = $request->owner;
        $data->business = $request->business;
        $data->location = $request->location;
        $data->phone = $request->phone;
        $data->save();
        return back();
    }
    public function generate ($id)
    {
        $data = Data::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($data->business);
        return view('qrcode',compact('qrcode'));
    }
}