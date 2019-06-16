@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('profile.edit')}}" method="post">
        @csrf
        @for($i=0; $i<10; $i++)
            <input type="text" name="license[]" value="{{$user->licenses->has($i) ? $user->licenses[$i]->name : null}}">
        @endfor

        <button type="submit">送信</button>
    </form>
    <div>
    @php
    $value = [0, 1, 2];
    @endphp
    @for($i = 0; $i < 10; $i++)
        <input type="button" value="open" class="open">
        <div @if(!in_array($i, $value)) style="display: none;" @endif>
            <input type="checkbox" name="active" @if(in_array($i, $value)) checked @endif>
        </div>
    @endfor

    <script>
        window.addEventListener('DOMContentLoaded', function (evt) {
            var buttons = document.querySelectorAll('.open');
            buttons.forEach(function (button) {
                button.addEventListener('click', function (e) {
                    console.log('lll');
                    var t = e.target;
                    t.nextElementSibling.style.display = 'block';
                    t.nextElementSibling.querySelector('[name=active]').checked = true;
                }, false);
            });
        });
    </script>
    </div>
@endsection