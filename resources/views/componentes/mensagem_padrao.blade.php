@if (Session::get('message'))
    <div id="message" class="alert {{Session::get('class')}}">
        {!! Session::get('message') !!}
    </div>
@endif
