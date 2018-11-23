@extends('template.app')
@section('content')
	<div class="container">
		<div class="row w-100 mt-3 text-center">
			<div class="col w-25">
				<ol>
					<li>Online</li>
					<li>Offilne</li>
				</ol>
			</div>
			<div class="col w-25">
				<p>Room: {{ $roomData->name }}</p>
				<p>Nick: {{ session('username') }}</p>
			</div>
			<div class="col w-25">
				<ol>
					<li>Black</li>
					<li>Red</li>
					<li>White</li>
				</ol>
			</div>
		</div>
		<div class="row w-100 mt-5 height-50 text-center">
			<div class="col-2">
				<img src="https://i.pinimg.com/236x/f9/d2/5a/f9d25ad57e62ce968b00f53970460a8f--persuasive-examples-persuasive-text.jpg">
			</div>
			<div class="col-8">
				<div class="overflow">
					<div class=" messages d-flex flex-column-reverse">
						@if(!$messages->first())
						<div class="message p-4">
							<p class="message-text">Welcome its new server, so we don't have any message to show You</p>
						</div>
						@endif
						@foreach($messages as $message)
					    <div class="message p-4">
							<h3>{{ $message->user->name }}</h3>
							<p class="message-text">
								{{ $message->message }}
							</p>
					    </div>
					    @endforeach
				    </div>
				</div>
			    <div class="mt-3">
			    	<input placeholder="Message" class="width-90" type="text" id="message">
			    	<a href="#"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
			    </div>
			</div>
			<div class="col-2">
				<img src="https://i.pinimg.com/236x/f9/d2/5a/f9d25ad57e62ce968b00f53970460a8f--persuasive-examples-persuasive-text.jpg">
			</div>
		</div>
		<div class="row w-100">
			<p>Online: {{ session('username') }}</p>
		</div>
	</div>
@endsection