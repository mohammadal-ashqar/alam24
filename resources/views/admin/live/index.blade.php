@extends('admin.admin_master')
@section('title', 'قائمة البث المباشر  ')
@section('content')
 <x-page.title :route="route('admin.live.index')" title="البث المباشر " title_2="قائمة  البث المباشر  " />
      <x-page.table  name='live' >
        <x-slot name="cardtitle">
        بث مباشر
        </x-slot>
        <x-slot name="th">
          <th>#</th>
          <th>الرابط</th>
          <th> تاريخ اخر تعديل</th>
          <th >العمليات</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($live as $i)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ Str::limit($i->live ,100, '...')}}</td>

                <td>{{ $i->created_at->format('y-m-d/h:m') }}</td>
                <td><x-page.td-actions :id="$i->id" name="live"/>
                </td>
              </tr>
            @endforeach

        </x-slot>
      </x-page.table>
@endsection
@section('scripts')
<x-form.delete name="live"/>
@endsection

