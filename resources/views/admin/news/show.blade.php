@extends('admin.admin_master')
@section('title', 'عرض الخبر')
@section('content')
    <x-page.title :route="route('admin.news.index')" title="الاخبار" title_2="عرض الخبر" />



    <!-- row -->
    <div class="row">
        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12">
            <div class="card overflow-hidden">
                <div class="item7-card-img px-4 pt-4">
                    <a href="javascript:void(0);"></a>
                    <img src="{{asset('storage/'.$news->image)}}" alt="img" class="cover-image rounded-7 w-100">
                </div>
                <div class="card-body">
                    <a href="javascript:void(0);" class="mt-4">
                        <h5 class="font-weight-semibold text-dark">{{$news->title}}.</h5>
                    </a>

                    {!! $news->content !!}
                </div>
                <div class="card-footer pb-2 pt-2">
                    <div class="item7-card-desc d-md-flex">
                        <div class="d-flex align-items-center mt-0">
                            <img src="{{asset('cms/assets/img/faces/2.jpg')}}" class="avatar brround avatar-md me-3" alt="avatar-img">
                            <div>
                                <a href="profile.html" class="text-dark font-weight-bold">{{ $news->authar }}</a>
                                <small class="d-block text-muted">{{ $news->updated_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        <div class="ms-auto mb-2 d-flex mt-3">
                            <a href="javascript:void(0);" class="me-3 mb-2 d-flex"><span
                                    class="fe fe-calendar text-muted me-2 tx-17"></span>
                                <div class="mt-0 mt-0 text-dark">{{ $news->updated_at->format('Y-M-d') }}</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12">



            <div class="card custom-card overflow-hidden">
                <div class="card-header border-bottom">
                    <h3 class="card-title mb-1">Categories</h3>
                </div>
                <div class="card-body">
                    <div>
                        <div class="tags">
                            <a href="javascript:void(0);" class="tag">{{ $news->category->name }}</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card overflow-hidden">
                <div class="card-header border-bottom">
                    <h3 class="card-title mb-1">Gallery</h3>
                </div>
                <div class="card-body">
                    <div class="text-center demo-gallery">
                        <div class="mt-2">
                            <div class="masonry row">

                                @forelse ($news->files as $file)
                                <div class="col-xl-4 col-lg-4 col-sm-6">
                                    <div class="brick">
                                        <a href="{{asset('storage/'.$file)}}" class="js-img-viewer"
                                            data-caption="IMAGE-01" data-id="lion">
                                            <img src="{{asset('storage/'.$file)}}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                @empty
                                <div class="col-xl-4 col-lg-4 col-sm-6">
                                    <div class="brick">
                                        <a href="{{asset('cms/assets/img/photos/1.jpg')}}" class="js-img-viewer"
                                            data-caption="IMAGE-01" data-id="lion">
                                            <img src="{{asset('cms/assets/img/photos/1.jpg')}}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--End Row-->

@endsection
