<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(Request $request){
        // Address::create($request);
        $data = new Address();
        $data->user_id = $request['user_id'];
        $data->city = $request['city'];
        $data->save();
        // address::create($request);
        // return "data stored1";
        return redirect()->route('address');

    }
}
