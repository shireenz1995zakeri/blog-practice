<x-app-layout>
    <x-slot name="title">
        -{{$post->title}}صفحه ی پست
    </x-slot>
    <main>
        <div class="container article">
            <article class="single-page">
                <div class="breadcrumb">
                    <ul class="breadcrumb__ul">
                        <li class="breadcrumb__item"><a href="{{ route('landing')}}" class="breadcrumb__link" title="خانه">بخش مقالات</a></li>
                        <li class="breadcrumb__item">
                            <a href="{{ route('post.show',$post->slug)}}" class="breadcrumb__link" title="
                            {{$post->title}}">
                                {{$post->title}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="single-page__title">
                    <h1 class="single-page__h1">{{$post->title}} </h1>
                    @auth
                    <span class="single-page__like @if($post->is_user_liked) single-page__like--is-active @endif"></span>
                    @endauth
                </div>
                <div class="single-page__details">
                    <div class="single-page__author">نویسنده : {{$post->user->name}}</div>
                    <div class="single-page__date">تاریخ : {{$post->getCreatedAtInJalali()}}</div>
                </div>
                <div class="single-page__img">
                    <img class="single-page__img-src" src="{{$post->getBannerUrl() }}" alt="">
                </div>
                <div class="single-page__content">
                    {{!! $post->content !!}}








                </div>
                <div class="single-page__tags">
                    <ul class="single-page__tags-ul">
                        <li class="single-page__tags-li">
                            @foreach($post->categories as $category)
                            <a href="{{ route('category.show',$category->slug)}}" class="single-page__tags-link">{{$category->name}}</a>
                            @endforeach
                        </li>

                    </ul>
                </div>

            </article>
        </div>
        <div class="container">
            <div class="comments" id="comments">
                @auth
                <div class="comments__send">
                    <div class="comments__title">
                        <h3 class="comments__h3"> دیدگاه خود را بنویسید </h3>
                        <span class="comments__count"> نظرات ( {{ $post->comments_count }} ) </span>
                    </div>
                    <form action="{{ route('comment.store')}}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="comment_id" value="" id="reply-input">

                        <textarea class="comments__textarea" name="content" placeholder="بنویسید"></textarea>
                        <button class="btn btn--blue btn--shadow-blue">ارسال نظر</button>
                        <button class="btn btn--red btn--shadow-red">انصراف</button>
                    </form>

                </div>
                @else
                <p>شما برای ارسال نظر اول باید عضو سایت شوید</p>
                @endauth
                <div class="comments__list">
                    @foreach($post->comments as $comment)
                    @include('comments.comment',['comment',$comment])
                    @endforeach
                    <!-- <div id="comment-1">
                        <div class="comments__box">
                            <div class="comments__inner">
                                <div class="comments__header">
                                    <div class="comments__row">
                                        <div class="d-flex flex-grow-1">
                                            <div class="comments__avatar">
                                                <img src="img/profile.jpg" class="comments__img">
                                            </div>
                                            <div class="comments__details">
                                                <h5 class="comments__author"><span class="comments__author-name">محمد نیکو نیکو نیکو</span></h5>
                                                <span class="comments_date"> 523 روز پیش </span>
                                            </div>
                                        </div>
                                        <a href="#comments" class="btn btn--blue btn--shadow-blue btn--comments-reply">ارسال پاسخ</a>
                                    </div>
                                </div>
                                <p class="comments__body">
                                    لورم ایپسوم
                                    متـــــــــــــــــــــــــــــــــــــــــــــــــــن
                                    ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                    که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع
                                    با هدف بهبود ابزارهای کاربردی می باشد.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="comment-2">
                        <div class="comments__box">
                            <div class="comments__inner">
                                <div class="comments__header">
                                    <div class="comments__row">
                                        <div class="d-flex flex-grow-1">
                                            <div class="comments__avatar">
                                                <img src="img/profile.jpg" class="comments__img">
                                            </div>
                                            <div class="comments__details">
                                                <h5 class="comments__author"><span class="comments__author-name">محمد نیکو نیکو نیکو</span></h5>
                                                <span class="comments_date"> 523 روز پیش </span>
                                            </div>
                                        </div>
                                        <a href="#comments" class="btn btn--blue btn--shadow-blue btn--comments-reply">ارسال پاسخ</a>
                                    </div>
                                </div>
                                <p class="comments__body">
                                    لورم ایپسوم
                                    متـــــــــــــــــــــــــــــــــــــــــــــــــــن
                                    ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                    که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع
                                    با هدف بهبود ابزارهای کاربردی می باشد.

                                </p>
                            </div>
    
                            <div class="comments__subset">
                                <div id="comment-3">
                                    <div class="comments__box">
                                        <div class="comments__inner">
                                            <div class="comments__header">
                                                <div class="comments__row">
                                                    <div class="d-flex flex-grow-1">
                                                        <div class="comments__avatar">
                                                            <img src="img/profile.jpg" class="comments__img">
                                                        </div>
                                                        <div class="comments__details">
                                                            <h5 class="comments__author"><span class="comments__author-name">محمد نیکو نیکو نیکو</span></h5>
                                                            <span class="comments_date"> 523 روز پیش </span>
                                                        </div>
                                                    </div>
                                                    <a href="#comments" class="btn btn--blue btn--shadow-blue btn--comments-reply">ارسال پاسخ</a>
                                                </div>
                                            </div>
                                            <p class="comments__body">
                                                لورم ایپسوم
                                                متـــــــــــــــــــــــــــــــــــــــــــــــــــن
                                                ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                                گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع
                                                با هدف بهبود ابزارهای کاربردی می باشد.

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="comment-4">
                        <div class="comments__box">
                            <div class="comments__inner">
                                <div class="comments__header">
                                    <div class="comments__row">
                                        <div class="d-flex flex-grow-1">
                                            <div class="comments__avatar">
                                                <img src="img/profile.jpg" class="comments__img">
                                            </div>
                                            <div class="comments__details">
                                                <h5 class="comments__author"><span class="comments__author-name">محمد نیکو نیکو نیکو</span></h5>
                                                <span class="comments_date"> 523 روز پیش </span>
                                            </div>
                                        </div>
                                        <a href="#comments" class="btn btn--blue btn--shadow-blue btn--comments-reply">ارسال پاسخ</a>
                                    </div>
                                </div>
                                <p class="comments__body">
                                    لورم ایپسوم
                                    متـــــــــــــــــــــــــــــــــــــــــــــــــــن
                                    ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                    که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع
                                    با هدف بهبود ابزارهای کاربردی می باشد.

                                </p>
                            </div>
                            <div class="comments__subset">
                                <div id="comment-5">
                                    <div class="comments__box">
                                        <div class="comments__inner">
                                            <div class="comments__header">
                                                <div class="comments__row">
                                                    <div class="d-flex flex-grow-1">
                                                        <div class="comments__avatar">
                                                            <img src="img/profile.jpg" class="comments__img">
                                                        </div>
                                                        <div class="comments__details">
                                                            <h5 class="comments__author"><span class="comments__author-name">محمد نیکو نیکو نیکو</span></h5>
                                                            <span class="comments_date"> 523 روز پیش </span>
                                                        </div>
                                                    </div>
                                                    <a href="#comments" class="btn btn--blue btn--shadow-blue btn--comments-reply">ارسال پاسخ</a>
                                                </div>
                                            </div>
                                            <p class="comments__body">
                                                لورم ایپسوم
                                                متـــــــــــــــــــــــــــــــــــــــــــــــــــن
                                                ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                                گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع
                                                با هدف بهبود ابزارهای کاربردی می باشد.

                                            </p>
                                        </div>
                                        <div class="comments__subset">
                                            <div id="comment-6">
                                                <div class="comments__box">
                                                    <div class="comments__inner">
                                                        <div class="comments__header">
                                                            <div class="comments__row">
                                                                <div class="d-flex flex-grow-1">
                                                                    <div class="comments__avatar">
                                                                        <img src="img/profile.jpg" class="comments__img">
                                                                    </div>
                                                                    <div class="comments__details">
                                                                        <h5 class="comments__author"><span class="comments__author-name">محمد نیکو نیکو نیکو</span></h5>
                                                                        <span class="comments_date"> 523 روز پیش </span>
                                                                    </div>
                                                                </div>
                                                                <a href="#comments" class="btn btn--blue btn--shadow-blue btn--comments-reply">ارسال پاسخ</a>
                                                            </div>
                                                        </div>
                                                        <p class="comments__body">
                                                            لورم ایپسوم
                                                            متـــــــــــــــــــــــــــــــــــــــــــــــــــن
                                                            ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                                            گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                            که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع
                                                            با هدف بهبود ابزارهای کاربردی می باشد.

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </main>
    <x-slot name="scripts">
        <script>
                 function setReplyValue(id){
                document.getElementById('reply-input').value = id;
          }
         
            $('.single-page__like').on('click',function(){
                fetch('{{route("like.post",$post->slug)}}',{
                    method:'post',
                    header:{
                        'X-CSRF-Token':'{{csrf_token()}}'
                    }
                }).then((response)=>{
                    if(responce.ok){
                        $(this).toggleClass('single-page__like--is-active');

                    }

                })
            })
        
        </script>
       
    </x-slot>
</x-app-layout>