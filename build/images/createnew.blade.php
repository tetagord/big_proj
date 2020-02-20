@extends('layouts.app')

@section('content')
 
<form enctype="multipart/form-data" id="header-upload_form" role="form" method="POST" action="">
    <input type="file" name="header" class="d-none" id="topimage-input">

    @if (Auth::user()->header)
    <div class="cv-fon" style="overflow: hidden; background-image: url('{{ Auth::user()->header }}');background-size: cover; background-position: center center; cursor: pointer"
         onclick="$('#topimage-input').trigger('click');"></div>
    @else
    <div class="cv-fon" style="overflow: hidden; background-image: url('/images/cover.svg');background-size: cover; background-position: center center; cursor: pointer"
         onclick="$('#topimage-input').trigger('click');"></div>
    @endif

    <input type="hidden" name="_token" value="{{ csrf_token()}}">
</form> 

<div class="container">
    <div class="row">
        <div class="resume-upload_avatar "> 
                <form enctype="multipart/form-data" id="upload_form" role="form" method="POST" action="/add-avatar" style='max-width: 200px;'>
                    <input type="file" name="photo" class="d-none" id="avatar-input">
                    @if (Auth::user()->photo)
                    <img class="cv-avatar" src="{{ asset(Auth::user()->photo) }}" alt="" style="background: #fff; cursor: pointer;"
                        onclick="$('#avatar-input').trigger('click');">
                    @else
                    <img class="cv-avatar" src="/images/ava.svg" alt="" style="background: #fff; cursor: pointer;" onclick="$('#avatar-input').trigger('click');">
                    @endif


                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                </form> 
        </div>
    </div>
</div>

<div class="container">
    <div class="bd-example bd-example-tabs">
        <nav class="nav nav-tabs flex <?= $user->birth_date ? '' : 'd-none' ?>" id="nav-tab" role="tablist">
            <a class="btn active" href="#step-1" data-toggle="tab"><?= __('fields.labels.step') ?> 1</a>
            <a class="btn" href="#step-2" data-toggle="tab"><?= __('fields.labels.step') ?> 2</a>
            <a class="btn" href="#step-3" data-toggle="tab"><?= __('fields.labels.step') ?> 3</a>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane active" id="step-1">
                @include('resume.steps.step1')
            </div>
            <div class="tab-pane" id="step-2">
                @include('resume.steps.step2')
            </div> <!-- END OF TAB 2-->
            <div class="tab-pane" id="step-3">
                 @include('resume.steps.step3')
            </div> 
            <!-- END step3-->
        </div>
    </div>
</div>

<div class="popup-result-request pupup flex flex-column popup-main popup-hide">
    <p class="popup--title"></p>
    <div class="popup-content">

    </div>
    <p><a href="#" class="close-popup btn btn--cv">Ok</a></p>
</div>
<style>
    .tab-pane form{
        margin-bottom: 30px;
    }
</style>
<div class="btn save-resume">Сохранить текущий шаг</div>
<div class="preloader"><div class="loader"></div></div>
@endsection