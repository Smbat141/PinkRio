@extends(env('THEME').'.layouts.site')

@section('navigation')
    @include(env('THEME').'.navigation')
@endsection

@section('slider')
    @include(env('THEME').'.slider')
@endsection


@section('content')
    @include(env('THEME').'.content')
@endsection

@section('bar')
    @include(env('THEME').'.indexBar')
@endsection

@section('footer')
    @include(env('THEME').'.footer')
@endsection
