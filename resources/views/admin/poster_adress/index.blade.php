@extends('admin.admin_master')
@section('title', 'قائمة اماكن الاعلانات ')
@section('content')
 <x-page.title :route="route('admin.posterAdress.index')" title="الاعلانات" title_2="قائمة اماكن الاعلانات " />
      <x-page.table  name='posterAdress' >
        <x-slot name="cardtitle">
            مكان
        </x-slot>
        <x-slot name="th">
          <th>#</th>
          <th>المكان</th>
          <th> تاريخ اخر تعديل</th>
          <th >العمليات</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($poster_adress as $i)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $i->name }}</td>

                <td>{{ $i->created_at->format('y-m-d/h:m') }}</td>
                <td><x-page.td-actions :id="$i->id" name="posterAdress"/>
                </td>
              </tr>
            @endforeach

        </x-slot>
      </x-page.table>
@endsection
@section('scripts')
<x-form.delete name="posterAdress"/>
@endsection

