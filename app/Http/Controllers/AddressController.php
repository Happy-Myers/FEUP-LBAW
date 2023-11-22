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
    public function update(Address $address){
        if($address->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = request()->validate([
            'label' => 'required',
            'street' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:50'],
            'postal_code' => ['required', 'string', 'max:15'],
        ]);

        $address->update($formFields);

        return back();
    }
    public function store(){
        $formFields = request()->validate([
            'label' => 'required',
            'street' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:50'],
            'postal_code' => ['required', 'string', 'max:15'],
        ]);
        $formFields['user_id'] = auth()->id();

        Address::create($formFields);

        return back();
    }
}

