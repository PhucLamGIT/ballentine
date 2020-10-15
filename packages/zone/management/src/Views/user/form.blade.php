@extends('management::layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                    <h5 class="title">{{ isset($userItem) && $userItem->id ? _('Edit User') : _('Add User') }}</h5>
            </div>
            <form method="post" action="{{ isset($userItem) ? route('management.user.update', ['id' => $userItem->id]) : route('management.user.insert') }}" autocomplete="off">
                <div class="card-body">
                        @csrf
                        @if(isset($userItem) && $userItem->id)
                            @method('put')
                        @endif

                        @include('management::alerts.success')
                        <div class="row">
                            <div class="col-lg-6">
                                <label>{{ _('First Name') }}</label>
                                <input class="form-control" type="text" name="fname" value="{{ isset($userItem->name) ? $userItem->name : '' }}" />
                            </div>
                            <div class="col-lg-6">
                                <label>{{ _('Last Name') }}</label>
                                <input class="form-control" type="text" name="lname" value="{{ isset($userItem->name) ? $userItem->name : '' }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ _('Email Address') }}</label>
                            <input class="form-control" type="text" name="email" value="{{!empty($userItem->email) ? $userItem->email : '' }}" />
                        </div>
                        @if(!isset($userItem->id))
                        <div class="row">
                            <div class="col-lg-6">
                                <label>{{ _('Password') }}</label>
                                <input class="form-control" type="password" name="pwd" value="" />
                            </div>
                            <div class="col-lg-6">
                                <label>{{ _('Confirm Password') }}</label>
                                <input class="form-control" type="text" name="confirmpwd" value="" />
                            </div>
                        </div>
                        @endif
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
                    <a href="{{ route('management.user.list') }}" class="btn btn-default btn-fill">
                    Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection