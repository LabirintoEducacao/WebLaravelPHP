@extends('vendor.menu')
@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Controle de Salas</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nome
                        </th>
                        <th>
                          Tema
                        </th>
                        <th>
                          Tempo
                        </th>
                        <th>
                          Tipo
                        </th>
                        <th>
                          Ativa
                        </th>
                        <th>
                            botao
                        </th>
                      </thead>
                      <tbody>
             
                            @foreach($salas as $sala)
                                <tr>
                                    <td>{{$sala->name}}</td>
                                    <td>
                                        @if($sala->tematica==1)
                                            Deserto
                                        @elseif($sala->tematica==2)
                                            Cidade Abandonada
                                        @elseif($sala->tematica==3)
                                            Casa
                                        @else
                                            Floresta
                                        @endif
                                    </td>
                                    <td>{{$sala->duracao}}</td>
                                    <td>
                                        @if($sala->public==0)
                                            Privada
                                        @else
                                            Pública
                                        @endif
                                    </td>
                                    <td>
                                        @if($sala->enable==1)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </td>
                                    <td>
                                        ...
                                    </td>
                                </tr>
                            @endforeach
              
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
</div>
@endsection
