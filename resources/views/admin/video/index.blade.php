@extends('admin.admin_master')
@section('title', 'قائمة الفيديوهات  ')
@section('content')
 <x-page.title :route="route('admin.video.index')" title="الفيديوهات" title_2="قائمة  الفيديوهات " />
      <x-page.table  name='video' >
        <x-slot name="cardtitle">
            فيديو
        </x-slot>
        <x-slot name="th">
          <th>#</th>
          <th>الوصف</th>
          <th> تاريخ اخر تعديل</th>
          <th >العمليات</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($video as $i)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $i->description }}</td>
                <td>{{ $i->created_at->format('y-m-d/h:m') }}</td>
                <td><x-page.td-actions :id="$i->id" name="video"/>
                </td>
              </tr>
            @endforeach

        </x-slot>
      </x-page.table>
@endsection
@section('scripts')
<x-form.delete name="video"/>
@endsection

