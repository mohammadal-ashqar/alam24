@extends('admin.admin_master')
@section('title', 'قائمة الاقسام')
@section('content')
 <x-page.title :route="route('admin.categories.index')" title="العملاء" title_2="قائمة العملاء" />
      <x-page.table  name='categories'>
        <x-slot name="cardtitle">
            قسم
        </x-slot>
        <x-slot name="th">
          <th>#</th>
          <th>الاسم</th>
          <th> تاريخ اخر تعديل</th>
          <th>العمليات</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($categories as $i)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $i->name }}</td>
                <td>{{ $i->created_at }}</td>
                <td><x-page.td-actions :id="$i->id" name="categories"/></td>
              </tr>
            @endforeach
        </x-slot>
      </x-page.table>
@endsection
@section('scripts')
<x-form.delete name="categories"/>
@endsection

