@props(['tags'])

@php
    $tags = explode(',', $tags);
@endphp

<ul class="flex" style="margin-top: 5px">

    @foreach ($tags as $tag)

        @if (!empty($tag))
            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                <a href="/?tag={{$tag}}">{{$tag}}</a>
            </li>   
        @endif

    @endforeach
    
</ul>

