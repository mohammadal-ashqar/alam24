@extends('admin.admin_master')
@section('title', 'اضافة المكان')
@section('content')
    <x-page.title :route="route('admin.posterAdress.index')" title="الاماكن" title_2="اضافة مكان" />
    <form action="{{ route('admin.posterAdress.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-form.card card_lable="اضافة مكان ">


            <x-form.input name="name" lable="العنوان " />

            <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="اضافة مكان" />
                    <x-form.a :route="route('admin.posterAdress.index')" title="عودة الى الوراء" />
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
