<h1>About View</h1>
<p>My name is {{$name}}</p>
{{--convert html tag to text--}}
{!! $name !!}
{{--short condition to check vailable declare or not--}}
<p>My name is {{isset($data)?$data :"No name"}}</p>
{{--or --}}
<p>
    My name is
    @if(isset($data))
        {{$data}}
    @else
      No Name
    @endif

    @if(count($number))
        @foreach($number as $value)
            <br> {{$value}} <br>
            @endforeach
        @endif
</p>
Hello, {{ $name }}.