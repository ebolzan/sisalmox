@extends('admin')

@section('content')

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Adicionar Almoxarifado</h2>
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

                    <form action="{{ route('almoxarifados.store') }}" method="POST">
                        @csrf

                         <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nome:</strong>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="ex: Surcen">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sala:</strong>
                                    <input type="text" class="form-control"  name="room" value="{{old('room')}}" placeholder="ex: Santa Maria">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Prédio:</strong>
                                    <input type="text" class="form-control"  name="block" value="{{old('block')}}" placeholder="">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Quem tem a chave:</strong>
                                    <input type="text" class="form-control" name="owner" value="{{old('owner')}}" placeholder="Email ou telefone de alguém no local">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email oficial:</strong>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email ou telefone de alguém no local">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Telefone: </strong>
                                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Email ou telefone de alguém no local">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Regional: </strong>

                                    <select name="regional_id" class="form-control" id="regionais">
                                        @foreach ($regionais as $regional)
                                        <option value="{{$regional->id}}">{{ $regional->name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>

                    </form>

@endsection











