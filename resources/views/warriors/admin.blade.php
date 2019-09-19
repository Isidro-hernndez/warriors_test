@extends('layouts.app2')

@section('content')

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2  d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Mi usuario <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Battle History
            </a>
          </li>
          
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h4>Total de Batallas Jugadas</h4>
                        </div>
                        <div class="card-body">
                            <h5>50</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-header">
                            <h4>Batallas Ganadas</h4>
                        </div>
                        <div class="card-body">
                            <h5>50</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-danger text-white">
                        <div class="card-header">
                            <h4>Batallas Perdidas</h4>
                        </div>
                        <div class="card-body">
                            <h5>50</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h4>Batallas Empatadas</h4>
                        </div>
                        <div class="card-body">
                            <h5>50</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- start other component -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Mejor Personsaje</h4>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4>Name</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="https://picsum.photos/100?random" class="img-thumbnail" alt="Image Second Warrior">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    attribute
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Peor Personsaje</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-header text-center">
                                    <h4>Name</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="https://picsum.photos/100?random" class="img-thumbnail" alt="Image Second Warrior">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    attribute
                                </div>
                            </div>
                        </div>
                    </div>
                
        <!-- End other component -->
        <div class="container pb-4">
            <h2>Ultimas Batallas</h2>
        </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Personaje usado</th>
              <th>Personaje contrincante</th>
              <th>Resultado</th>
            </tr>
          </thead>
          <tbody>
            
          <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>dolor</td>
              
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
              <td>adipiscing</td>
              
            </tr>
            <tr>
              <td>1,003</td>
              <td>Integer</td>
              <td>nec</td>
              <td>odio</td>
              
            </tr>
            <tr>
              <td>1,003</td>
              <td>libero</td>
              <td>Sed</td>
              <td>cursus</td>
              
            </tr>
            <tr>
              <td>1,004</td>
              <td>dapibus</td>
              <td>diam</td>
              <td>Sed</td>
              
            </tr>
            <tr>
              <td>1,005</td>
              <td>Nulla</td>
              <td>quis</td>
              <td>sem</td>
              
            </tr>
            <tr>
              <td>1,006</td>
              <td>nibh</td>
              <td>elementum</td>
              <td>imperdiet</td>
              
            </tr>
            <tr>
              <td>1,007</td>
              <td>sagittis</td>
              <td>ipsum</td>
              <td>Praesent</td>
              
            </tr>
            <tr>
              <td>1,008</td>
              <td>Fusce</td>
              <td>nec</td>
              <td>tellus</td>
              
            </tr>
            <tr>
              <td>1,009</td>
              <td>augue</td>
              <td>semper</td>
              <td>porta</td>
              
            </tr>
          </tbody>
        </table>
      </div>
    
    </main>
  </div>
</div>
@endsection