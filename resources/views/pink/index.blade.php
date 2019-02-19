@extends(env('THEME').'.layouts.site')

@section('navigation')
    @include(env('THEME').'.navigation')
@endsection

@section('slider')
    @include(env('THEME').'.slider')
@endsection