<h2>Hello {{ config('settings.name') }},</h2>
You received an contact for support from : {{ $name }} <br>
Here are the details: <br>
<br>
<b>Name:</b> {{ $name }} <br>
<b>Email:</b> {{ $email }} <br>
<b>Phone:</b> {{ $phone }} <br>
<br>
<b>Subject:</b> {{ $subject }} <br>
<b>Message:</b>
<br><br> {{ $msg }}<br><br>
Thank You