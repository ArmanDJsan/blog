<div class="form-group">
    {{ html()->label('Nombre', 'name');}}
    {{ html()->text('name')->placeholder('Ingrese el nombre del post')->class('form-control')}}
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror

</div>

<div class="form-group">
    {{ html()->label('Slug', 'slug')}}
    {{ html()->text('slug')->placeholder('Slug del post')->class('form-control') }}
    @error('slug')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {{ html()->label('Categoria', 'category_id')}} 
    @isset ($post)
    {{ html()->select('category_id', $options = $categories, $value =$post->category_id)->placeholder('elige una categoria')->class('form-control')  }}
    @else
    {{ html()->select('category_id', $options = $categories, $value ="")->placeholder('elige una categoria')->class('form-control')  }}
    @endisset
    @error('category_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    @foreach ($tags as $tag)
    @php $checked = false @endphp
    @isset($post)
    @foreach ($post->tags as $ptag) 

        @if ($tag->id == $ptag->id)
        @php $checked = true @endphp
        @endif
    @endforeach 
    @endisset   
    <label>
        {{ html()->checkbox($name = 'tags[]', $checked , $value = $tag->id)}}
        {{$tag->name}}
    </label>
    @endforeach 
    <br>
    @error('tags')
      <span class="text-danger">{{$message}}</span>
     @enderror
</div>

    <div class="row mb-3" >
        <div class="col">
            <div class="image-wrapper">
                @isset($post->image)
                    
                <img id="picture" src="{{Storage::url($post->image->url)}}">
                    
                @else
                <img  id="picture" src=   "https://cdn.pixabay.com/photo/2019/08/06/12/15/beach-4388225_1280.jpg" alt="">
                @endisset
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {{ html()->label('Selecciona una imagen', 'file')}}
                {{html()->file('file')->accept('image/*')}}
               <p> La imagen debe estar relacionada con el tema principal del post, preferiblemante que al verla el lector pueda crearse facilmente una idea del tema del post</p>
            </div>
        </div>  
    </div>



<div class="form-group">
    {{ html()->label('Extracto', 'extract')}}
    {{ html()->textarea($name = 'extract', $value = null)->class('form-control') }}
    @error('extract')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {{ html()->label('Cuerpo del post', 'body')}}
    {{ html()->textarea($name = 'body', $value = null)->class('form-control') }}
    @error('body')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {{ html()->label('Borrador', 'status')}}
    {{ html()->radio($name = 'status', $checked = true, $value = 1) }}
    {{ html()->label('Publicado', 'status')}}
    {{ html()->radio($name = 'status', $checked = false, $value = 2) }}
    @error('status')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>