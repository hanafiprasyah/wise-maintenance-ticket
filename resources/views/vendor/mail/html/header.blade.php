@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'WISE Ticket App')
                <img src="{{ asset('wiselogo.png') }}" class="logo" alt="WISE Ticket App Logo" width="86"
                    height="86">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
