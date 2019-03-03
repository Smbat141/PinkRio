@extends(env('THEME').'.layouts.site')

@section('navigation')
    @include(env('THEME').'.navigation')
@endsection

@section('content')
    @include(env('THEME').'.portfolio_content')
@endsection

@section('footer')
    @include(env('THEME').'.footer')
@endsection
