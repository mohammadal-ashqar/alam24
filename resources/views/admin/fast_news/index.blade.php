@extends('admin.admin_master')
@section('title', 'قائمة الاخبار العاجلة ')
@section('content')
 <x-page.title :route="route('admin.fastNews.index')" title="الاخبار " title_2="قائمة  الاخبار العاجلة " />
      <x-page.table  name='fastNews' >
        <x-slot name="cardtitle">
            خبر سريع
        </x-slot>
        <x-slot name="th">
          <th>#</th>
          <th>الخبر</th>
          <th> تاريخ اخر تعديل</th>
          <th >العمليات</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($fastNews as $i)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ Str::limit($i->news ,100, '...')}}</td>

                <td>{{ $i->created_at->format('y-m-d/h:m') }}</td>
                <td><x-page.td-actions :id="$i->id" name="fastNews"/>
                </td>
              </tr>
            @endforeach

        </x-slot>
      </x-page.table>
@endsection
@section('scripts')
<x-form.delete name="fastNews"/>
@endsection

