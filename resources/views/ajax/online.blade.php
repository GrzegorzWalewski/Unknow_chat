@foreach($onlines as $online)
	<li>
		<p>{{ $online->user->name }} <span class="dot"></span></p>
	</li>
@endforeach