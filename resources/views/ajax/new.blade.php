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
@endif