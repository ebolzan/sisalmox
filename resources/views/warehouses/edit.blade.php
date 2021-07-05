@extends('admin')

@section('content')
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Editar almoxarifado</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('almoxarifados.index') }}"> voltar</a>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Atenção!</strong> Houve campos não validados.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('almoxarifados.update', $warehouse->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                         <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nome:</strong>
                                    <input type="text" name="name" value="{{ old('name',$warehouse->name) }}" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sala:</strong>
                                    <input type="text" class="form-control"  name="room" placeholder="Detail" value="{{ old('room',$warehouse->room) }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Prédio:</strong>
                                    <input type="text" class="form-control"  name="block" placeholder="Detail" value="{{ old('block',$warehouse->block) }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Quem tem a chave:</strong>
                                    <input type="text" class="form-control"  name="owner" placeholder="Detail" value="{{ old('owner',$warehouse->owner) }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email oficial:</strong>
                                    <input type="text" class="form-control"  name="email" placeholder="Detail" value="{{ old('email',$warehouse->email) }}">
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                              <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>

                    </form>

@endsection








