@extends('template.app')
@section('content')
	<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<p>ROOMROOM</p>
		</div>
	</div>
	<div class="content">
		<div class="contact-profile text-center">
			<p>NICKNICK</p>
		</div>
		<div class="messages">
			<ul class="width_100">
				<li class="replies">
					<p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
				</li>
			</ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<input type="text" placeholder="Write your message..." />
			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");
//# sourceURL=pen.js
</script>
@endsection