@component('mail::message')
# {{ $data['subject'] }}

{!! $data['details'] !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent