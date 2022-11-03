@extends('admin.admin_master')
@section('title', 'اضافة الاعلان')
@section('content')
    <x-page.title :route="route('admin.poster.index')" title="الاعلانات" title_2="اضافة اعلان" />
    <form action="{{ route('admin.poster.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-form.card card_lable="اضافة اعلان ">

            <x-form.input name="image" lable="صورة" type="file" />
            <x-form.input name="name" lable="نبذة مختصرة" />
            <x-form.select name="poster_adress_id" lable="القسم">
                <select name="poster_adress_id" class="form-select ">
                    <option>اختر القسم </option>
                    @foreach ($poster_adress as $i)
                        <option  value="{{ $i->id }}" @selected(old('poster_adress_id') == $i->id)>{{ $i->name }}</option>
                    @endforeach
                </select>
            </x-form.select>
            <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="اضافة اعلان" />
                    <x-form.a :route="route('admin.poster.index')" title="عودة الى الوراء" />
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
