@extends('admin.admin_master')
@section('title', 'اضافة صور')
@section('content')
    <x-page.title :route="route('admin.image.index')" title="الصور" title_2="اضافة صور" />
    <form action="{{ route('admin.image.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <x-form.card card_lable="اضافة صور ">
            <x-form.input name="image" lable=" الصورة " type="file"/>
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
                    <x-form.button title="اضافة صور" />
                    <x-form.a :route="route('admin.image.index')" title="عودة الى الوراء" />
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
