<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<div class="sticky">
    <aside class="app-sidebar sidebar-scroll">
        <div class="main-sidebar-header active">
            <a class="desktop-logo logo-light active" href="{{ URL('/') }}">

                <x-application-logo   class="main-logo" alt="logo"/></a>
            <a class="desktop-logo logo-dark active" href="{{ URL('/') }}">
                <x-application-logo   class="main-logo" alt="logo"/></a>
            <a class="logo-icon mobile-logo icon-light active" href="{{ URL('/') }}">
                <x-application-logo   class="logo" alt="logo"/>
            <a class="logo-icon mobile-logo icon-dark active" href="{{ URL('/') }}">
                <x-application-logo   class="logo" alt="logo"/></a>
        </div>
        <div class="main-sidemenu">
       <x-admin.auth-data/>

            <ul class="side-menu">
                <li class="side-item side-item-category">لوحة التحكم</li>
                <x-admin.single-side name="Home" lable="الرئيسية" :route="route('admin.index')" icon="fe fe-home" />

                <li class="side-item side-item-category">إدارة المحتوى</li>
                <x-admin.side-bar name="news" lable="الأخبار" :home="route('admin.news.index')" :create="route('admin.news.create')" icon="fe fe-file"/>
                <x-admin.side-bar name="categories" lable="الاقسام" :home="route('admin.categories.index')" :create="route('admin.categories.create')" icon="fe fe-tag"/>
                <x-admin.side-bar name="posterAdress" lable="الاماكن" :home="route('admin.posterAdress.index')" :create="route('admin.posterAdress.create')" icon="fe fe-map-pin"/>
                <x-admin.side-bar name="poster" lable="الاعلانات" :home="route('admin.poster.index')" :create="route('admin.poster.create')" icon="fe fe-image"/>
                <x-admin.side-bar name="fastNews" lable="الاخبار العاجلة" :home="route('admin.fastNews.index')" :create="route('admin.fastNews.create')" icon="fe fe-globe"/>
                <x-admin.side-bar name="video" lable="الفيديوهات" :home="route('admin.video.index')" :create="route('admin.video.create')" icon="fe fe-video"/>
                <x-admin.side-bar name="image" lable=" الصور" :home="route('admin.image.index')" :create="route('admin.image.create')" icon="fe fe-image"/>
                <x-admin.side-bar name="live" lable="البث المباشر" :home="route('admin.live.index')" :create="route('admin.live.create')" icon="fe fe-share"/>


            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>
