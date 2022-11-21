@extends('admin.admin_master')
@section('title', ' تعديل الاخبار العاجلة  ')
@section('content')
    <x-page.title :route="route('admin.fastNews.index')" title="الاخبار" title_2="تعديل الخبر " />
    <form action="{{ route('admin.fastNews.update', $fast_news->id) }}" method="POSt" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-form.card card_lable="تعديل الخبر">
            <x-form.input name="news" lable="الخبر" :value="$fast_news->news"/>
          <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="تعديل الخبر"></x-form.button>
                    <x-form.a :route="route('admin.fastNews.index')" title="عودة الى الوراء"></x-form.a>
                </x-form.card-footer>
            </x-slot>
        </x-form.card>
    </form>
@stop
