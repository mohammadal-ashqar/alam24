@extends('admin.admin_master')
@section('title', 'اضافة فيديو')
@section('content')
    <x-page.title :route="route('admin.video.index')" title="الفيديوهات" title_2="اضافة فيديو" />
    <form action="{{ route('admin.video.store') }}" method="POST" >
        @csrf
        <x-form.card card_lable="اضافة فيديو ">
            <x-form.input name="video" lable="رابط الفيديو " />
            <x-form.input name="description" lable="الوصف" />
            <x-form.select name="position" lable="القسم">
                <select name="position" class="form-select ">
                    <option>اختر القسم </option>
                        <option  value="main" @selected(old('position'))>الصفحة الرئيسية</option>
                        <option  value="most" @selected(old('position'))> الاكثر اهمية </option>
                        <option  value="less" @selected(old('position'))> الاقل اهمية</option>
                </select>
            </x-form.select>

            <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="اضافة فيديو" />
                    <x-form.a :route="route('admin.video.index')" title="عودة الى الوراء" />
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
