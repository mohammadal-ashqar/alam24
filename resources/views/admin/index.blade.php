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



                        </nav>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-8 col-xl-9">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">نظرة عامة</div>
                    <p> استخدم لوحة التحكم المميزة هذه لادارة محتوى موقعك المميز.</p>
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
                                            <p class="tx-13 text-muted mb-0">لقد قمت بنشر {{ $news }} خبر على موقعك.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endcan
            @can('team-list')
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <div class="settings-main-icon me-4 mt-1"><i class="fe fe-users"></i></div>
                                        <div>
                                            <p class="tx-20 font-weight-semibold d-flex mb-0">الفريق</p>
                                            <p class="tx-13 text-muted mb-0">لقد اصبح لديك الان {{ $team }} عضو في
                                                فريقك .</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endcan
            @can('proudacts-list')
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <div class="settings-main-icon me-4 mt-1"><i class="fe fe-flag"></i></div>
                                        <div>
                                            <p class="tx-20 font-weight-semibold d-flex mb-0">معرض المنتجات</p>
                                            <p class="tx-13 text-muted mb-0">لقد اصبح عدد المنتجات التي اضفتها في معرض الصور
                                                هو{{ $image }}.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endcan
            @can('shipments-list')
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <div class="settings-main-icon me-4 mt-1"><i class="fe fe-truck"></i></div>
                                        <div>
                                            <p class="tx-20 font-weight-semibold d-flex mb-0">تتبع الشحنات</p>
                                            <p class="tx-13 text-muted mb-0">لقد قمت باضافة شحنات جديدة ليصبح العدد الحالي
                                                {{ $shipment }}.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endcan
            @can('polls-list')
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <div class="settings-main-icon me-4 mt-1"><i class="fe fe-layers"></i></div>
                                        <div>
                                            <p class="tx-20 font-weight-semibold d-flex mb-0">التعليقات</p>
                                            <p class="tx-13 text-muted mb-0">يبدوا ان الزبائن راضون عنك هناك
                                                {{ $polls }} تعليق.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endcan
            @can('users-list')
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex">
                                        <div class="settings-main-icon me-4 mt-1"><i class="fe fe-user"></i></div>
                                        <div>
                                            <p class="tx-20 font-weight-semibold d-flex mb-0">المستخدمون</p>
                                            <p class="tx-13 text-muted mb-0">لقد اصبح لديك في لوحة التحكم
                                                {{ $admin }} مستخدمين</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endcan
        </div>
    </div> --}}
</div>
<!--/ row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->

@endsection
