<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Mail\DispMail;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{



    public function index(Request $request)
    {
          $user = new User;

        if($request->has('action') && $request->get('action') === 'search'){
            $users = $user->filterAllUser($request);

        }else {
            $users = $user->OrderBy('name', 'asc')->paginate(20);

        }



// return view('products.index', compact('products'));
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.partials.create');
    }


    public function store(UserRequest $request)
    {
        try{
        // $product->name = $data['name'];
        // $product->provider = $data['provider'];
        // $product->price = $data['price'];
        // $product->manufacturing_date = $data['manufacturing_date'];
        // $product->expiration_date = $data['expiration_date'];

        $data = $request->all();
        $user = new User();
        $request->session()->flash('success', 'Usuário registrado com sucesso!');

        $user->create($data);
        } catch(\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao registrar esse usuário!');            //$e->getMessage()); //pegar o erro
          // echo 'Ocorreu um erro: '. $e->getMessage();
        }

        return redirect()->back();
    }


    public function show(User $user)
    {
        //
    }



    public function edit(Request $request, User $user)
    {
        //obs: n precisa disso, a função /\ ja pega
        // $id = $request->segment(2);

        // $product = Product::find($id);
        return view('users.partials.edit', compact('user'));
    }



    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();

        try {


        if(empty($request->get('password'))){
            unset($data['password']);
        }
       

         $user->fill($data);
         $user->save();


        $request->session()->flash('success', 'Registro atualizado com sucesso!');

        } catch(\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao atualizar esses dados!'.$e->getMessage());            //$e->getMessage()); //pegar o erro
          // echo 'Ocorreu um erro: '. $e->getMessage();
        }

    //    $data = $request->all(); // PEGA TODAS AS REQUISIÇÕES
    //    $product->update($data); //armazena no banco Product e atualiza

       return redirect()->back();
    }


    public function destroy(Request $request, User $user)
    {
        try {
            $user->delete();


            $request->session()->flash('success', 'Registro excluído com sucesso!');

            } catch(\Exception $e) {
                $request->session()->flash('error', 'Ocorreu um erro ao tentar excluir esses dados!');            //$e->getMessage()); //pegar o erro
              // echo 'Ocorreu um erro: '. $e->getMessage();
            }

        return redirect()->back();
    }
    // public function user()
    // {


            //find cria se vc usar save() e delete() apaga obviamente, adicionei softdeletes em User model, e dps: php artisan make:migration add_deleted_at_in_users_table

            // $user = new User();

            // $user->name= "Gabriel";
            // $user->email = "Gab@gmail.com";
            // $user->password = "123456";
            // $user->save();
    //          $users = User::all();

    //      return view('users.user', compact('users'));
    // }


}
