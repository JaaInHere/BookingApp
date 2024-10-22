<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Booking Room App
        </h2>
    </x-slot>
    
    <section class="py-12 pl-32 grid grid-cols-3 drop-shadow-md ">
        <a href="/daftarRuang">
        <div class=" bg-white h-52 max-w-60 rounded-md">
            <span style="color: green">
            <i class="fa-solid fa-building fa-2xl px-4 py-6 mt-6 mx-6 bg-green-300 rounded-md"></i> 
            </span>
            <p class="text-xl ml-5 mt-5 font-medium text-gray-500">Ruangan Tersedia</p>
            <p class="text-4xl text-center mt-5 font-medium text-gray-500">0</p>
        </div>
        </a>

        <a href="/daftar">
        <div class=" bg-white  h-52 max-w-60 rounded-md">
            <span style="color: rgba(83,193,218,255)">
                <i class="fa-solid fa-building-user fa-2xl px-4 py-6 mt-6 mx-6 bg-sky-200 rounded-md"></i> 
                </span>
                <p class="text-xl ml-5 mt-5 font-medium text-gray-500">Booking Ruangan</p>
                <p class="text-4xl text-center mt-5 font-medium text-gray-500">0</p>
        </div>
        </a>

        <a href="/diBooking">
        <div class=" bg-white  h-52 max-w-60 rounded-md">
            <span style="color: #FBFF00">
                <i class="fa-solid fa-building-circle-check fa-2xl px-4 py-6 mt-6 mx-6 bg-yellow-300 rounded-md"></i> 
                </span>
                <p class="text-xl ml-5 mt-5 font-medium text-gray-500">Booking Selesai Dibuat</p>
                <p class="text-4xl text-center mt-5 font-medium text-gray-500">0</p>
        </div>
        </a>
    </section>

    <section class="py-7 px-4">
        <div class="bg-white rounded-md shadow-md h-screen max-w-screen">
            <p class="text-3xl ml-5 pt-8 font-medium text-gray-500">Booking Rooms App</p>
            <p class="text-md mx-5 pt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis laborum adipisci iusto sint, minima possimus quidem doloribus earum eaque ea sequi quae, sit dignissimos alias at magnam voluptatum laudantium non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis dignissimos placeat est dolore repellat labore ullam ipsum esse adipisci accusamus animi commodi eos ducimus recusandae rerum, repellendus laudantium aspernatur eveniet?
            Aspernatur voluptatum similique explicabo earum? Beatae quis ipsam dignissimos adipisci itaque ratione similique dolorem fuga consequatur nemo aliquam quia placeat, est magni accusantium quaerat inventore maiores dicta, quam aut laudantium.
            Sequi pariatur illum beatae expedita, non laudantium quidem vero fuga eos! Doloribus sequi voluptatum a facere sapiente officia cupiditate, nam possimus quidem perspiciatis! Facilis corporis quibusdam, sed animi omnis praesentium.</p>

            <p class="text-3xl ml-5 pt-8 font-medium text-gray-500">Ruang Tersedia</p>
            <p class="text-md mx-5 pt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis laborum adipisci iusto sint, minima possimus quidem doloribus earum eaque ea sequi quae, sit dignissimos alias at magnam voluptatum laudantium non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis dignissimos placeat est dolore repellat labore ullam ipsum esse adipisci accusamus animi commodi eos ducimus recusandae rerum, repellendus laudantium aspernatur eveniet?
           </p>

            <p class="text-3xl ml-5 pt-8 font-medium text-gray-500">Booking Ruangan</p>
            <p class="text-md mx-5 pt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis laborum adipisci iusto sint, minima possimus quidem doloribus earum eaque ea sequi quae, sit dignissimos alias at magnam volupt
           </p>

            <p class="text-3xl ml-5 pt-8 font-medium text-gray-500">Booking Selesai Dibuat</p>
            <p class="text-md mx-5 pt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis laborum adipisci iusto sint, minima possimus quidem doloribus earum eaque ea sequi quae, sit 
           </p>
        </div>
    </section>

</x-app-layout>
