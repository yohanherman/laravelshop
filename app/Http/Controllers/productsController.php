<?php

// namespace App\Http\Controllers;

// use App\Models\products;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

// class productsControllers extends Controller
// {
    /**
     * Display a listing of the resource.
    //  */
    // public function getProducts()
    // {
    //     $data = products::all();
        
    //     return view('')
    // }

    /**
     * Store a newly created resource in storage.
//      */
//     public function storeProducts(Request $request)
//     {

//         $rules = [
//             'productname' => 'required|string|max:10',
//             'productprice' => 'required',
//             'description' => 'required',
//             'quantity_in_stock' => 'required|integer',
//             'origin' => 'string',
//             'categories_id' => 'required|integer',
//             // 'Avis_id'=>'integer',
//             // 'taille_id'=>'integer',
//         ];

//         $validator = Validator::make($request->all(), $rules);
//         if ($validator->fails()) {
//             $response = [
//                 'success' => false,
//                 'message' => 'validation failed.', $validator->errors(),
//                 'status' => 500,
//             ];
//             return response()->json($response, 404);
//         }
//         $data = products::create($request->all());
//         // if (is_null($data)) {
//         //     $response = [
//         //         'success' => false,
//         //         'message' => 'error',
//         //         'status' => 500,
//         //     ];
//         //     // return response()->json($response, 500);
//         }
   
//     }

//     /**
//      * Display the specified resource.
//      */

//     public function getAProduct(int $id)
//     {
//         $data = products::find($id);
//         if (!is_null($data)) {
//             $response = [
//                 'data' => $data,
//                 'success' => true,
//                 'status' => 200
//             ];
//             return response()->json($response, 200);
//         };
//         return response()->json($data, 500);
//     }

//     /**
//      * Update the specified resource in storage.
//      */

//     public function updateProduct(Request $request, int $id)
//     {
//         $rules = [
//             'productname' => 'required|string|max:10',
//             'productprice' => 'required',
//             'description' => 'required',
//             'quantity_in_stock' => 'required|integer',
//             'origin' => 'string',
//             'categories_id' => 'required|integer',
//         ];

//         $validator = Validator::make($request->all(), $rules);
//         if ($validator->fails()) {
//             $response = [
//                 'success' => 'validation failed.', $validator->errors(),
//                 'status' => 400,
//             ];
//             return response()->json($response, 4000);
//         }
//         $product = products::findOrFail($id);
//         $product->update($request->all());
//         return response()->json($product, 200);
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function deleteProduct(int $id)
//     {
//         $data = products::findOrFail($id);
//         $data->delete();
//         return response()->json(['message' => 'successfully deleted', 'status' => 200]);
//     }

// }


