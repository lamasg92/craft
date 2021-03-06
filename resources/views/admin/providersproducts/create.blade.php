@extends('layouts.main')
 
@section('content')
   
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-12">

        <!-- Default box -->
      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Agregar productos de un proveedor</h3>
         </div>
      <div class="box-body">
          {!! Form::open(['route'=>'providersproducts.store', 'method'=>'POST'])!!}
          <section>
              
              <div>
                <h4><b>Proveedor</b></h4>
                <div class="row ">
                       
                      <div class="col-md-3" >
                           
                           {!!Field::text('cuit',null)!!}
                       </div>
                       <div class="pull-left">
                       <br>
                            <button type="button" class="btn btn-primary " data-toggle="modal" id="second" data-title="Buscar" title="ver proveedores" data-target="#favoritesModalClient"><i class="fa fa-search"></i></button>
                            @include('partials.searchPeople')
                      </div>
                      <div class="col-md-6  col-md-offset-2">
                            <input id="provider_id" name="provider_id" class="form-control" type="hidden" >
                            {!!Field::text('nombre',null,['disabled'])!!}
                      </div>
                </div>

                <div>
                   <input id="product_id" class="form-control " name="product_id" type="hidden" >
                   <button type="button" class="btn btn-success pull-left" data-toggle="modal" title="ver productos" id="first" data-title="Buscar" data-target="#favoritesModalProduct">
                         Elegir producto
                  </button>

                </div>
              </div>
              <br>
              <br>
              <hr>

              <div>
                 <h4><b>Productos</b></h4>
         
                 <div class="col-xs-12 table-responsive">
                    <table id="details" class="table table-striped table-bordered table-condensed table-hover">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Marca</th>
                          <th></th>
                        </tr>
                      </thead>

                      <tbody>
                         
                      </tbody>

                    </table>
                  </div>
                 
                

                      <div class="form-group text-center">
                        {!! Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
                        <a class="btn btn-danger" href="{{ route('providersproducts.create') }}">Cancelar</a>
                      </div>
            
              </div>
              <hr>

            
              </section><!-- /.content -->
              {!! Form::close() !!}
             </div>
 
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>

 @include('partials.searchProductsPurchase')

@endsection

@push('scripts')

<script src="{{asset('js/completeProvider.js')}}"></script>
<script src="{{asset('js/completeProductsPurchase.js')}}"></script>
@endpush

@section('js')
<script>
  var cont=0;
  var products=[];
  function add_product($id,$code,$prod_name,$brand_name){
    code=$code;
    product_id=$id; 
    prod_name=$prod_name;
    brand_name=$brand_name;
     

 console.log("entro al metodo");
  if (product_id != ""){
    console.log("entro al if");

          var fila='<tr class="selected" id="fila'+cont+'"><td> <input readonly type="hidden" name="dproduct_id[]" value="'+product_id+'">'+code+'</td> <td>'+prod_name+'</td> <td>'+brand_name+'</td><td><button type="button" title="eliminar" class="btn btn-danger" onclick="deletefila('+cont+');">X</button></td>  > </tr>';
          cont++;
          products.push({ id: product_id,
                code: code,
                prod_name: prod_name,
                cont:cont
                });
          clear();
        $('#details').append(fila);
       

  }else{
       alert("Ya agrego este producto");
  }

for(var i = products.length -1; i >=0; i--){
 console.log(9878);

  if(products.indexOf(products[i]) !== i) {
   deletefila(products[i].cont);
   console.log(products[i].cont);
    
}
}

   $('#favoritesModalProduct').modal('hide');
   $('#searchProducts').val('');
}

function deletefila(index){
  $('#fila'+index).remove();
 }

 function clear(){
    $('#code').val('');
    $('#product_id').val('');
    $('#name').val('');

 }
</script>


<script>
  function productStockProvider(){
   
  }

</script>
 
@endsection
 

