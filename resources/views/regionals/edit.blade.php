@extends('admin')

@section('content')

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Editar regional</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('regionais.index') }}"> voltar</a>
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

                    <form action="{{ route('regionais.update',$regional->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                         <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nome:</strong>
                                    <input type="text" name="name" value="{{ old('name',$regional->name) }}" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Cidade:</strong>
                                    <input type="text" class="form-control"  name="city" placeholder="Detail" value="{{ old('city',$regional->city) }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Endereço:</strong>
                                    <input type="text" name="address" value="{{ old('address',$regional->address) }}" class="form-control" placeholder="Name">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Contato referência:</strong>
                                    <input type="text" name="local_reference" value="{{ old('local_reference',$regional->local_reference) }}" class="form-control" placeholder="Name">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Observações:</strong>
                                    <textarea style="height:150px" name="observations" class="form-control" placeholder="Name"> {{ old('observations',$regional->observations) }}</textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                              <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>

                    </form>

@endsection








