@extends(env('THEME').'.layouts.site')

@section('navigation')
    {!! $navigation !!}
    @if(count($errors) > 0)
        <div class="box error-box">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    @if(session('message'))
        <div class="box success-box">
            <p> {{session('message')}}</p>
        </div>
    @endif
@endsection

@section('footer')
    {!! $footer !!}
@endsection
