{{--
@extends(env('THEME').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('navigation')
    {!! $content !!}
@endsection


@section('footer')
    {!! $footer !!}
@endsection
--}}
@extends(env('THEME').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection