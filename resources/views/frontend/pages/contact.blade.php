@extends('frontend.layout.master')
@section('title')
@lang('language.contact')
@endsection
@section('content')

<section id="content" role="main">
            <div class="breadcrumb-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="breadcrumb">
                                <li><a href="index-2.html" title="@lang('language.home') ">@lang('language.home') </a></li>
                                <li class="active">@lang('language.contact') </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 padding-right-larger">
                        <div id="map">
                        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.9029951827365!2d108.14162781439492!3d16.070522843672983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142192aa690fa83%3A0xf9949c4f3a3b4878!2zMTUxIMOCdSBDxqEsIEhvw6AgS2jDoW5oIELhuq9jLCBMacOqbiBDaGnhu4N1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1606357794618!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                    <div class="col-sm-5 contact-container">
                        <h2>@lang('language.write_your_review') </h2>
                        <form name="contactme" action="{{ route('sendEmail') }}" id="contact-form" method="post">
                        	@csrf
                            <div class="form-group lg-margin">
                            	<label for="contactname" class="form-label">@lang('language.enter_name') <span class="required">*</span></label>
                            	<input type="text"
                                    class="form-control input-lg" name="name" id="contactname" ng-model="contact.name" ng-required="true">
                                </div>
                            <div class="form-group lg-margin">
                            	<label for="contactemail" class="form-label">Email<span class="required">*</span></label>
                                    <input type="email" ng-model="contact.email" ng-required="true"
                                    class="form-control input-lg" name="email" id="contactemail" >
                                    <span ng-show="contactme.email.$error.email">@lang('language.email_invalidate') </span>
                                </div>
                            <div class="form-group lg-margin">
                            	<label for="contactsubject" class="form-label">@lang('language.subject') </label>
                                    <input type="text" class="form-control input-lg"
                                    name="subject" id="contactsubject" ng-model="contact.subject" ng-required="true">
                                </div>
                            <div class="form-group lg-margin">
                            	<label for="contactmessage" class="form-label">@lang('language.reviews') <span class="required">*</span></label>
                                    <textarea id="contactmessage" class="form-control input-lg min-height" cols="30" name="message" rows="6"
                                    ng-model="contact.message" ng-required="true"></textarea>
                                </div>
                            <div class="xss-margin"></div>
                            <div class="form-group">
                            	<input ng-disabled="contactme.$invalid" type="submit" class="btn btn-lg btn-custom-5"
                                    value="@lang('language.post_comment') ">
                                </div>
                        </form>
                    </div>
                </div>
                <div class="xlg-margin visible-xs clearfix"></div>
                <div class="row">
                    <div class="col-sm-7 padding-right-larger contact-box">
                        <h3>@lang('language.how_to_contact_us') </h3>
                        <p>Sed consequat, nibh ac imperdiet pharetra, tortor lectus tincidunt dolor, eget euismod
                            diamsapien id mauris. Morbi aliquam venenatis odio in cursus. Integer mollis dui nec dui
                            elementum, a faucibus tortor malesuada. Proin et imperdiet mi. Morbi odio erat, ultrices non
                            lectus nec, tempor viverra nequtur.</p>
                    </div>
                    <div class="xs-margin visible-xs clearfix"></div>
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-md-7 contact-box">
                                <h3>@lang('language.contact_details') </h3>
                                <ul class="contact-list">
                                    <li><span>@lang('language.telephone_number') :</span>0522-451-655</li>
                                    <li><span>Email:</span>thuclinh854@gmail.com</li>
                                    <li><span>Skype:</span>Eshop</li>
                                </ul>
                            </div>
                            <div class="xs-margin visible-xs clearfix"></div>
                            <div class="col-md-5 contact-box">
                                <h3>@lang('language.contact_info') </h3>
                                <div class="contact-address">151 AU CO<br>HOA KHANH<br>DA NANG CITY<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md-margin"></div>
        </section>

@endsection