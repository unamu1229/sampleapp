@php
$values = ['aaaa', 'bbbb', 'cccc', 'dddd'];
@endphp
<p>@foreach($values as $val)
    {{$val}} <br>
@endforeach</p>