    @extends('admin')
    @section('content')

                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Adicionar Regional</h2>
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

                        <form action="{{ route('regionais.store') }}" method="POST">
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
                                        <strong>Cidade:</strong>
                                        <input type="text" class="form-control"  name="city" value="{{old('city')}}" placeholder="ex: Santa Maria">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Endereço:</strong>
                                        <input type="text" class="form-control"  name="address" value="{{old('address')}}" placeholder="">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Contato local:</strong>
                                        <input type="text" class="form-control" name="local_reference" value="{{old('local_reference')}}" placeholder="Email ou telefone de alguém no local">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Observações:</strong>
                                        <textarea class="form-control" style="height:150px" name="observations"  placeholder="">{{old('observations')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>

                        </form>

    @endsection











