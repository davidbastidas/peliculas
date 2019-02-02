<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <center><h4>Mis Peliculas Arrendadas</h4></center>
                <br><br>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Director</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Precio</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservadas as $reservada)
                            <tr>
                                <th scope="row">{{$reservada->id}}</th>
                                <td>{{$reservada->nombre}}</td>
                                <td>{{$reservada->director}}</td>
                                <td>{{$reservada->genero}}</td>
                                <td>${{number_format($reservada->precio, 0, ',', ',')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
