@extends('admin.admin_master')
@section('title', ' Dashbord')
@section('content')

    <x-page.title :route="route('admin.index')" title="لوحة التحكم" title_2="الرئيسية " />

    <!-- row -->
    <div class="row">
        <div class="col-lg-4 col-xl-3">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">إدارة المحتوى</div>
                </div>
                <div class="main-content-left main-content-left-mail card-body pt-0 ">
                    <div class="main-settings-menu">
                        <nav class="nav main-nav-column">

                            <a class="nav-link thumb active mb-2" href="{{ route('admin.index') }}"><i class="fe fe-home"></i>
                                الرئيسية </a>

                            <a class="nav-link border-top-0 thumb mb-2" href="{{ route('admin.news.index') }}"><i
                                    class="fe fe-file"></i> الأخبار </a>
                            <a class="nav-link border-top-0 thumb mb-2" href="{{ route('admin.categories.index') }}"><i
                                    class="fe fe-tag"></i> الاقسام</a>
                            <a class="nav-link border-top-0 thumb mb-2" href="{{ route('admin.posterAdress.index') }}"><i
                                    class="fe fe-map-pin"></i> اماكن الاعلانات</a>
                            <a class="nav-link border-top-0 thumb mb-2" href="{{ route('admin.poster.index') }}"><i
                                    class="fe fe-image"></i> الاعلانات</a>
                            <a class="nav-link border-top-0 thumb mb-2" href="{{ route('admin.fastNews.index') }}"><i
                                    class="fe fe-globe"></i> الاخبار العاجلة</a>
                            <a class="nav-link border-top-0 thumb mb-2" href="{{ route('admin.categories.index') }}"><i
                                    class="fe fe-lock"></i> الصلاحيات</a>
                            <a class="nav-link border-top-0 thumb mb-2" href="{{ route('admin.categories.index') }}"><i
                                    class="fe fe-users"></i> المستخدمين</a>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-9">
            <div class="card custom-card">
                <div class="card-header">
                    {{-- <div class="card-title"> اضافة خبر عاجل</div> --}}
                    {{-- <p> استخدم لوحة التحكم المميزة هذه لادارة محتوى موقعك المميز.</p> --}}
                    <form action="{{ route('admin.fastNews.store') }}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="news" class="form-control" placeholder=" خبر عاجل">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">اضافة</button>
                        </div>

                    {{-- <form action="{{ route('admin.live.store') }}" method="post" class="d-inline">
                        @csrf --}}
                        <div class="col-md-4">
                            <input type="url" name="live" class="form-control" placeholder=" رابط بث مباشر ">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">اضافة</button>
                        </div>
                    {{-- </form> --}}
                    </div>
                </form>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <div class="settings-main-icon me-4 mt-1"><i class="fe fe-file"></i></div>
                                        <div>
                                            <p class="tx-20 font-weight-semibold d-flex mb-0">الأخبار</p>
                                            <p class="tx-13 text-muted mb-0">لقد قمت بنشر {{ $news }}  خبر على موقعك.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            {{-- @endcan
            @can('team-list') --}}
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <div class="settings-main-icon me-4 mt-1"><i class="fe fe-image"></i></div>
                                        <div>
                                            <p class="tx-20 font-weight-semibold d-flex mb-0">الاعلانات</p>
                                            <p class="tx-13 text-muted mb-0">لقد اصبح لديك الان {{ $poster }} اعلانات في موقعك.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            {{-- @endcan
            @can('proudacts-list') --}}
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <div class="settings-main-icon me-4 mt-1"><i class="fe fe-globe"></i></div>
                                        <div>
                                            <p class="tx-20 font-weight-semibold d-flex mb-0">الاخبار العاجلة </p>
                                            <p class="tx-13 text-muted mb-0">لقد اصبح عدد الاخبار العاجلة التي اضفتها في  الموقع
                                                هو {{ $fast_news }}.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            {{-- @endcan
            @can('shipments-list') --}}
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <div class="settings-main-icon me-4 mt-1"><i class="fe fe-tag"></i></div>
                                        <div>
                                            <p class="tx-20 font-weight-semibold d-flex mb-0">الاقسام </p>
                                            <p class="tx-13 text-muted mb-0">لديك في موقعك الان  {{ $categories }}  اقسام
                                                .</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            {{-- @endcan
            @can('polls-list') --}}
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <div class="settings-main-icon me-4 mt-1"><i class="fe fe-map-pin"></i></div>
                                        <div>
                                            <p class="tx-20 font-weight-semibold d-flex mb-0">معرض الاعلانات</p>
                                            <p class="tx-13 text-muted mb-0">  لديك الان في موقعك {{ $poster_adress }} اماكن لتعرض بها اعلانات.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            {{-- @endcan
            @can('users-list') --}}
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <div class="settings-main-icon me-4 mt-1"><i class="fe fe-users"></i></div>
                                        <div>
                                            <p class="tx-20 font-weight-semibold d-flex mb-0">المستخدمون</p>
                                            <p class="tx-13 text-muted mb-0">لقد اصبح لديك في لوحة التحكم
                                                 مستخدمين {{ $news }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            {{-- @endcan --}}
        </div>
    </div>
    </div>
    <!--/ row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

@endsection
