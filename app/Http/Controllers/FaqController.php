<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
     public function index() {
          $faqs = Faq::all();
          return view('users.faqs',[
               'faqs' => $faqs
          ]);
     }

     public function show() {

     }
}
