@extends('admin.admin_master')
@section('title', 'اضافة الخبر')
@section('content')
    <x-page.title :route="route('admin.news.index')" title="الاخبار" title_2="اضافة خبر" />
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-form.card card_lable="اضافة خبر ">

            <x-form.input name="image" lable="صورة" type="file" />
            <x-form.input name="files[]" lable="صور للخبر" type="file" multiple/>
            <x-form.input name="title" lable="العنوان " />
            <x-form.input name="authar" lable="الكاتب" />
            <x-form.select name="category_id" lable="القسم">
                <select name="category_id" class="form-select ">
                    <option>اختر القسم </option>

                    @foreach ($categories as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                    @endforeach
                </select>
            </x-form.select>
            <x-form.select name="status" lable="الحالة">
                <select name="status" class="form-select">
                    <option>اختر القسم </option>
                    <option value="publish">نشر الخبر</option>
                    <option value="unpublish">ارشفة الخبر</option>
                </select>
            </x-form.select>
            <x-form.textarea name="content" lable="المحتوى" />

            <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="اضافة خبر" />
                    <x-form.a :route="route('admin.news.index')" title="عودة الى الوراء" />
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
