@extends(env('THEME').'.layouts.site')

@section('navigation')
    @include(env('THEME').'.navigation')
@endsection

@section('content')
    @include(env('THEME').'.contact_content')
@endsection

@section('bar')
    @include(env('THEME').'.contact_bar')
@endsection

@section('footer')
    @include(env('THEME').'.footer')
@endsection
