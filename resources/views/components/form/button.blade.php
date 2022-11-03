@props(['type'=>'submit','title'])
    <button type="{{ $type }}"
      {{ $attributes->class(['btn btn-primary waves-effect waves-light text-light']) }}>{{ $title }}
    </button>

