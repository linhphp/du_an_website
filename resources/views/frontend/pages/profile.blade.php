@extends('frontend.layout.master')
@section('title','profile')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <form action="{{ route('user.upAvatar') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <img src="storage/image/{{ $user->avatar }}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="@lang('language.change')" />
                                        <input type="file" style="display: none;" id="profilePicture" name="avatar" />
                                    </div>
                                </form>
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{ $user->name }}</a></h2>
                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="@lang('language.discard_changes')" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">@lang('language.basic_info') </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">@lang('language.edit')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#changePassword" role="tab" aria-controls="connectedServices" aria-selected="false">@lang('language.change_password')</a>
                                </li>
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Email</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Birth Date</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ $user->birth_date }}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">gender</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            @if ($user->gender == 'mr')
                                            @lang('language.male')
                                            @elseif ($user->gender == 'ms')
                                            @lang('language.female')
                                            @else
                                            @lang('language.undefined')
                                            @endif
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">link Facebook</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{ $user->link_facebook }}
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                                <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    <form action="{{ route('user.update') }}" method="post">
                                        <div class="row">
                                            @csrf
                                            <div class="col-lg-6">
                                                <div class="checkout__input">
                                                    <p>@lang('language.full_name') <span>*</span></p>
                                                    <input type="text" name="name" placeholder="{{ $user->name }}">
                                                </div>
                                                <div class="checkout__input">
                                                    <p>Birth Date<span>*</span></p>
                                                    <input type="date" name="birth_date" value="{{ $user->bith_date }}">
                                                </div>
                                                <div class="checkout__input">
                                                    <p>gender <span>*</span></p>
                                                    <select class="form-control w-100" name="gender">
                                                        <option value="mr">@lang('language.male')  </option>
                                                        <option value="ms">@lang('language.female') </option>
                                                    </select>
                                                </div>
                                                <div class="checkout__input">
                                                    <p>Link facebook <span>*</span></p>
                                                    <input type="text" name="link_facebook" placeholder="{{ $user->link_facebook }}">
                                                </div>
                                                <button type="submit" class="site-btn">@lang('language.update') </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="changePassword" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form action="" method="post">
                                                @csrf
                                                <div class="checkout__input">
                                                    <p>@lang('language.password') <span>*</span></p>
                                                    <input type="password" name="password" placeholder="@lang('language.enter_password') ">
                                                </div>
                                                <div class="checkout__input">
                                                    <p>@lang('language.password_new') <span>*</span></p>
                                                    <input type="password" name="password" placeholder="">
                                                </div>
                                                <div class="checkout__input">
                                                    <p>@lang('language.re_password') <span>*</span></p>
                                                    <input type="password" name="repass" placeholder="@lang('language.enter_re_password')">
                                                </div>
                                                <button type="submit" class="site-btn">@lang('language.update') </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection