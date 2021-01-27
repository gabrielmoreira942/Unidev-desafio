<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
                $product = new Product;

                if($request->has('action') && $request->get('action')==='search'){
                    $products = $product->filterAll($request);

                }else{
                    $products = $product->OrderBy('name', 'asc')->paginate(20);

                }


        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(ProductRequest $request)
    {
        try{
        // $product->name = $data['name'];
        // $product->provider = $data['provider'];
        // $product->price = $data['price'];
        // $product->manufacturing_date = $data['manufacturing_date'];
        // $product->expiration_date = $data['expiration_date'];

        $data = $request->all();
        $product = new Product();
        $request->session()->flash('success', 'Registro gravado com sucesso!');

        $product->create($data);
        } catch(\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao gravar esses dados!');            //$e->getMessage()); //pegar o erro
          // echo 'Ocorreu um erro: '. $e->getMessage();
        }

        return redirect()->back();
    }


    public function show(Product $product)
    {
        //
    }



    public function edit(Request $request, Product $product)
    {
        //obs: n precisa disso, a função /\ ja pega
        // $id = $request->segment(2);

        // $product = Product::find($id);
        return view('products.edit', compact('product'));
    }



    public function update(ProductRequest $request, Product $product)
    {
        try {
        $data = $request->all();
        $product->update($data);

        $request->session()->flash('success', 'Registro atualizado com sucesso!');

        } catch(\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao atualizar esses dados!');            //$e->getMessage()); //pegar o erro
          // echo 'Ocorreu um erro: '. $e->getMessage();
        }

    //    $data = $request->all(); // PEGA TODAS AS REQUISIÇÕES
    //    $product->update($data); //armazena no banco Product e atualiza

       return redirect()->back();
    }


    public function destroy(Product $product)
    {
        //
    }
}
