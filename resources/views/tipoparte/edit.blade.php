@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Tipoparte
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Tipoparte</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipopartes.update', $tipoparte->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipoparte.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
