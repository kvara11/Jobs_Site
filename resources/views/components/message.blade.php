{{-- succsess message after post creation --}}
{{-- this component used in 'layout' --}}
{{-- x-data x-init x-show   ->  alpine.js directives --}}

@if (session()->has('message'));
    <div x-data="{show: true}" x-init="setTimeout( () => show = false, 1500)" x-show="show" 
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif