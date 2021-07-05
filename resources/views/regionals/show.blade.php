@extends('admin')
@section('content')

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2> Visualização Regional</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('regionais.index') }}"> voltar</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nome:</strong>
                                {{ $regional->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Cidade:</strong>
                                {{ $regional->city }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Endereço:</strong>
                                {{ $regional->address }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Contato referência:</strong>
                                {{ $regional->local_reference }}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Observações:</strong>
                                {{ $regional->observations }}
                            </div>
                        </div>
                    </div>

@endsection




