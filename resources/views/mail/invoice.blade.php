{{--Invoice Template --}}
<html>
<head>

</head>

<body>
<p>Dear {{$user->name}},</p>
<br>
<p>You are assigned an invoice.</p>

<p>Invoice Title: {{$invoice->name}}</p>

<p>Description: {{$invoice->description}}</p>

Please click on the below button or copy the below link and paste on the url to see the invoice details.
<p><a class='btn' href='{{$invoice_link}}'>Invoice Details</a></p>
<p>Link: {{$invoice_link}}</p>
<br>
<p>Thanks<br>{{env('APP_NAME')}}</p>
</body>

</html>
