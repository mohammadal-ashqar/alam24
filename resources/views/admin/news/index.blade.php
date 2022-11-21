@extends('admin.admin_master')
@section('title', 'قائمة الاخبار')
@section('content')
 <x-page.title :route="route('admin.news.index')" title="الاخبار" title_2="قائمة الاخبار" />
      <x-page.table  name='news' >
        <x-slot name="cardtitle">
            خبر
        </x-slot>
        <x-slot name="th">
          <th>#</th>
          <th>صورة</th>
          <th>الكاتب</th>
          <th class="w-50">العنوان</th>
          <th>القسم</th>
          <th>الحالة</th>
          <th> تاريخ اخر تعديل</th>
          <th >العمليات</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($news as $i)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><x-page.td-image :image="$i->image"/></td>

                <td>{{ $i->authar }}</td>
                <td>{{  Str::limit($i->title ,50, '...')}}</td>
                <td>{{ $i->category->name }}</td>
                <form action="{{ route('admin.news_push',$i->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <td>@if ($i->status == 'publish')
                        <button class="btn btn-success btn-sm w-100">  ارشفة الخبر   <span class="fe fe-download"></span>
                        </button>
                    @endif
                @if ($i->status != 'publish')
                <button class="btn btn-warning btn-sm w-100"> نشر الخبر    <span class="fe fe-upload"></span></button>
                @endif
                </td>
                </form>
                <td>{{ $i->created_at->format('y-m-d/h:m') }}</td>
                <td><x-page.td-actions :id="$i->id" name="news"/>
                <a class="btn  btn-sm btn-success" href="{{ route('admin.news.show', $i->id) }}"><span class="fe fe-eye"></span></a>
                </td>
              </tr>
            @endforeach
            {{-- @foreach ($news22->files as $item)
            <img alt="avatar" class="rounded-circle avatar-md me-2"
            src="{{ asset('storage/'.$item) }}">

            @endforeach --}}
        </x-slot>
      </x-page.table>
@endsection
@section('scripts')
<x-form.delete name="news"/>
@endsection

