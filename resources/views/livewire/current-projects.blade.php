<div class="w-full mx-3 m-3 rounded overflow-hidden shadow-lg relative hover:shadow-2xl transition ease-in-out duration-500 sm:w-full md:w-6/12 lg:w-4/12 xl:w-3/12">
    <img class="w-full" src="https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80" alt="Sunset in the mountains">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2 text-white font-bold">{{ $project['title'] }}</div>
        <p class="text-base text-white">{{ $project['description'] }}</p>
    </div>
    <div class="mt-2 ml-2 rounded-md bg-blue-400 text-xl font-semibold absolute top-0 p-2">
        <span>{{ $project['id'] }}</span>
    </div>
</div>
