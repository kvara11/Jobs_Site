@props(['data'])

<div class="bg-gray-80 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="images/no_logo.png"
            alt="Logo"
        />
        <div>
            <h3 class="text-2xl">
                <a href="/posts/{{$data->id}}">{{$data->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$data->company_name}}</div>
            
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot" style="margin-right: 5px"></i>{{$data->country}}
            </div>
            <x-post-tag :tags="$data->tags" />
        </div>
    </div>
</div>