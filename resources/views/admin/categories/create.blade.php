@extends('admin.admin_master')
@section('title', 'اضافة قسم')
@section('content')
    <x-page.title :route="route('admin.categories.index')" title="الاقسام " title_2="اضافة قسم" />
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-form.card card_lable="اضافة قسم " >

            <x-form.input name="name" lable="اسم القسم"/>


            <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="اضافة قسم"/>
                    <x-form.a :route="route('admin.categories.index')" title="عودة الى الوراء"/>
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
