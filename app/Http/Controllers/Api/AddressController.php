<?php


namespace App\Http\Controllers\Api;

use App\Models\Book; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class AddressController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::paginate(3);

        if ($books->count() > 0) {
            return response()->json([
                'status' => 200,
                'books' => $books
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No records found'
            ], 404);
        }
    }
}

