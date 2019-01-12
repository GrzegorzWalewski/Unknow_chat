@extends('template.app')
@section('content')
	<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<p id="room_name">{{ $room->id }}</p>
			<ul id="online_list" class="width_100">
			</ul>
		</div>
	</div>
	<div class="content">
		<div class="contact-profile text-center">
			<p id="username">{{ session('username') }} <span id="status" class="dot"></span></p>
		</div>
		<div id="message_div" class="messages">
			<ul id="messages" class="width_100">
				@if($messages->first)
					@foreach($messages as $message)
						<li class="sent">
							@if($message->user->name == session('username'))
								<p>You</p>
							@else
								<p>{{ $message->user->name }}</p>
							@endif
						</li>
						<li class="replies">
							<p id="{{ $message->id }}">{{ $message->content }}</p>
						</li>
					@endforeach
				@else
					<li class="replies">
						<p>Welcome to new chat :D</p>
					</li>
				@endif
			</ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<input id="input" type="text" placeholder="Write your message..." />
			<button id="send" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");
//# sourceURL=pen.js
</script>
@endsection