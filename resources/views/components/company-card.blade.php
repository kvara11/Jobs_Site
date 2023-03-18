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


<button data-custom-open="modal-1" type="button">close</button>
{{--         
<!-- [1] -->
<div id="modal-1" aria-hidden="true">

    <!-- [2] -->
    <div tabindex="-1" data-micromodal-close>
  
      <!-- [3] -->
      <div role="dialog" aria-modal="true" aria-labelledby="modal-1-title" >
  
  
        <header>
          <h2 id="modal-1-title">
            Modal Title
          </h2>
  
          <!-- [4] -->
          <button aria-label="Close modal" data-micromodal-close></button>
        </header>
  
        <div id="modal-1-content">
          Modal Content
        </div>
  
      </div>
    </div>
  </div> --}}


        <div class="flex-none">
            {{-- <x-modal-open id="interestModal" :data="$data" /> --}}

            <button type="button" class="w-25 h-8 focus:outline-none openModal text-white text-sm px-5 mt-5 mx-5  rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg" data-id={{$data->id}}>Info</button>

            <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="interestModal">

                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>

                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                                <div class="sm:flex sm:items-start">

                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                        </svg>
                                        
                                    </div>

                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">

                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">


                                        </h3>

                                    <div class="mt-2">

                                        <p class="text-sm text-gray-500" id="modal-desc">

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                            <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">

                                Report

                            </button>

                            <button type="button" class="closeModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">

                                Close

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        
    </div>
</div>

