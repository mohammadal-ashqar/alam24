@extends('admin.admin_master')
@section('title', 'تعديل الصور ')
@section('content')
    <x-page.title :route="route('admin.image.index')" title="الفيدوهات" title_2="تعديل الصور" />
    <form action="{{ route('admin.image.update', $image->id) }}" method="POSt" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-form.card card_lable="تعديل الصور">

                <x-form.input name="image" lable=" الصورة " type="file"/>
                <x-form.input name="description" lable="الوصف" :value="$image->description" />
                <x-form.select name="position" lable="القسم">
                    <select name="position" class="form-select ">
                        <option>اختر القسم </option>
                            <option  value="main" @selected($image->position == 'main')>الصفحة الرئيسية</option>
                            <option  value="most" @selected($image->position == 'most')> الاكثر اهمية </option>
                            <option  value="less" @selected($image->position == 'less')> الاقل اهمية</option>
                    </select>
                </x-form.select>

          <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="تعديل الصور"></x-form.button>
                    <x-form.a :route="route('admin.image.index')" title="عودة الى الوراء"></x-form.a>
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
