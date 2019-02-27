@extends(env('THEME').'.layouts.site')


@section('content')
    @include(env('THEME').'.login_content')
@endsection

@section('footer')
    @include(env('THEME').'.footer')
@endsection
