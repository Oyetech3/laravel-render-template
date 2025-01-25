<div class="my-14 w-full px-10 py-10 rounded-lg ">
    <h1 class="heads">Featured Collections</h1>
    <!--each categories-->
    <div class="grid lg:grid-cols-2 gap-10 w-full justify-center items-center place-items-center  py-10">

        @foreach ($collections as $item)

        <div class="flex gap-5">
            <a href="">
                <div class="coll">
                    <img class="w-full h-full  rounded-lg" src="./images/{{$item->imageone}}" >
                    <div class="absolute top-2/4  mt-10 py-6 px-6">
                        <p class="font-bold text-black text-xl leading-relaxed" style="-webkit-text-stroke: 1px white;">{{$item->collection_name}}</p>
                        <a href="" class="block text-center bg-gradient-to-r mt-2 from-teal-500 to-teal-700 hover:from-teal-600 hover:to-teal-800 rounded-md py-1.5 px-4 transform transition-all duration-300 hover:scale-105 shadow-lg">
                            <p class="text-white font-semibold">Shop Now</p>
                        </a>
                    </div>
                </div>
            </a>
            <div class="colldiv">
                <div class="collone">
                    <img src="./images/{{$item->imagetwo}}" class="h-full w-full rounded-lg" >
                </div>
                <div class="colltwo ">
                    <img src="./images/{{$item->imagethree}}" class="h-full w-full rounded-lg" >
                </div>
            </div>
        </div>

        @endforeach


    </div>
</div>
