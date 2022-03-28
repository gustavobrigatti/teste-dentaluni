@extends('app')
@section('content')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Especialidades</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('especialidades.index') }}">Especialidades</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('especialidades.edit', $id == 0 ? $id:$especialidade->hash_id) }}">Editar</a></li>
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
                    <h5>Especialidade</h5>
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
                    <form action="{{ route($id > 0 ? 'especialidades.update' : 'especialidades.store', $especialidade->hash_id) }}" method="post">
                        {{ $id > 0 ? method_field('PUT') :'' }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da especialidade" value="{{ old('nome', $especialidade->nome) }}">
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
                        <form id="excluir" action="{{ route('especialidades.destroy', $especialidade->hash_id)  }}"
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
