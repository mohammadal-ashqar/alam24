@extends('admin.admin_master')
@section('title', 'قائمة العملاء')
@section('content')
 <x-page.title :route="route('admin.clients.index')" title="العملاء" title_2="قائمة العملاء" />
      <x-page.table  name='clients'>
        <x-slot name="cardtitle">
            عميل
        </x-slot>
        <x-slot name="th">
          <th>#</th>
          <th>صورة</th>
          <th> تاريخ اخر تعديل</th>
          <th>العمليات</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($clients as $i)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><x-page.td-image :image="$i->images"/></td>
                <td>{{ $i->created_at }}</td>
                <td><x-page.td-actions :id="$i->id" name="clients"/></td>
              </tr>
            @endforeach
        </x-slot>
      </x-page.table>
@endsection
@section('scripts')
<x-form.delete name="clients"/>
@endsection

