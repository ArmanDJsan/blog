<x-app-layout>

    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-bold text-left py-4 ">{{$post->name}}: </h1>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            
            <div class="md:col-start-1 md:col-end-4">
                
                <article class="mb-4 p-4 w-full  h-80 bg-cover bg-center "  style="background-image:url(@if($post->image){{Storage::url($post->image->url)}}@else https://cdn.pixabay.com/photo/2019/08/06/12/15/beach-4388225_1280.jpg @endif)">
                    <div class=" w-full h-full px-8 flex flex-col  justify-items-end">
                        <div class="">
                            
                            @foreach($post->tags as $tag)
                            <a href="{{route('posts.tag',$tag)}}" class="  inline-block px-3 h-6 bg-{{$tag->color}}-700 text-white rounded-full">
                                {{$tag->name}}</a>
                            @endforeach
                        </div>
                        <h1 class = "float-left text-4x1 text-white leading-8 font-bold" >
                            <a href="#">{{$post->name}}</a>   
                        </h1>
                    </div>
                
                </article>
            
                <h1>{{$post->body}}</h1>
            </div>
            <aside class="">
                <h1 class="text-lg font-bold">Posts similares a este:</h1>
                    @foreach($similares as $similar)
                        <article class="my-2  w-full h-80 md:h-60 bg-cover bg-center @if( $loop->first )  @endif"  style="background-image:url(@if($similar->image){{Storage::url($similar->image->url)}}@else https://cdn.pixabay.com/photo/2019/08/06/12/15/beach-4388225_1280.jpg @endif)">
                            <div class="w-full h-full p-4 flex flex-col justify-items-end">

                                <div class="">
                                    <p
                                    class="bg-blue-500 bg-yellow-500 bg-pink-500 bg-orange-500 bg-red-500 bg-lime-500 bg-purple-500  bg-green-500">
                                </p>

                                    @foreach($similar->tags as $tag)
                                    <a href="{{route('posts.tag',$tag)}}" class="  inline-block px-3 h-6 bg-{{$tag->color}}-700 text-white rounded-full  ">
                                        {{$tag->name}}</a>
                                    @endforeach
                                </div>
                                <h1 class = "float-left text-4x1 text-white leading-8 font-bold" >
                                    <a href="{{route('posts.show', $similar)}}">{{$similar->name}}</a>   
                                </h1>
                            </div>
                        </article>
                    @endforeach
                    <div class="mt-4">
                          {{$similares->links()}}
                      </div>
             </aside>
        </div>

        <div class="mt-4">
       
        </div>
  
    </div>
</x-app-layout>