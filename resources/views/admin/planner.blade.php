@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-md-12">
		{!! $calendar->calendar() !!}

	    {!! $calendar->script() !!}
	</div>
</div>
@endsection
