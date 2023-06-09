<x-panel-layout>
    <x-slot name="title">
        -مدیریت مقالات
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{asset('blog/css/style.css')}}">
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard')}}">پیشخوان</a></li>
            <li><a href="{{ route('posts.index')}}" class="is-active"> مقالات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('posts.index')}}">لیست مقالات</a>
                <a class="tab__item " href="{{ route('posts.create')}}">ایجاد مقاله جدید</a>
            </div>
        </div>
        <div class="bg-white padding-20">
            <div class="t-header-search">
                <form action="{{ route('posts.index')}}" >
                    <div class="t-header-searchbox font-size-13">
                        <div type="text" class="text search-input__box font-size-13">جستجوی مقاله
                            <div class="t-header-search-content ">
                                <input type="text" class="text" placeholder="نام مقاله" name="search">
                                <button class="btn btn-webamooz_net">جستجو</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white table__box">
            <table class="table">

                <thead role="rowgroup">
                    <tr role="row" class="title-row">
                        <th>شناسه</th>
                        <th>عنوان</th>
                        <th>نویسنده</th>
                        <th>تاریخ ایجاد</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr role="row" class="">
                        <td>{{ $post->id}}</a></td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->getCreatedAtInJalali() }}</td>
                        <td>
                            
                            <a href="" class=" mlg-15" title="حذف" style="color: red;" onclick="destroyPost(event,'{{$post->id}}')">حذف</a>
                          
                            <a href="" target="_blank" class=" mlg-15" title="مشاهده" style="color: gray;">مشاهده</a>
                            <a href="{{route('posts.edit',$post->id)}}" title="ویرایش" style="color:green">
                                ویرایش
                            </a>
                            <form action="{{ route('posts.destroy',$post->id) }}" id="destroy-post-{{ $post->id }}" method="post">

                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $posts->appends(request()->query())->links()}}
        </div>
    </div>
    <x-slot name="scripts">
    
    <script>
        function destroyPost(event, id) {
            event.preventDefault();
            Swal.fire({
            title: 'آیا مطمعن هستید می خواهید این مقاله را حدف کنید؟',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'rgb(221,51,51)',
            cancelButtonColor: 'rgb(48,133,214)',
            confirmButtonText: 'بله, حذف کنید!',
             cancelButtonText:'کنسل'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`destroy-post-${id}`).submit();
            }
        })
            

        }
    </script>
</x-slot>
</x-panel-layout>