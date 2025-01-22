<div class="flex gap-7 justify-center  w-full h-10 px-5 py-1">
    <!--select category-->

     <div class="hidden relative ss:inline-block ">
         <button id="firstbtn" class="h-8 w-full px-2 rounded-xl bg-gray-200 flex items-center justify-between">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
             <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
           </svg>
           <span>Browse Collections</span>
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
             <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
           </svg>
         </button>
         <ul class="absolute z-10 hidden bg-white border border-gray-300 rounded-md shadow-lg mt-1 w-full">
           <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline-block mr-2">
               <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
             </svg>
             All Collections
           </li>
           @foreach ($collections as $item)
           <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">{{$item->collection_name}}</li>
           @endforeach
           
         </ul>

    </div>
    <!--select category end-->

    <!--Search -->
    <div class="flex p-0.5 rounded justify-between border-2 border-pink-500 w-ninety ss:w-1/2">
     <input class="w-full px-2 bg-transparent text-sm vs:text-lg border-0 outline-0 focus-within:border-0" type="text" placeholder="Search Products" >
     <button class="bg-pink-500 px-2 w-9  rounded">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 stroke-white">
             <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
         </svg>

     </button>
    </div>
    <!--Search end-->

 </div>
