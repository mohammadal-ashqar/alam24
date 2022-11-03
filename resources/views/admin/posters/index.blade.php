@extends('admin.admin_master')
@section('title', 'قائمة الاعلانات')
@section('content')
 <x-page.title :route="route('admin.poster.index')" title="الاعلانات" title_2="قائمة الاعلانات" />
      <x-page.table  name='poster' >
        <x-slot name="cardtitle">
            اعلان
        </x-slot>
        <x-slot name="th">
          <th>#</th>
          <th>صورة</th>
          <th>نبذة مختصرة</th>
          <th>المكان</th>
          <th> تاريخ اخر تعديل</th>
          <th >العمليات</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($posters as $i)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><x-page.td-image :image="$i->image"/></td>

                <td>{{ $i->name }}</td>
                <td>{{ $i->poster_adress->name }}</td>
                <td>{{ $i->created_at->format('y-m-d/h:m') }}</td>
                <td><x-page.td-actions :id="$i->id" name="poster"/>
                </td>
              </tr>
            @endforeach

        </x-slot>
      </x-page.table>
@endsection
@section('scripts')
<x-form.delete name="poster"/>
@endsection

