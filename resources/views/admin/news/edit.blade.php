@extends('admin.admin_master')
@section('title', 'تعديل الخبر ')
@section('content')
    <x-page.title :route="route('admin.news.index')" title="الاخبار" title_2="تعديل الخبر" />
    <form action="{{ route('admin.news.update', $news->id) }}" method="POSt" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-form.card card_lable="تعديل الخبر">
            <x-form.input name="title" lable="العنوان" :value="$news->title"/>
            <x-form.input name="authar" lable="الكاتب" :value="$news->authar" />
            <x-form.select name="category_id" lable="القسم" >
                    <select name="category_id" class="form-select ">
                        <option>اختر القسم </option>

                        @foreach ($categories as $i)
                            <option value="{{ $i->id }}" @selected($news->category_id == $i->id)>{{ $i->name }}</option>
                        @endforeach
                    </select>
                </x-form.select>
                <x-form.select name="status" lable="الحالة">
                    <select name="status" class="form-select">
                        <option>اختر القسم </option>
                        <option value="publish" @selected($news->status == 'publish')>نشر الخبر</option>
                        <option value="unpublish" @selected($news->status == 'unpublish')>ارشفة الخبر</option>
                    </select>
                </x-form.select>
                <x-form.input name="image" lable="صورة" type="file"/>
                <x-form.input name="files[]" lable="صور للخبر" type="file" multiple/>
                <x-form.textarea name="content" lable="المحتوى" :value="$news->content" />

            <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="تعديل الخبر"></x-form.button>
                    <x-form.a :route="route('admin.news.index')" title="عودة الى الوراء"></x-form.a>
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
