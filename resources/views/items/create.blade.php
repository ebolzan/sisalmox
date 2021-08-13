@extends('admin')

@section('content')

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Adicionar Item</h2>
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

                    <form action="{{ route('itens.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                         <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nome:</strong>
                                    <input type="text" maxlength="200" name="name" value="{{old('name')}}" class="form-control" placeholder="ex: Impressora">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Observações:</strong>
                                    <textarea class="form-control" maxlength="200" name="observation">{{old('observation')}}</textarea>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Unidade:</strong>
                                    <input type="text" maxlength="200" class="form-control"  name="unity" value="{{old('unity')}}" placeholder="">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Quantidade mínima:</strong>
                                    <input type="text" class="form-control" name="quantity_min" value="{{old('quantity_min')}}" placeholder="">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Informações de entrada:<br></strong>

                                <div class="row">
                                    <div class="col-md-7"> Data: <input class="form-control" type="date"  name="date_form" value="{{old('date_form')}}" placeholder=""></div>
                                    <div class="col-md-5"> Hora: <input type="time" class="form-control" name="hour_form" value="{{old('hour_form')}}" placeholder=""></div>
                                </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Informações de saída:<br></strong>

                                    <div class="row">
                                    <div class="col-md-7"> Data: <input class="form-control" type="date"  name="data_out" value="{{old('data_out')}}" placeholder=""></div>
                                    <div class="col-md-5"> Hora: <input type="time" class="form-control" name="time_out" value="{{old('time_out')}}" placeholder=""></div>
                                </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Número serial: </strong>
                                    <input type="text" maxlength="200" class="form-control" name="serial_number" value="{{old('serial_number')}}" placeholder="">
                                </div>
                            </div>


                          {{-- <img src="{{ url("storage/itens/u1NXboxAXu7hY9WTSd317xtlYVRpkoByo7LD0ox9.jpg") }}" > --}}

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Imagem: </strong>
                                    <input type="file"  class="form-control" name="file" value="{{old('file_path', 'default.png')}}" placeholder="">
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Visibilidade:</strong>
                                    <div class="row">
                                        <div class="col-md-2">
                                        <input type="checkbox"  class="form-control" name="is_visible" value="1" {{ old('is_visible')=="1"? 'checked': ''}}>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Código: </strong>
                                    <input type="text" maxlength="200" class="form-control" name="code" value="{{old('code')}}" placeholder="">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>almoxarifados: </strong>

                                    <select name="warehouse_id" class="form-control" id="regionais">
                                        @foreach ($warehouses as $warehouse)
                                        <option value="{{$warehouse->id}}">{{ $warehouse->name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Categoria: </strong>

                                    <select name="categories_id" class="form-control" id="regionais">
                                        @foreach ($categories  as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
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










