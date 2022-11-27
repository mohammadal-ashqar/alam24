@extends('admin.admin_master')
@section('title', 'تعديل الاعلان ')
@section('content')
    <x-page.title :route="route('admin.poster.index')" title="الاخبار" title_2="تعديل الاعلان" />
    <form action="{{ route('admin.poster.update', $poster->id) }}" method="POSt" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-form.card card_lable="تعديل الاعلان">
            <x-form.input name="images[]" lable="صور" type="file" multiple />
            <x-form.input name="name" lable="العنوان" :value="$poster->name"/>
                <x-form.input name="route" lable="رابط الشركة " :value="$poster->route"/>
            <x-form.select name="poster_adress_id" lable="القسم" >
                    <select name="poster_adress_id" class="form-select ">
                        <option>اختر القسم </option>

                        @foreach ($poster_adress as $i)
                            <option value="{{ $i->id }}" @selected($poster->poster_adress_id == $i->id)>{{ $i->name }}</option>
                        @endforeach
                    </select>
                </x-form.select>
            <x-slot name="footer">
                <x-form.card-footer>
                    <x-form.button title="تعديل الاعلان"></x-form.button>
                    <x-form.a :route="route('admin.poster.index')" title="عودة الى الوراء"></x-form.a>
                </x-form.card-footer>
            </x-slot>

        </x-form.card>
    </form>
@stop
