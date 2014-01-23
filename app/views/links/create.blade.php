<h1>Shorten a URL</h1>

{{ Form::open(['url' => 'links']) }}
    {{ Form::text('url') }}
    {{ $errors->first('url') }}
{{ Form::close() }}

@if (Session::has('hashed'))
    {{ link_to(Session::get('hashed')) }}
@endif
