@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.lesson.title_singular') }}:
                    {{ trans('cruds.lesson.fields.id') }}
                    {{ $lesson->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.id') }}
                            </th>
                            <td>
                                {{ $lesson->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.title') }}
                            </th>
                            <td>
                                {{ $lesson->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.day') }}
                            </th>
                            <td>
                                {{ $lesson->day_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.date_start') }}
                            </th>
                            <td>
                                {{ $lesson->date_start }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.hour') }}
                            </th>
                            <td>
                                {{ $lesson->hour }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.student') }}
                            </th>
                            <td>
                                @foreach($lesson->student as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->lastname }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('lesson_edit')
                    <a href="{{ route('admin.lessons.edit', $lesson) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.lessons.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection