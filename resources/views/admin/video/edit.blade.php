@extends('admin.admin_master')
@section('title', 'تعديل الفيديو ')
@section('content')
    <x-page.title :route="route('admin.video.index')" title="الفيديوهات" title_2="تعديل الفيديو" />
    <form action="{{ route('admin.video.update', $video->id) }}" method="POSt">
        @csrf
        @method('PUT')
        <x-form.card card_lable="تعديل الفيديو">

                <x-form.input name="video" lable="رابط الفيديو " :value="$video->video" />
                <x-form.input name="description" lable="الوصف" :value="$video->description" />
                <x-form.select name="position" lable="القسم">
                    <select name="position" class="form-select ">
                        <option>اختر القسم </option>
                            <option  value="main" @selected($video->position == 'main')>الصفحة الرئيسية</option>
                            <option  value="most" @selected($video->position == 'most')> الاكثر اهمية </option>
                            <option  value="less" @selected($video->position == 'less')> الاقل اهمية</option>
                    </select>
                </x-form.select>

          <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="تعديل الفيديو"></x-form.button>
                    <x-form.a :route="route('admin.video.index')" title="عودة الى الوراء"></x-form.a>
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
