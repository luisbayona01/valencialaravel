@extends('layouts.plantilla')

@section('template_title')
    Role
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title" style="padding: 1% 1% 1% 1%; font-weight: bold; color: black;">
                                {{ __('Nivel de Perfiles') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo Perfil') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive" style="padding: 1% 5% 0% 5%">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Name</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $role->name }}</td>


                                            <td>
                                                <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                                    <!--<a class="btn btn-sm btn-primary " href="{{ route('roles.show',$role->id) }}"><i class=""></i> {{ __('Ver') }}</a>-->
                                                    <a class="btn btn-sm btn-success" href="{{ route('roles.edit',$role->id) }}"><i class=""></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class=""></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="text-align: right; padding: 0px 10px 10px 10px">
                        <button type="button" onclick="goToHome()" class="btn btn-secondary" style="text-align: right;">Volver</button>
                    </div>
                    </div>
                    <script>
                        function goToHome() {
                            window.location.href = "{{ url('/home') }}";
                        }
                    </script>
                </div>
                {!! $roles->links() !!}
            </div>
        </div>
    </div>
@endsection
