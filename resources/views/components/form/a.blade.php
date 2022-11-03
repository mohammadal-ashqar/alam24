@props(['title','route'])
<a   {{ $attributes->class(['btn btn-primary waves-effect waves-light text-light'] )}} href="{{ $route }}">
    {{ $title }}
</a>
