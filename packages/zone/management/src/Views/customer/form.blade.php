@extends('management::layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                    <h5 class="title">{{ isset($customerItem) && $customerItem->customer_id ? _('Edit Customer') : _('Add Customer') }}</h5>
            </div>
            <form method="post" action="{{ isset($customerItem) ? route('management.customer.update', ['id' => $customerItem->customer_id]) : route('management.customer.insert') }}" autocomplete="off">
                <div class="card-body">
                        @csrf
                        @if(isset($customerItem) && $customerItem->customer_id)
                            @method('put')
                        @endif

                        @include('management::alerts.success')
                        <div class="form-group">
                        <label>{{ _('Customer Name') }}</label>
                        <input type="text" class="form-control" name="customer_name" value="{{ isset($customerItem->customer_name) ? $customerItem->customer_name : '' }}" required="true"/>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>{{ _('Phone') }}</label>
                                <input class="form-control" type="text" name="customer_phone" value="{{ isset($customerItem->customer_phone) ? $customerItem->customer_phone : '' }}" required="true"/>
                            </div>
                            <div class="col-lg-6">
                                <label>{{ _('Email Address') }}</label>
                                <input class="form-control" type="email" name="customer_email" value="{{!empty($customerItem->customer_email) ? $customerItem->customer_email : '' }}" required="true"/>
                            </div>
                        </div>
                        
                        @if(!isset($customerItem->customer_id))
                        <div class="row">
                            <div class="col-lg-6">
                                <label>{{ _('Password') }}</label>
                                <input class="form-control" type="password" name="customer_password" value="" required="true"/>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>{{ _('Address') }}</label>
                            <input class="form-control" type="text" name="customer_address" value="{{!empty($customerItem->customer_address) ? $customerItem->customer_address : '' }}" />
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>{{ _('City') }}</label>
                                <select name="customer_city" class="form-control">
                                    <option value="1">Ho Chi Minh</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>{{ _('District') }}</label>
                                <select name="customer_district" class="form-control">
                                    <option value="1">Q.1</option>
                                    <option value="2">Q.2</option>
                                    <option value="3">Q.3</option>
                                    <option value="4">Q.4</option>
                                    <option value="5">Q.5</option>
                                    <option value="6">Q.6</option>
                                    <option value="7">Q.7</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ _('Status') }}</label>
                            <select class="form-control" name="customer_status">
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    <a href="{{ route('management.customer.list') }}" class="btn btn-default btn-fill">
                    Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection