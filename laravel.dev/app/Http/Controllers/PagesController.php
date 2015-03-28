<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

  public function about()
  {
        /* // First way */
        /* $name = 'my name'; */
        /* return view('pages.about')->with('name', $name); */
        /* // Second way */
        /* // or retuen array */
        /* return view ('pages.about')->with([ */
        /*   'first' => 'My', */
        /*   'last' => 'Name' */
        /* ]) */
        // Third say
        /* $data = []; */
        /* $data['first'] = 'Holly'; */
        /* $data['last'] = 'Cow'; */
        /* return view('pages.about', $data); */
        // Fourth way
        /* $first = "Michael"; */
        /* $last = "Fox"; */
        /* return view('pages.about', compact('first','last')); */
      $people = [
        'Person A',' Person B', 'Person C'
      ];
      return view ('pages.about', compact('people'));
  }
  public function contact()
  {
  
    return view('pages.contact');  
  }
}
