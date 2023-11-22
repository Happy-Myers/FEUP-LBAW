<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function destroy(Address $address){
        if($address->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $address->delete();
        return back();
    }
}

