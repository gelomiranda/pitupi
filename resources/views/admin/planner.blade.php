@extends('layout.master')
@section('content')
<div class="row">

    <div class="col-md-12">
    	<div class="box">
		{!! $calendar->calendar() !!}

	    {!! $calendar->script() !!}
	    </div>
	</div>
</div>
@endsection
