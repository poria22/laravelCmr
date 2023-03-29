<x-panel-layout>
    <div class="main-content padding-0">
        <p class="box__title">ایجاد مقاله جدید</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{route('posts.store')}}" class="padding-30" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="title" type="text" class="text" placeholder="عنوان مقاله">
                    @error('title')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                    <ul class="tags">


                        <li class="tagAdd taglist">
                            <input type="text" id="search-field">
                        </li>
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
                    <button class="btn btn-webamooz_net">ایجاد مقاله</button>
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

