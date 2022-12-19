@props(['data'])

<div class="bg-blue-100 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
        class="hidden w-48 mr-6 md:block flex-none"
            src="{{$data->logo ? asset('storage/' . $data->logo) : asset('images/no_logo.png')}}"
            alt="Logo"
        />
        <div class="grow">
            <h3 class="text-2xl">
                <a href="/posts/{{$data->id}}">Name: <b class="hover:text-green">{{$data->name}}</b></a>
                
                @if ($data->authorized == 1)
                    <i class="fa-solid fa-check-circle" style="margin-left: 5px; color:green;"></i>
                @else
                    <i class="fa-solid fa-xmark" style="margin-left: 5px; color:red;"></i>
                @endif
            </h3>

            <div class="text-lg mb-4 ">Industry: <b>{{$data->industry_name}}</b></div>
            
            <div class="text-lg mt-2">
                <i class="fa-solid fa-phone" style="margin-right: 15px; "></i>{{$data->phone}}
            </div>

            <div class="text-lg mt-2">
                <i class="fa-solid fa-envelope" style="margin-right: 15px"></i>{{$data->email}}
            </div>

            <div class="text-lg mt-2">
                <i class="fa-solid fa-location-dot" style="margin-right: 15px"></i>{{$data->location}}
            </div>

        </div>

        <div class="flex-none">
            <x-modal-open id="interestModal" :data="$data" />
        </div>
        
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        $('.openModal').on('click', function(e){

            $('#interestModal').removeClass('invisible');

        });

        $('.closeModal').on('click', function(e){

            $('#interestModal').addClass('invisible');

        });

    });

</script>