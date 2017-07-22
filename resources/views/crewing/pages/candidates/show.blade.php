@extends('crewing.modules.page.page')

@section('content')

<h1>{{$candidate->surname}} {{$candidate->first_name}} {{$candidate->middle_name}}</h1>

<div class="row">
    <div class="form-group col-lg-3 col-md-6">
        <b>{!! Form::label('surname', 'Surname') !!}</b>
        <p class="form-control-static">{{$candidate->surname}}</p>
    </div>
    <div class="form-group col-lg-3 col-md-6">
        <b>{!! Form::label('first_name', 'First Name') !!}</b>
        <p class="form-control-static">{{$candidate->first_name}}</p>
    </div>
    <div class="form-group col-lg-3 col-md-6">
        <b>{!! Form::label('middle_name', 'Middle Name') !!}</b>
        <p class="form-control-static">{{$candidate->middle_name}}</p>
    </div>

    <div class="form-group col-lg-3 col-md-6">
        <b>{!! Form::label('rank', 'Rank') !!}</b>
        <p class="form-control-static">{{$candidate->rank}}</p>
    </div>
</div>

<div class="row">
     <div class="form-group col-lg-3 col-md-6">
        <b>{!! Form::label('phone_cell', 'Mobile Phone') !!}</b>
        <p class="form-control-static">{{$candidate->phone_cell}}</p>
    </div>  
    <div class="form-group col-lg-3 col-md-6">
        <b>{!! Form::label('phone_home', 'Home Phone') !!}</b>
        <p class="form-control-static">{{$candidate->phone_home}}</p>
    </div>
    <div class="form-group col-lg-3 col-md-6">
        <b>{!! Form::label('email', 'Email') !!}</b>
        <p class="form-control-static">{{$candidate->email}}</p>
    </div>
    <div class="form-group col-lg-3 col-md-6">
        <b>{!! Form::label('skype', 'Skype') !!}</b>
        <p class="form-control-static">{{$candidate->skype}}</p>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-2 col-md-6">
        <b>{!! Form::label('country', 'Country') !!}</b>
        <p class="form-control-static">{{$candidate->country}}</p>
    </div>
    <div class="form-group col-lg-2 col-md-6">
        <b>{!! Form::label('city', 'City') !!}</b>
        <p class="form-control-static">{{$candidate->city}}</p>
    </div>
    <div class="form-group col-lg-5 col-md-6">
        <b>{!! Form::label('address', 'Address') !!}</b>
        <p class="form-control-static">{{$candidate->address}}</p>
    </div>
    
    <div class="form-group col-lg-3 col-md-6">
        <b>{!! Form::label('nearest_airport', 'Nearest Airport') !!}</b>
        <p class="form-control-static">{{$candidate->nearest_airport}}</p>
    </div>

</div>


<div class="row">
    <div class="form-group col-md-5 col-lg-2">
        <b>{!! Form::label('dob', 'Date of birth') !!}</b>
        <p class="form-control-static">{{$candidate->dob}}</p>
    </div>
    <div class="form-group col-md-5 col-lg-3">
        <b>{!! Form::label('birth_place', 'Place of Birth') !!}</b>
        <p class="form-control-static">{{$candidate->birth_place}}</p>
    </div>
    <div class="form-group col-md-6 col-lg-3">
        <b>{!! Form::label('nationality', 'Nationality') !!}</b>
        <p class="form-control-static">{{$candidate->nationality}}</p>
    </div>
    <div class="form-group col-md-5 col-lg-2">
        {!! Form::label('marital_status', 'Marital Status') !!}
        <p class="form-control-static">{{$candidate->marital_status}}</p>
    </div>
    <div class="form-group col-md-2 col-lg-2">
        {!! Form::label('children', 'Children') !!}
        <p class="form-control-static">{{$candidate->children}}</p>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6 col-lg-2">
        {!! Form::label('height', 'Height') !!}
        <p class="form-control-static">{{$candidate->height}}</p>
    </div>
    <div class="form-group col-md-6 col-lg-2">
        {!! Form::label('weight', 'Weight') !!}
        <p class="form-control-static">{{$candidate->weight}}</p>
    </div>
    <div class="form-group col-md-6 col-lg-2">
        {!! Form::label('shoes_size', 'Shoes size') !!}
        <p class="form-control-static">{{$candidate->shoes_size}}</p>
    </div>
    <div class="form-group col-md-6 col-lg-2">
        {!! Form::label('eyes', 'Eyes') !!}
        <p class="form-control-static">{{$candidate->eyes}}</p>
    </div>
    <div class="form-group col-md-6 col-lg-2">
        {!! Form::label('hair', 'Hair') !!}
        <p class="form-control-static">{{$candidate->hair}}</p>
    </div>
