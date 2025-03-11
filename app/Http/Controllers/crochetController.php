<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Crochet;


class crochetController extends Controller
{
    public function index()
    {
        $crochet = Crochet::all();
        if($crochet->isEmpty()){
            $data = [
                'message' => $crochet,
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($crochet);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $crochet = Crochet::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image
        ]);

        if(!$crochet){
            return response()->json([
                'message' => 'Error al crear el producto',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'message' => 'Producto creado',
            'status' => 200
        ], 200);
       
    }

    public function show($id)
    {
        $crochet = Crochet::find($id);
        if(!$crochet){
            return response()->json([
                'message' => 'Producto no encontrado',
                'status' => 404
            ], 404);
        }
        return response()->json($crochet, 200);
    }

    public function destroy($id)
    {
        $crochet = Crochet::find($id);

        if(!$crochet){
            return response()->json([
                'message' => 'Producto no encontrado',
                'status' => 404
            ], 404);
        }

        $crochet->delete();
        return response()->json([
            'message' => 'Producto eliminado',
            'status' => 200
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $crochet = Crochet::find($id);

        if(!$crochet){
            return response()->json([
                'message' => 'Producto no encontrado',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $crochet->name = $request->name;
        $crochet->description = $request->description;
        $crochet->price = $request->price;
        $crochet->image = $request->image;

        $crochet->save();

        return response()->json([
            'message' => 'Producto actualizado',
            'status' => 200
        ], 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $crochet = Crochet::find($id);

        if(!$crochet){
            return response()->json([
                'message' => 'Producto no encontrado',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => '',
            'description' => '',
            'price' => '',
            'image' => ''
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        if($request->has('name')){
            $crochet->name = $request->name;
        }

        if($request->has('description')){
            $crochet->description = $request->description;
        }

        if($request->has('price')){
            $crochet->price = $request->price;
        }

        if($request->has('image')){
            $crochet->image = $request->image;
        }

        $crochet->save();

        return response()->json([
            'message' => 'Producto actualizado',
            'status' => 200
        ], 200);
    }
}
