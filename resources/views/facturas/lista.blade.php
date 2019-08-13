<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
        <td>{{$factura['migo']}}</td>
        <td>{{$factura['status']}}</td>
        <td><a href="" class="btn btn-warning">Edit</a></td>
        <td>
          <form  onsubmit="return confirm('Do you really want to delete?');" action="" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html