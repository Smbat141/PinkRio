@extends(env('THEME').'.layouts.site')

@section('navigation')
    @include(env('THEME').'.navigation')
@endsection

@section('content')
    @include(env('THEME').'.articles_content')
@endsection

@section('bar')
    @include(env('THEME').'.articlesRightBar')
@endsection

@section('footer')
    @include(env('THEME').'.footer')
@endsection
