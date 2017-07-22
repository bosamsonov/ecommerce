@extends('crewing.modules.page.page')

@section('content')

<h1>Добавление нового кандидата</h1>

{!! Form::open([
    'route' => ['crewing.candidates.store'],
    'files'=>true,
    'id'=>'form-site'
]) !!}

<div class="row">
    <div class="form-group col-lg-3 col-md-6">
        {!! Form::label('surname', 'Surname') !!}
        
        {!! Form::text('surname', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-lg-3 col-md-6">
        {!! Form::label('first_name', 'First Name') !!}
        {!! Form::text('first_name', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-lg-3 col-md-6">
    {!! Form::label('middle_name', 'Middle Name') !!}
        {!! Form::text('middle_name', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>

    <div class="form-group col-lg-3 col-md-6">
        {!! Form::label('rank', 'Rank') !!}
        {!! Form::text('rank', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
</div>

<div class="row">
     <div class="form-group col-lg-3 col-md-6">
        {!! Form::label('phone_cell', 'Mobile Phone') !!}
        {!! Form::text('phone_cell', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>  
    <div class="form-group col-lg-3 col-md-6">
        {!! Form::label('phone_home', 'Home Phone') !!}
        {!! Form::text('phone_home', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-lg-3 col-md-6">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, [
            'class'=> 'form-control',
        ]) !!}
    </div>
    <div class="form-group col-lg-3 col-md-6">
        {!! Form::label('skype', 'Skype') !!}
        {!! Form::text('skype', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-6 col-lg-2 col-md-6">
        {!! Form::label('country', 'Country') !!}
        {!! Form::text('country', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-6 col-lg-2 col-md-6">
        {!! Form::label('city', 'City') !!}
        {!! Form::text('city', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-8 col-lg-5 col-md-6">
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    
    <div class="form-group col-4 col-lg-3 col-md-6">
        {!! Form::label('nearest_airport', 'Nearest Airport') !!}
        {!! Form::text('nearest_airport', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>

</div>





<div class="row">
    <div class="form-group col-5 col-md-3 col-lg-2">
        {!! Form::label('dob', 'Date of birth', ['class'=>'col-form-label-sm']) !!}
        {!! Form::date('dob', null, [
            'class'=> 'form-control',
        ]) !!}
    </div>
    <div class="form-group col-7 col-md-5 col-lg-3">
        {!! Form::label('birth_place', 'Place of Birth', ['class'=>'col-form-label-sm']) !!}
        {!! Form::text('birth_place', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-7 col-md-4 col-lg-3">
        {!! Form::label('nationality', 'Nationality', ['class'=>'col-form-label-sm']) !!}
        {!! Form::text('nationality', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-6 col-md-5 col-lg-2">
        {!! Form::label('marital_status', 'Marital Status', ['class'=>'col-form-label-sm']) !!}
        {!! Form::select('marital_status', [
                'single' => 'Single',
                'married' => 'Married',
                'divorced' => 'Divorced',
                'widower' => 'Widower'
            ], null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-3 col-md-2 col-lg-2">
        {!! Form::label('children', 'Children', ['class'=>'col-form-label-sm']) !!}
        {!! Form::number('children', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-4 col-md-2 col-lg-2">
        {!! Form::label('height', 'Height', ['class'=>'col-form-label-sm']) !!}
        {!! Form::text('height', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-4 col-md-2 col-lg-2">
        {!! Form::label('weight', 'Weight', ['class'=>'col-form-label-sm']) !!}
        {!! Form::text('weight', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-4 col-md-2 col-lg-2">
        {!! Form::label('shoes_size', 'Shoes size', ['class'=>'col-form-label-sm']) !!}
        {!! Form::text('shoes_size', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-6 col-md-3 col-lg-2">
        {!! Form::label('eyes', 'Eyes', ['class'=>'col-form-label-sm']) !!}
        {!! Form::text('eyes', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
    <div class="form-group col-6 col-md-3 col-lg-2">
        {!! Form::label('hair', 'Hair', ['class'=>'col-form-label-sm']) !!}
        {!! Form::text('hair', null, [
            'class'=> 'form-control'
        ]) !!}
    </div>
</div>

<fieldset class="form-group">
    <div class="row">
        <legend class="col-12">Passport</legend>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('passport_no', 'Passport No.', ['class'=>'col-form-label-sm']) !!}
            {!! Form::text('passport_no', null, [
                'class'=> 'form-control'
            ]) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('passport_place', 'Place Issued', ['class'=>'col-form-label-sm']) !!}
            {!! Form::text('passport_place', null, [
                'class'=> 'form-control'
            ]) !!}
        </div>
        <div class="form-group col-6 col-sm-4 col-lg-2">
            {!! Form::label('passport_issued', 'Date Issued', ['class'=>'col-form-label-sm']) !!}
            {!! Form::date('passport_issued', null, [
                'class'=> 'form-control',
            ]) !!}
        </div>
        <div class="form-group col-6 col-sm-4 col-lg-2">
            {!! Form::label('passport_expiry', 'Expiry Date', ['class'=>'col-form-label-sm']) !!}
            {!! Form::date('passport_expiry', null, [
                'class'=> 'form-control',
            ]) !!}
        </div>
    </div>
</fieldset>

<fieldset class="form-group">
    <div class="row">
        <legend class="col-12">Seamensbook</legend>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('seamensbook_no', 'Seamensbook No.', ['class'=>'col-form-label-sm']) !!}
            {!! Form::text('seamensbook_no', null, [
                'class'=> 'form-control'
            ]) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('seamensbook_place', 'Place Issued', ['class'=>'col-form-label-sm']) !!}
            {!! Form::text('seamensbook_place', null, [
                'class'=> 'form-control'
            ]) !!}
        </div>
        <div class="form-group col-6 col-sm-4 col-lg-2">
            {!! Form::label('seamensbook_issued', 'Date issued', ['class'=>'col-form-label-sm']) !!}
            {!! Form::date('seamensbook_issued', null, [
                'class'=> 'form-control'
            ]) !!}
        </div>
        <div class="form-group col-6 col-sm-4 col-lg-2">
            {!! Form::label('seamensbook_expiry', 'Expiry Date', ['class'=>'col-form-label-sm']) !!}
            {!! Form::date('seamensbook_expiry', null, [
                'class'=> 'form-control'
            ]) !!}
        </div>
    </div>
</fieldset>


<fieldset class="form-group">
    <div class="row">
        <legend class="col-12">Education</legend>
        <div class="col-12" id="education">
            <script id="educationTemplate" type="text/x-handlebars-template">
            <div class="row">
                <div class="col-2 col-md-1">
                    <button type="button" onclick="$(this).parent().parent().remove()", class='form-control btn btn-danger'>
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="col-10 col-md-11">
                    <div class="row">
                        <div class="form-group col-md-6 col-lg-5">
                            {!! Form::label('education[@{{educationId}}][name]', 'Name') !!}
                            {!! Form::text('education[@{{educationId}}][name]', null, [
                                'class'=> 'form-control'
                            ]) !!}
                        </div>
                
                        <div class="form-group col-md-6 col-lg-2">
                            {!! Form::label('education[@{{educationId}}][graduation_date]', 'Graduation date') !!}
                            {!! Form::date('education[@{{educationId}}][graduation_date]', null, [
                                'class'=> 'form-control'
                            ]) !!}
                        </div>
                        <div class="form-group col-md-6 col-lg-5">
                            {!! Form::label('education[@{{educationId}}][degree]', 'Degree') !!}
                            {!! Form::text('education[@{{educationId}}][degree]', null, [
                                'class'=> 'form-control'
                            ]) !!}
                        </div>
                    </div>
                </div>
            </div>
            </script>
        </div>
        <div class="col-12">
            <button type="button" onclick="page.renderEducation()">
                Add Education
            </button>
        </div>
    </div>
</fieldset>



<fieldset class="form-group">
    <div class="row">
        <legend class="col-12">Certificates</legend>
        <div class="col-12" id="certificate">
            <script id="certificateTemplate" type="text/x-handlebars-template">
            <div class="row">
                <div class="form-group col-md-6 col-lg-3">
                    {!! Form::label('certificate[@{{certificateId}}][name]', 'Name') !!}
                    {!! Form::text('certificate[@{{certificateId}}][name]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-2">
                    {!! Form::label('certificate[@{{certificateId}}][number]', 'Number') !!}
                    {!! Form::text('certificate[@{{certificateId}}][number]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-3">
                    {!! Form::label('certificate[@{{certificateId}}][issued_place]', 'Place') !!}
                    {!! Form::text('certificate[@{{certificateId}}][issued_place]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-2">
                    {!! Form::label('certificate[@{{certificateId}}][issued_date]', 'Issued date') !!}
                    {!! Form::date('certificate[@{{certificateId}}][issued_date]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-2">
                    {!! Form::label('certificate[@{{certificateId}}][expiry_date]', 'Expiry date') !!}
                    {!! Form::date('certificate[@{{certificateId}}][expiry_date]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="col-12">
                    <button type="button" onclick="$(this).parent().parent().remove()">
                        Delete
                    </button>
                </div>
            </div>
           
            </script>
            

        </div>
         <div class="col-12">
            <button type="button" onclick="page.renderCertificate()">
                Add Certificate
            </button>
        </div>
    </div>
</fieldset>


<fieldset class="form-group">
    <div class="row">
        <legend class="col-12">Sea Service</legend>
        <div class="col-12" id="seaServices">
            <script id="seaServiceTemplate" type="text/x-handlebars-template">
            <div class="row">
                <div class="form-group col-md-6 col-lg-3">
                    {!! Form::label('sea_service[@{{seaServiceId}}][company]', 'Company') !!}
                    {!! Form::text('sea_service[@{{seaServiceId}}][company]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-2">
                    {!! Form::label('sea_service[@{{seaServiceId}}][rank]', 'Rank') !!}
                    {!! Form::text('sea_service[@{{seaServiceId}}][rank]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-3">
                    {!! Form::label('sea_service[@{{seaServiceId}}][vessel]', 'Vessel') !!}
                    {!! Form::text('sea_service[@{{seaServiceId}}][vessel]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-4">
                    {!! Form::label('sea_service[@{{seaServiceId}}][type]', 'Type') !!}
                    {!! Form::text('sea_service[@{{seaServiceId}}][type]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-2">
                    {!! Form::label('sea_service[@{{seaServiceId}}][dwt]', 'DWT') !!}
                    {!! Form::text('sea_service[@{{seaServiceId}}][dwt]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-2">
                    {!! Form::label('sea_service[@{{seaServiceId}}][grt]', 'GRT') !!}
                    {!! Form::text('sea_service[@{{seaServiceId}}][grt]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-4">
                    {!! Form::label('sea_service[@{{seaServiceId}}][me]', 'ME') !!}
                    {!! Form::text('sea_service[@{{seaServiceId}}][me]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-2">
                    {!! Form::label('sea_service[@{{seaServiceId}}][kw]', 'KW') !!}
                    {!! Form::text('sea_service[@{{seaServiceId}}][kw]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-2">
                    {!! Form::label('sea_service[@{{seaServiceId}}][bhp]', 'BHP') !!}
                    {!! Form::text('sea_service[@{{seaServiceId}}][bhp]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-4">
                    {!! Form::label('sea_service[@{{seaServiceId}}][flag]', 'Flag') !!}
                    {!! Form::text('sea_service[@{{seaServiceId}}][flag]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-2">
                    {!! Form::label('sea_service[@{{seaServiceId}}][from]', 'From') !!}
                    {!! Form::date('sea_service[@{{seaServiceId}}][from]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-2">
                    {!! Form::label('sea_service[@{{seaServiceId}}][to]', 'To') !!}
                    {!! Form::date('sea_service[@{{seaServiceId}}][to]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-6 col-lg-4">
                    {!! Form::label('sea_service[@{{seaServiceId}}][owner]', 'Owner') !!}
                    {!! Form::text('sea_service[@{{seaServiceId}}][owner]', null, [
                        'class'=> 'form-control'
                    ]) !!}
                </div>
                <div class="col-12">
                    <button type="button" onclick="console.log($(this).parent().parent().remove())">
                        Delete
                    </button>
                </div>
            </div>
            
            </script>
        </div>
        <div class="col-12">
            <button type="button" onclick="page.renderSeaService()">
                Add Sea Service
            </button>
        </div>
    </div>
</fieldset>







<button>Добавить кандидата</button>
{!! Form::close() !!}

    
@endsection