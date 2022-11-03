@extends('admin.admin_master')
@section('title', 'تعديل العميل ')
@section('content')
    <x-page.title :route="route('admin.categories.index')" title="المنتجات" title_2="تعديل العميل" />
    <form action="{{ route('admin.categories.update', $categories->id) }}" method="POSt" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-form.card card_lable="تعديل العميل">
            <x-form.input name="name" lable="اسم القسم" :value="$categories->name"/>


            <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="تعديل العميل"></x-form.button>
                    <x-form.a :route="route('admin.categories.index')" title="عودة الى الوراء"></x-form.a>
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
