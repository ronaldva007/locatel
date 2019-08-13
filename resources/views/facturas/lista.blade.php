<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


    

  </head>
  <body>
    <div class="container">
    <!-- <img src="equilateral.png" alt="FLOSSPA" srcset="{{ URL::to('/images/logo-flosspa.svg') }}"> -->
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <div class="panel panel-success">
            <div class="panel-heading">buscar Noticiero</div>
            <form action="buscar" method="get" onsubmit="return showLoad()">
            <div class="panel-body">
                <select class="form-control col-md-6" name="criterion">
                                          <option value="factura">Nro Factura</option>
                                          <option value="nombre">Proveedor</option>
                                          <option value="f_ingreso">Fecha</option>
                                          <option value="migo">Migo</option>
                                          <option value="orden_compra">Orden de Compra</option>
                                        </select>
                <input type="text" name="search" class="form-control" placeholder="Ingresar nombre del noticiero/descripcion" required="required">
                <br>

        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-success">buscar</button>
        </div>
        </form>
    </div>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Factura</th>
        <th>Proveedor</th>
        <th >F. Ingreso</th>
        <th >Orden de Compra</th>
        <th >Migo</th>
        <th >Estatus</th>
        <th colspan="2">Acción</th>
      </tr>
    </thead>
    <tbody>
     @foreach($sales as $factura)
      <tr>
        <td>{{$factura['id']}}</td>
        <td>{{$factura['factura']}}</td>
        <td>{{$factura['nombre']}}</td>
        <td>{{$factura['f_ingreso']}}</td>
        <td>{{$factura['orden_compra']}}</td>
        <td>{{$factura['long']}}</td>
        <td>{{$factura['status']}}</td>
        <td><a href="" class="btn btn-warning">Edit</a>
         
          
          @if($factura['name']!='')
                         @if($factura['carta']==1)
                      	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Carta
              </button>
              @else
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verImagen">

                Imagen
              </button>
              @endif
         @else
                @if($factura['carta']==1)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Subir Carta
              </button>
              @else
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

                Subir imagen
              </button>
              @endif
           @endif    


          <form  onsubmit="return confirm('Do you really want to delete?');" action="" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$factura['factura']}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
                                <label class="col-md-4 text-right">Imagen</label>
        <div class="col-md-8">
            <input type="file" name="image" />
            <input type="hidden" name="tipo" value="Tienda" />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

 <div class="modal fade" id="verImagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$factura['factura']}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
     @endforeach
    </tbody>
  </table>
  </div>
 
  </body>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  

  <script>
    $('#exampleModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>
</html