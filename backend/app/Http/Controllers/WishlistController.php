<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    function index($id)
    {
        $wishlist = array(
            (object)[
                "id" => 1,
                "name" => "Go as a Backend",
                "price" => 40,
            ],
            (object)[
                "id" => 2,
                "name" => "C++",
                "price" => 50,
            ],
            (object)[
                "id" => 1,
                "name" => "Low level Programming Language",
                "price" => 75,
            ],
        );
        return view('wishlist.index', [
            'wishlistData' =>  $wishlist,
            'filter' => $id
        ]);
    }

    function detail($id){        
        return  view('wishlist.detail');
    }
}
