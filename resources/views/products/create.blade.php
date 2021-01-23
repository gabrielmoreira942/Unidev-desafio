@extends('layout.template')
@section('main')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Cadastro de produtos</h1>
            <a href="{{route('product.index')}}" class="btn btn-primary">Voltar para a listagem</a>
        </div>
    </div>


    @include('layout.messages')


    <form action="{{route('product.store')}}"method="post">
        @csrf
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do produto</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ex.: Macarrão parafuso" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Fornecedor</label>


                    <select name="provider" id="provider" class="form-select">
                        <option value="">Selecione o fornecedor</option>
                        <option>Bebidas do Nordeste</option>
                        <option>Limpeza do Brasil</option>
                        <option>Higiêne Brasileira</option>
                        <option>Tio João</option>
                        <option>Feijões Brasil</option>
                        <option>Arroz da Bahia</option>
                    </select>
                </div>
            </div>
               <div class="col-md-4">
               <div class="mb-3">
                   <label for="price" class="form-label">Preço do produto</label>
                   <input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01" required>
               </div>
          </div>
           <div class="col-md-4">
               <div class="mb-3">
                   <label for="name" class="form-label">Data de Fabricação</label>
                   <input type="date" class="form-control" id="manufacturing_date" name="manufacturing_date" placeholder="Ex.: Macarrão parafuso" required>
               </div>
           </div>
           <div class="col-md-4">
               <div class="mb-3">
                   <label for="price" class="form-label">Data de Validade</label>
                   <input type="date" class="form-control" id="expiration_date" name="expiration_date" required>
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-md">
               <hr>
               <button type="submit" class="btn btn-success">Registrar produto</button>
           </div>
       </div>
   </form>

@endsection
