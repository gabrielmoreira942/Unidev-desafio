@extends('layout.template')
@section('main')
@include('products.partials.search')
    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Listagem de produtos</h1>
            <a href="{{route('product.create')}}" class="btn btn-success">Cadastrar novo</a>
        </div>
    </div>

    <div class="table-responsive">
    <table class="table table-striped mt-5">

        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome do produto</th>
            <th scope="col">Preços</th>
            <th scope="col">Fabricante</th>
            <th scope="col">Validade</th>
            <th scope="col">Fabricação</th>
            <th scope="col" width="150"></th>
            </tr>

        </thead>
  <tbody>
      @foreach($products as $product)
    <tr>
            <td scope="col">{{$product->id}}</td>
            <td scope="col">{{$product->name}}</td>
            <td scope="col">{{$product->price}}</td>
            <td scope="col">{{$product->provider}}</td>
            <td scope="col">{{$product->expiration_date->format('d/m/Y')}}</td>
            <td scope="col">{{$product->manufacturing_date->format('d/m/Y')}}</td>
            <td scope="col">
                <a class="btn btn-primary btn-sm" href="{{route('product.edit', $product->id)}}">Editar</a>
                <a class="btn btn-danger btn-sm">Excluir</a>
            </td>
    </tr>
    @endforeach
        </tbody>
      </table>
    </div>

      <div class="mt-5">

            {{ $products->appends([
                'action' => request()->get('action'),
                'keyword'=> request()->get('keyword'),
                'price_from'=> request()->get('price_from'),
                'price_to'=> request()->get('price_to'),
                'order_by'=> request()->get('order_by'),


                ])->links() }}
      </div>

@endsection
