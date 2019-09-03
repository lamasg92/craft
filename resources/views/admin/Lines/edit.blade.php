@extends('layouts.main')
 
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Editar línea</h3>
          </div>
          <div class="box-body">
            
           {!! Form::model($line,['route'=>['lines.update',$line->id], 'method'=>'PATCH', 'files'=>true])!!}

             <div class="form-group">
              {!! Field::text('name',null, ['class'=>'form-control'])!!}
             </div>

              <div class="form-group">
              {!! Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
              </div>
          
 
              {!! Form::close() !!}

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
