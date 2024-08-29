<?php

// namespace App\Http\Controllers;

// use App\Models\categories;
// use Illuminate\Http\Request;

// class categoriesControllers extends Controller
// {
//     public function getCategories()
//     {
//         $categories = categories::all();
//         if (is_null($categories)) {
//             $response = [
//                 'success' => $categories,
//                 'message' => 'no data found',
//                 'status' => 500
//             ];
//             return response()->json($response, 500);
//         }
//         return response()->json($categories, 200);
//     }


//     public function getAcategory(int $id)
//     {
//         $category = categories::findOrFail($id);
//         if (is_null($category)) {
//             $response = [
//                 'success' => false,
//                 'message' => 'no data found',
//                 'status' => 500
//             ];
//             return response()->json($response, 500);
//         }
//         $response = [
//             'category' => $category,
//             'success' => true,
//             'status' => 200
//         ];
//         return response()->json($response, 200);
//     }
// }
