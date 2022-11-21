@extends('admin.admin_master')
@section('title', 'اضافة بث مباشر ')
@section('content')
    <x-page.title :route="route('admin.live.index')" title="البث المباشر " title_2="اضافة بث مباشر " />
    <form action="{{ route('admin.live.store') }}" method="POST">
        @csrf
        <x-form.card card_lable="اضافة بث مباشر  ">


            <x-form.input name="live" lable=" رابط البث المباشر " />

            <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="اضافة بث مباشر " />
                    <x-form.a :route="route('admin.live.index')" title="عودة الى الوراء" />
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
