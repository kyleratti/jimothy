@php
$strWord = "Morning";
$iHour = intval(date('G'));

if($iHour > 17)
    $strWord = "Evening";
elseif($iHour > 12)
    $strWord = "Afternoon";
@endphp

{{-- TODO: set a designated announcement forum, grab it from there --}}

<h1>{{ $strWord }} Announcements</h1>
<ul>
    <li>One day there will be announcements here. But today is not that day. :(</li>
</ul>