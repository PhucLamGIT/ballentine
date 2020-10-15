@extends('management::layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                    <h5 class="title">{{ isset($roleItem) && $roleItem->id ? _('Edit Role') : _('Add Role') }}</h5>
            </div>
            <form method="post" action="{{ isset($roleItem) ? route('management.role.update', ['id' => $roleItem->id]) : route('management.role.insert') }}" autocomplete="off">
                <div class="card-body">
                        @csrf
                        @if(isset($roleItem) && $roleItem->id)
                            @method('put')
                        @endif

                        @include('management::alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Role Name') }}</label>
                            <input type="text" name="role_name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}" value="{{isset($roleItem->name) ? $roleItem->name : ''}}">
                            {{--@include('alerts.feedback', ['field' => 'name'])--}}
                        </div>
                        <div class="form-group">
                            <label>{{ _('Status') }}</label>
                            <select class="form-control" name="role_status">
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    <a href="{{ route('management.role.list') }}" class="btn btn-default btn-fill">
                    Back
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- Show Permission in Role -->
    <div class="col-lg-6 col-md-12">
        <div class="card card-tasks">
            <div class="card-header">
                    <h5 class="title">{{ _('Permission in Role') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-full-width table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="max-width:5px">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="title">Create User</p>
                                </td>
                                <td class="td-actions text-right">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="max-width:5px">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="title">Edit User</p>
                                </td>
                                <td class="td-actions text-right">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection