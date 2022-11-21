@extends('admin.admin_master')
@section('title', 'اضافة خبر عاجل')
@section('content')
    <x-page.title :route="route('admin.fastNews.index')" title="الاخبار " title_2="اضافة خبر عاجل" />
    <form action="{{ route('admin.fastNews.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-form.card card_lable="اضافة خبر عاجل ">


            <x-form.input name="news" lable="الخبر " />

            <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="اضافة خبر عاجل" />
                    <x-form.a :route="route('admin.fastNews.index')" title="عودة الى الوراء" />
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