</div>

<fieldset class="form-group">
    <div class="row">
        <legend class="col-12">Passport</legend>
        <div class="form-group col-md-6 col-lg-4">
            {!! Form::label('passport_no', 'Passport No.') !!}
            <p class="form-control-static">{{$candidate->passport_no}}</p>
        </div>
        <div class="form-group col-md-6 col-lg-2">
            {!! Form::label('passport_issued', 'Date Issued') !!}
            <p class="form-control-static">{{$candidate->passport_issued}}</p>
        </div>
        <div class="form-group col-md-6 col-lg-2">
            {!! Form::label('passport_expiry', 'Expiry Date') !!}
            <p class="form-control-static">{{$candidate->passport_expiry}}</p>
        </div>
        <div class="form-group col-md-6 col-lg-4">
            {!! Form::label('passport_place', 'Place Issued') !!}
            <p class="form-control-static">{{$candidate->passport_place}}</p>
        </div>
    </div>
</fieldset>

<fieldset class="form-group">
    <div class="row">
        <legend class="col-12">Seamensbook</legend>
        <div class="form-group col-md-6 col-lg-4">
            {!! Form::label('seamensbook_no', 'Seamensbook No.') !!}
            <p class="form-control-static">{{$candidate->seamensbook_no}}</p>
        </div>
        <div class="form-group col-md-6 col-lg-2">
            {!! Form::label('seamensbook_issued', 'Date issued') !!}
            <p class="form-control-static">{{$candidate->seamensbook_issued}}</p>
        </div>
        <div class="form-group col-md-6 col-lg-2">
            {!! Form::label('seamensbook_expiry', 'Expiry Date') !!}
            <p class="form-control-static">{{$candidate->seamensbook_expiry}}</p>
        </div>
        <div class="form-group col-md-6 col-lg-4">
            {!! Form::label('seamensbook_place', 'Place Issued') !!}
            <p class="form-control-static">{{$candidate->seamensbook_place}}</p>
        </div>
    </div>
</fieldset>


<fieldset class="form-group">
    <div class="row">
        <legend class="col-12">Education</legend>
        <div class="col-12  table-responsive" id="education">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Graduation date
                            </th>
                            <th>
                                Degree
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($candidate->education as $education)
                        <tr>
                            <td>{{$education->name}}</td>
                            <td>{{$education->graduation_date}}</td>
                            <td>{{$education->degree}}</td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</fieldset>



<fieldset class="form-group">
    <div class="row">
        <legend class="col-12">Certificates</legend>
        <div class="col-12  table-responsive" id="certificate">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Number
                        </th>
                        <th>
                            Place Issued
                        </th>
                        <th>
                            Issued Date
                        </th>
                         <th>
                            Expiry Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidate->certificate as $certificate)
                    <tr>
                        <td>{{$certificate->name}}</td>
                        <td>{{$certificate->number}}</td>
                        <td>{{$education->issued_place}}</td>
                        <td>{{$education->issued_date}}</td>
                        <td>{{$education->expiry_date}}</td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</fieldset>


<fieldset class="form-group">
    <div class="row">
        <legend class="col-12">Sea Service</legend>
        <div class="col-12 table-responsive" id="seaServices">

            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Company
                        </th>
                        <th>
                            Rank
                        </th>
                        <th>
                            Vessel
                        </th>
                        <th>
                            Type
                        </th>
                         <th>
                            DWT
                        </th>
                        <th>
                            GRT
                        </th>
                        <th>
                            ME
                        </th>
                         <th>
                            KW
                        </th>
                         <th>
                            BHP
                        </th>
                          <th>
                            Flag
                        </th>
                           <th>
                            From
                        </th>
                           <th>
                            To
                        </th>
                         <th>
                            Owner
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidate->sea_service as $sea_service)
                        <tr>
                            <td>{{$sea_service->company}}</td>
                            <td>{{$sea_service->rank}}</td>
                            <td>{{$sea_service->vessel}}</td>
                            <td>{{$sea_service->type}}</td>
                            <td>{{$sea_service->dwt}}</td>
                            <td>{{$sea_service->grt}}</td>
                            <td>{{$sea_service->me}}</td>
                            <td>{{$sea_service->kw}}</td>
                            <td>{{$sea_service->bhp}}</td>
                            <td>{{$sea_service->flag}}</td>
                            <td>{{$sea_service->from}}</td>
                            <td>{{$sea_service->to}}</td>
                             <td>{{$sea_service->owner}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            </div>
            
       

    </div>
</fieldset>

    
@endsection