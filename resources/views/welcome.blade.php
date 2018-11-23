@extends('template.app')
@section('content')
	@include('template.errors')
	<div class="height-100 row d-flex align-items-center justify-content-center w-100">
			<form autocomplete="off" action="{{ url('/') }}/chat" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<input type="text" name="room_id" id="room_id" placeholder="Room id" required>
					<input type="text" name="name" id="name" placeholder="Nickname" required>
				</div>
				<div class="d-flex justify-content-end">
					<button type="submit" class="btn btn-primary text-align-right">Submit</button>
				</div>
			</form>

	</div>
@endsection