@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.subscription.title_singular') }}:
                    {{ trans('cruds.subscription.fields.id') }}
                    {{ $subscription->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.subscription.fields.id') }}
                            </th>
                            <td>
                                {{ $subscription->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subscription.fields.title') }}
                            </th>
                            <td>
                                {{ $subscription->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subscription.fields.number') }}
                            </th>
                            <td>
                                {{ $subscription->number }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('subscription_edit')
                    <a href="{{ route('admin.subscriptions.edit', $subscription) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection