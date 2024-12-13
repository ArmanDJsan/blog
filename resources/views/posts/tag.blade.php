<x-app-layout>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">

        <h1 class="text-4xl font-bold text-center py-4 ">tag: {{$tag->name}}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($posts as $post)
            <article class="w-full p-4 h-80 bg-cover bg-center @if( $loop->first ) md:col-span-2 @endif"  style="background-image:url(@if($post->image){{Storage::url($post->image->url)}}@else https://cdn.pixabay.com/photo/2019/08/06/12/15/beach-4388225_1280.jpg @endif)">
                <div class="w-full h-full px-8 flex flex-col justify-intens-end">

                    <div class="">
                        <p
                        class="bg-blue-500 bg-yellow-500 bg-pink-500 bg-orange-500 bg-red-500 bg-lime-500 bg-purple-500  bg-green-500">
                    </p>

                        @foreach($post->tags as $tag)
                        <a href="{{route('posts.tag',$tag)}}" class="  inline-block px-3 h-6 bg-{{$tag->color}}-700 text-white rounded-full  ">
                            {{$tag->name}}</a>
                        @endforeach
                    </div>
                    <h1 class = "float-left text-4x1 text-white leading-8 font-bold" >
                        <a href="{{route('posts.show', $post)}}">{{$post->name}}</a>   
                    </h1></div>
                    
            </article>
            @endforeach
        </div>

        <div class="mt-4">
             {{$posts->links()}} 
        </div>
    </div>
</x-app-layout>