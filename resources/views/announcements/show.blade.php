@php
$strWord = "Morning";
$iHour = intval(date('G'));

if($iHour > 17)
    $strWord = "Evening";
elseif($iHour > 12)
    $strWord = "Afternoon";
@endphp

{{-- TODO: set a designated announcement forum, grab it from there --}}

<h3><span class="fi-megaphone"></span> {{ $strWord }} Announcements</h3>
<ul>
    <li>One day there will be announcements here. But today is not that day.</li>
    <li>And perhaps a second one, too.</li>
</ul>
