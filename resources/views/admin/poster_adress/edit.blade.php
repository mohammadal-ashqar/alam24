@extends('admin.admin_master')
@section('title', 'تعديل المكان ')
@section('content')
    <x-page.title :route="route('admin.posterAdress.index')" title="الاماكن" title_2="تعديل المكان" />
    <form action="{{ route('admin.posterAdress.update', $poster_adress->id) }}" method="POSt" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-form.card card_lable="تعديل المكان">
            <x-form.input name="name" lable="اسم المكان" :value="$poster_adress->name"/>
          <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="تعديل المكان"></x-form.button>
                    <x-form.a :route="route('admin.posterAdress.index')" title="عودة الى الوراء"></x-form.a>
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
