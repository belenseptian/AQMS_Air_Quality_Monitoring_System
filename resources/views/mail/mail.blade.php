<h1>Hi, {{ $name }}</h1>
<br>
The following is the link to reset your password  <a href="{{ url('/') }}/reset/{{ $name }}/{{ time() }}">{{ url('/') }}/reset/{{ $name }}/{{ $time }}</a>, please ignore this message if this is not from you.
<br><br>
Thank you and regards
<br><br>
AQMS Team