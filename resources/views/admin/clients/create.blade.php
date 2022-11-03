@extends('admin.admin_master')
@section('title', 'اضافة عميل')
@section('content')
    <x-page.title :route="route('admin.clients.index')" title="التعليقات" title_2="اضافة عميل" />
    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-form.card card_lable="اضافة عميل " >

            <x-form.input name="images" lable="صورة" type="file"/>


            <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="اضافة عميل"/>
                    <x-form.a :route="route('admin.clients.index')" title="عودة الى الوراء"/>
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
