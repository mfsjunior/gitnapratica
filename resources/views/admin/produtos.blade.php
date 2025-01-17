
@extends('admin.layout')
@section('titulo', 'Produtos')
@section ('conteudo')
<div class="fixed-action-btn">
    <a  class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
      <i class="large material-icons">add</i>
    </a>   
  </div>

   
  
    @include('admin.produtos.create')
    
   

    <div class="row container crud">
       
            <div class="row titulo ">              
              <h1 class="left">Produtos</h1>
              <span class="right chip">{{$produtos->count()}} produtos exibidos nesta página</span>  
            </div>

           <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input placeholder="Pesquisar..." id="search" type="search" required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>

                  
                  
                </div>
              </form>
            </div>
          </nav>     

            <div class="card z-depth-4 registros" >
                @include('admin.includes.mensagens')
            <table class="striped ">
                <thead>
                  <tr>
                    <th></th>
                    <th>ID</th>  
                    <th>Produto</th>
                      
                      <th>Preço</th>
                      <th>Categoria</th>
                      <th></th>
                  </tr>
                </thead>
        
                <tbody>
                  <tr>
                    @foreach ($produtos as $produto)
                        
                    
                    <!--<td><img src="{{asset('img/mouse.jpg')}}" class="circle "></td> pode-se fazer da duas formas-->
                    <td><img src="{{url("storage/{$produto->imagem}")}}" class="circle "></td>
                    <td>#{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>                    
                    <td>{{$produto->preco}}</td>
                    <td>{{$produto->categoria->nome}}</td> <!-- isso aqui só é possível pois eu tenho um relacionamento la no médoto categoria de produto-->
                    <td><a class="btn-floating  waves-effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                      <a href="#delete-{{$produto->id}}" class="btn-floating modal-trigger  waves-effect waves-light red"><i class="material-icons">delete</i></a></td>
                      @include('admin.produtos.delete')
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
            </div> 

            <div class="row center">
                {{$produtos->links('custom.pagination')}}
            </div>             
    </div>

    @endsection
       