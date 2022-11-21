@extends('admin.admin_master')
@section('title', 'قائمة الصور  ')
@section('content')
 <x-page.title :route="route('admin.image.index')" title="الصور" title_2="قائمة  الصور " />
      <x-page.table  name='image' >
        <x-slot name="cardtitle">
            صور
        </x-slot>
        <x-slot name="th">
          <th>#</th>
          <th>الصورة</th>
          <th>الوصف</th>
          <th> تاريخ اخر تعديل</th>
          <th >العمليات</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($image as $i)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><x-page.td-image :image="$i->image"/></td>
                <td>{{ $i->description }}</td>
                <td>{{ $i->created_at->format('y-m-d/h:m') }}</td>
                <td><x-page.td-actions :id="$i->id" name="image"/>
                </td>
              </tr>
            @endforeach

        </x-slot>
      </x-page.table>
@endsection
@section('scripts')
<x-form.delete name="image"/>
@endsection

