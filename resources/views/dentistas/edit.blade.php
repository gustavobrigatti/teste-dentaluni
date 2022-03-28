@extends('app')
@push('scripts')
    <script type="text/javascript">
        $('#cro_uf').select2({
            placeholder: 'Selecione um estado',
            width: '100%'
        });
        $('#especialidades').select2({
            placeholder: 'Selecione as especialidades',
            width: '100%'
        });
    </script>
@endpush
@section('content')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dentistas</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dentistas.index') }}">Dentistas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dentistas.edit', $id == 0 ? $id:$dentista->hash_id) }}">Editar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- Zero config table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Dentista</h5>
                </div>
                <div class="card-body">
                    @if($errors->count())
                        <div class="alert alert-danger alert-dismissible">
                            @foreach($errors->all() as $message)
                                <p style="vertical-align: middle;">{{$message}}</p>
                            @endforeach
                        </div>
                    @endif
                    {{--FORM--}}
                    <form action="{{ route($id > 0 ? 'dentistas.update' : 'dentistas.store', $dentista->hash_id) }}" method="post">
                        {{ $id > 0 ? method_field('PUT') :'' }}
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do dentista" value="{{ old('name', $dentista->name) }}">
                            </div>
                            <div class="form-group col-6">
                                <label for="email">E-Mail</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Digite o email do dentista" value="{{ old('email', $dentista->email) }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="cro">CRO</label>
                                <input type="text" class="form-control mask-number" id="cro" name="cro" maxlength="11" placeholder="Digite o CRO do dentista" value="{{ old('cro', $dentista->cro) }}">
                            </div>
                            <div class="form-group col-6">
                                <label for="cro_uf">UF</label>
                                <select class="js-example-basic-multiple form-control custom-select-lg" name="cro_uf" id="cro_uf" required>
                                    <option></option>
                                    <option value="AC" {{ $dentista->cro_uf == 'AC' ? 'Selected':'' }}>Acre</option>
                                    <option value="AL" {{ $dentista->cro_uf == 'AL' ? 'Selected':'' }}>Alagoas</option>
                                    <option value="AP" {{ $dentista->cro_uf == 'AP' ? 'Selected':'' }}>Amapá</option>
                                    <option value="AM" {{ $dentista->cro_uf == 'AM' ? 'Selected':'' }}>Amazonas</option>
                                    <option value="BA" {{ $dentista->cro_uf == 'BA' ? 'Selected':'' }}>Bahia</option>
                                    <option value="CE" {{ $dentista->cro_uf == 'CE' ? 'Selected':'' }}>Ceará</option>
                                    <option value="ES" {{ $dentista->cro_uf == 'ES' ? 'Selected':'' }}>Espírito Santo</option>
                                    <option value="GO" {{ $dentista->cro_uf == 'GO' ? 'Selected':'' }}>Goiás</option>
                                    <option value="MA" {{ $dentista->cro_uf == 'MA' ? 'Selected':'' }}>Maranhão</option>
                                    <option value="MT" {{ $dentista->cro_uf == 'MT' ? 'Selected':'' }}>Mato Grosso</option>
                                    <option value="MS" {{ $dentista->cro_uf == 'MS' ? 'Selected':'' }}>Mato Grosso do Sul</option>
                                    <option value="MG" {{ $dentista->cro_uf == 'MG' ? 'Selected':'' }}>Minas Gerais</option>
                                    <option value="PA" {{ $dentista->cro_uf == 'PA' ? 'Selected':'' }}>Pará</option>
                                    <option value="PB" {{ $dentista->cro_uf == 'PB' ? 'Selected':'' }}>Paraíba</option>
                                    <option value="PR" {{ $dentista->cro_uf == 'PR' ? 'Selected':'' }}>Paraná</option>
                                    <option value="PE" {{ $dentista->cro_uf == 'PE' ? 'Selected':'' }}>Pernambuco</option>
                                    <option value="PI" {{ $dentista->cro_uf == 'PI' ? 'Selected':'' }}>Piauí</option>
                                    <option value="RJ" {{ $dentista->cro_uf == 'RJ' ? 'Selected':'' }}>Rio de Janeiro</option>
                                    <option value="RN" {{ $dentista->cro_uf == 'RN' ? 'Selected':'' }}>Rio Grande do Norte</option>
                                    <option value="RS" {{ $dentista->cro_uf == 'RS' ? 'Selected':'' }}>Rio Grande do Sul</option>
                                    <option value="RO" {{ $dentista->cro_uf == 'RO' ? 'Selected':'' }}>Rondônia</option>
                                    <option value="RR" {{ $dentista->cro_uf == 'RR' ? 'Selected':'' }}>Roraima</option>
                                    <option value="SC" {{ $dentista->cro_uf == 'SC' ? 'Selected':'' }}>Santa Catarina</option>
                                    <option value="SP" {{ $dentista->cro_uf == 'SP' ? 'Selected':'' }}>São Paulo</option>
                                    <option value="SE" {{ $dentista->cro_uf == 'SE' ? 'Selected':'' }}>Sergipe</option>
                                    <option value="TO" {{ $dentista->cro_uf == 'TO' ? 'Selected':'' }}>Tocantins</option>
                                    <option value="DF" {{ $dentista->cro_uf == 'DF' ? 'Selected':'' }}>Distrito Federal</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departamentos">Especialidades</label>
                            <select class="js-example-basic-multiple form-control custom-select-lg" name="especialidades[]" id="especialidades" multiple="multiple">
                                <option></option>
                                @foreach($especialidades as $especialidade)
                                    <option value="{{ $especialidade->id }}" @if($dentista->especialidades->contains($especialidade->id)) selected @endif>{{ $especialidade->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($id == 0)
                            <button type="submit" id="btn-in" class="btn btn-primary btn-sm-block">Salvar</button>
                        @else
                            <button type="submit" id="btn-ed" class="btn btn-primary">Salvar</button>
                            <a type="button" id="btnexcluir" class="btn btn-danger pull-right confirmBtn"
                               href="javascript:document.getElementById('excluir').submit();">Excluir</a>
                        @endif
                    </form>
                    @if($id > 0)
                        <form id="excluir" action="{{ route('dentistas.destroy', $dentista->hash_id)  }}"
                              method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE"/>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
