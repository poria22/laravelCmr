<x-panel-layout>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش مقاله</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{route('posts.update',$post->id)}}" class="padding-30" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input name="title" type="text" class="text" value="{{$post->title}}">
                    @error('title')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                    <ul class="tags">

                        @foreach($post->categories as $category)
                        <li class="tagAdd taglist">
                            <input type="text" id="search-field" value="{{$category->name}}">
                        </li>
                        @endforeach
                    </ul>
                    @error('tags')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود بنر دوره</span>
                            <input type="file" class="file-upload" id="files" name="banner" accept="image/*"/>
                        </div>
                        <span class="filesize"></span>
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
                    </div>
                    @error('banner')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                    <textarea name="content" placeholder="متن مقاله" class="text "></textarea>
                    <button class="btn btn-webamooz_net">ویرایش مقاله</button>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script src="{{asset('blog/panel/js/tagsinput.js')}}"></script>
        <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content',{
                language:'fa',
                filebrowserUploadUrl: "{{route('posts-editor' ,["_token"=>csrf_token()])}}",
                filebrowserUploadMethod: 'form'
            });

        </script>

    </x-slot>
</x-panel-layout>

