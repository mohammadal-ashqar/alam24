@extends('admin.admin_master')
@section('title', ' تعديل البث   ')
@section('content')
    <x-page.title :route="route('admin.fastNews.index')" title="البث" title_2="تعديل البث " />
    <form action="{{ route('admin.fastNews.update', $live->id) }}" method="POSt" >
        @csrf
        @method('PUT')
        <x-form.card card_lable="تعديل البث">

                <x-form.input name="live" lable=" رابط البث المباشر " :value="$live->live" />

          <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="تعديل البث"></x-form.button>
                    <x-form.a :route="route('admin.fastNews.index')" title="عودة الى الوراء"></x-form.a>
                </x-form.card-footer>
            </x-slot>
        </x-form.card>
    </form>
@stop
