@extends('layouts.client')
@section('title') Personal Information @endsection
@section('links')
    <link href="{{asset('assets/css/wizard.css')}}" rel="stylesheet">

@endsection
@section('main')
<style>
@media screen and (max-width: 600px) {
  /* .o-footer{
    visibility: hidden;
    display: none;
  } */

  .Go1{
    visibility: hidden;
    display: none;

  }

  .btn1{
      margin-left:83px;

  }

  .btncen{

    margin-left:37px;
  }

  .btncen2{
    margin-left:37px;
    margin-bottom:23px;
  }
}
</style>
    <div class="d-md-flex flex-md-equal h-150 ">
        <div class="col-lg-4 p-0 auth-slider my-div" >
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block h-100 my-div" src="{{asset('assets/img/1.jpg')}}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block h-100 my-div" src="{{asset('assets/img/2.jpg')}}" alt="Second slide">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 ">
            <nav role="navigation" aria-labelledby="breadcrumb-intro-2 " class="ml-md-5">
                <p class="sr-only" id="breadcrumb-intro-2">You are here:</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ml-md-4"><a href="{{route('client.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="location">Personal Information</li>
                </ol>
            </nav>
            <section class="wizard-section ">
                <div class="form-wizard ">
                    <div class="form-wizard-header col-12 mb-5 mr-5 ">
                        <ul class="list-unstyled form-wizard-steps clearfix ">
                            <li class="active" id="click" ><span >1</span></li>
                            <li><span>2</span></li>
                            <li><span>3</span></li>
                            <li><span>4</span></li>
                        </ul>
                    </div>
                    <div class="col-12 d-flex flex-column align-items-start">
                        <fieldset class="wizard-fieldset show col-lg-10 col-md-12 ml-md-4 ">
                            <form class="personal-info-step1" action="javascript:void(0)">
                                @csrf
                                <div class="col-sm-12  ">
                                    <h2>Education Information</h2>
                                    <div class="row mt-4">
                                        <div class="col-4">
                                            <div class="mb-1 form-group">
                                                <label for="educational_level" class="is-required">Educational
                                                    Level</label>
                                                <select name="educational_level" class="custom-select wizard-required"
                                                        id="educational_level" required>
                                                    <option value="">
                                                        Select..
                                                    </option>
                                                    <option value="bachelor"
                                                            @if($user->educational_level == "bachelor" ) selected @endif >
                                                        Bachelor
                                                    </option>
                                                    <option value="master_degree"
                                                            @if($user->educational_level == "master_degree" ) selected @endif >
                                                        Master degree
                                                    </option>
                                                    <option value="ph.D." @if($user->educational_level == "ph.D." ) selected @endif >Ph.D. </option>

                                                    <option value="diploma"
                                                            @if($user->educational_level == "diploma" ) selected @endif >
                                                        Diploma
                                                    </option>
                                                    <option value="high_diploma"
                                                            @if($user->educational_level == "high_diploma" ) selected @endif >
                                                        High Diploma
                                                    </option>
                                                    <option value="high_school"
                                                            @if($user->educational_level == "high_school" ) selected @endif >
                                                        High School
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-4 ">
                                            <label for="field">Field of study<small>(if exist)</small></label>
                                            <input type="text" name="field" id="field" class="form-control"
                                                   value="@if($user->field){{$user->field}}@endif">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="field">University <small>(if exist)</small></label>
                                            <select class="form-control" id="university" name="university">
                                                <option value="">Select a University</option>
                                                <option value="University of Jordan (UJ)" @if($user->university == 'University of Jordan (UJ)') selected @endif>University of Jordan (UJ)</option>
                                                <option value="Jordan University of Science and Technology (JUST)" @if($user->university == 'Jordan University of Science and Technology (JUST)') selected @endif>Jordan University of Science and Technology (JUST)</option>
                                                <option value="Yarmouk University" @if($user->university == 'Yarmouk University') selected @endif>Yarmouk University</option>
                                                <option value="Hashemite University" @if($user->university == 'Hashemite University') selected @endif>Hashemite University</option>
                                                <option value="Mutah University" @if($user->university == 'Mutah University') selected @endif>Mutah University</option>
                                                <option value="Princess Sumaya University for Technology (PSUT)" @if($user->university == 'Princess Sumaya University for Technology (PSUT)') selected @endif>Princess Sumaya University for Technology (PSUT)</option>
                                                <option value="Al-Balqa' Applied University" @if($user->university == "Al-Balqa' Applied University") selected @endif>Al-Balqa' Applied University</option>
                                                <option value="German-Jordanian University (GJU)" @if($user->university == 'German-Jordanian University (GJU)') selected @endif>German-Jordanian University (GJU)</option>
                                                <option value="Philadelphia University" @if($user->university == 'Philadelphia University') selected @endif>Philadelphia University</option>
                                                <option value="Petra University" @if($user->university == 'Perta University') selected @endif>Petra University</option>
                                                <option value="Middle East University" @if($user->university == 'Middle East University') selected @endif>Middle East University</option>
                                                <option value="Jadara University" @if($user->university == 'Jadara University') selected @endif>Jadara University</option>
                                                <option value="Jerash University" @if($user->university == 'Jerash University') selected @endif>Jerash University</option>
                                                <option value="Zarqa University" @if($user->university == 'Zarqa University') selected @endif>Zarqa University</option>
                                                <option value="Isra University" @if($user->university == 'Isra University') selected @endif>Isra University</option>
                                                <option value="Ajloun National University" @if($user->university == 'Ajloun National University') selected @endif>Ajloun National University</option>
                                                <option value="Aqaba University of Technology" @if($user->university == 'Aqaba University of Technology') selected @endif>Aqaba University of Technology</option>
                                                <option value="Al Hussein Bin Talal University" @if($user->university == 'Al Hussein Bin Talal University') selected @endif>Al Hussein Bin Talal University</option>
                                                <option value="Al Ahliyya Amman University" @if($user->university == 'Al Ahliyya Amman University') selected @endif>Al Ahliyya Amman University</option>
                                                <option value="Talal Abu-Ghazaleh University College for Innovation" @if($user->university == 'Talal Abu-Ghazaleh University College for Innovation') selected @endif>Talal Abu-Ghazaleh University College for Innovation</option>
                                                <option value="Amman Arab University" @if($user->university == 'Amman Arab University') selected @endif>Amman Arab University</option>
                                            </select>
                                        </div>
                                    </div>


                                    <fieldset class="form-group col-lg-12 px-0 my-4">
                                        <label class="mb-3 is-required">Educational Status</label>
                                        <div class="ml-2">
                                        <div id="radio-action" class="form-inline d-flex ">
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio"style="margin-right:250px">
                                                <input type="radio" name="educational_status" value="graduated"
                                                       id="graduated"
                                                       class="custom-control-input"
                                                       autocomplete="off" {{ ($user->educational_status == 'graduated') ? 'checked' : ''}} >
                                                <label class="custom-control-label " for="graduated">Graduated </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="educational_status"
                                                       value="under_graduate" id="under-graduate"
                                                       class="custom-control-input"
                                                       autocomplete="off" {{ ($user->educational_status == 'under_graduate') ? 'checked' : '' }} >
                                                <label class="custom-control-label " for="under-graduate">Under Graduate</label>
                                            </div>
                                        </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group col-lg-12  px-0 my-4">
                                        <label class="mb-3 is-required">Educational background</label>
                                        <div class="ml-2">
                                        <div id="radio-action" class="form-inline d-flex">
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio" style="margin-right:220px">
                                                <input type="radio" name="educational_background" value="it_background"
                                                       id="it-background"
                                                       class="custom-control-input"
                                                       autocomplete="off" {{ ($user->educational_background == 'it_background') ? 'checked' : ''}} >
                                                <label class="custom-control-label " for="it-background" style="white-space:nowrap">IT background</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="educational_background"
                                                       value="non_it_background" id="non-it-background"
                                                       class="custom-control-input"
                                                       autocomplete="off" {{ ($user->educational_background == 'non_it_background') ? 'checked' : '' }} >
                                                <label class="custom-control-label " for="non-it-background">non IT
                                                    background</label>
                                            </div>
                                        </div>
                                        </div>
                                    </fieldset>

                                </div>

                                <div class=" col-md-12  d-flex justify-content-end mt-5 px-0">
                                        <div class="ml-3">
                                            <a class="Go1 btn btn-sm-block btn-secondary   personal_info_save1" href="{{route('client.dashboard')}}"
                                               type="submit">Go Home
                                            </a>
                                        </div>
                                        <div class="ml-3  ">
                                            <button class="btn1 btn btn-sm-block border form-wizard-next-btn  personal_info_save1"
                                                    type="submit">Save & Continue
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </fieldset>
                        <fieldset class=" wizard-fieldset col-lg-10 col-md-12 ml-md-5 ">
                            <form class="personal-info-step2 " action="javascript:void(0)">
                                @csrf


                                <div class="form-group row">
                                    <div class="col-sm-12 mb-4">
                                        <h2>Arabic Language Level</h2>
                                    </div>
                                    <fieldset class="form-group col-8">
                                        <h4 class="mb-4 is-required">Writing :</h4>
                                        <div id="radio-action " required
                                             class="form-inline d-flex justify-content-between">
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="ar_writing" value="poor"
                                                       id="ar_writing_poor"

                                                       class="custom-control-input ar_writing1"
                                                       autocomplete="off" {{ ($user->ar_writing == 'poor') ? 'checked' : ''}}>
                                                <label class="custom-control-label "
                                                       for="ar_writing_poor">Poor</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="ar_writing" value="good"
                                                       id="ar_writing_good"
                                                       class="custom-control-input ar_writing2"
                                                       autocomplete="off" {{ ($user->ar_writing == 'good') ? 'checked' : ''}}>
                                                <label class="custom-control-label "
                                                       for="ar_writing_good">Good</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="ar_writing" value="very_good"
                                                       id="ar_writing_very_good"
                                                       class="custom-control-input ar_writing3"
                                                       autocomplete="off" {{ ($user->ar_writing == 'very_good') ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="ar_writing_very_good">Very
                                                    good</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="ar_writing" value="fluent"
                                                       id="ar_writing_fluent"
                                                       class="custom-control-input ar_writing4"
                                                       autocomplete="off" {{ ($user->ar_writing == 'fluent') ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="ar_writing_fluent">Fluent</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group col-8">
                                        <h4 class="mb-3 is-required">Speaking :</h4>
                                        <div id="radio-action"
                                             class="form-inline d-flex justify-content-between">
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="ar_speaking" value="poor"
                                                       id="ar_speaking_poor"
                                                       class="custom-control-input ar_speaking1"
                                                       autocomplete="off" {{ ($user->ar_speaking == 'poor') ? 'checked' : ''}}>
                                                <label class="custom-control-label "
                                                       for="ar_speaking_poor">Poor</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="ar_speaking" value="good"
                                                       id="ar_speaking_good"
                                                       class="custom-control-input ar_speaking2"
                                                       autocomplete="off" {{ ($user->ar_speaking == 'good') ? 'checked' : ''}}>
                                                <label class="custom-control-label "
                                                       for="ar_speaking_good">Good</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="ar_speaking" value="very_good"
                                                       id="ar_speaking_very_good"
                                                       class="custom-control-input ar_speaking3"
                                                       autocomplete="off" {{ ($user->ar_speaking == 'very_good') ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="ar_speaking_very_good">Very
                                                    good</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="ar_speaking" value="fluent"
                                                       id="ar_speaking_fluent"
                                                       class="custom-control-input ar_speaking4"
                                                       autocomplete="off" {{ ($user->ar_speaking == 'fluent') ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="ar_speaking_fluent">Fluent</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr class="col-sm-11 m-0"/>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 ">
                                        <h2>English Language Level</h2>
                                    </div>
                                    <fieldset class="form-group col-8">
                                        <h4 class="mb-3 is-required">Writing :</h4>
                                        <div id="radio-action"
                                             class="form-inline d-flex justify-content-between">
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="en_writing" value="poor"
                                                       id="en_writing_poor"
                                                       class="custom-control-input"
                                                       autocomplete="off" {{ ($user->en_writing == 'poor') ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="en_writing_poor">Poor</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="en_writing" value="good"
                                                       id="en_writing_good"
                                                       class="custom-control-input"
                                                       autocomplete="off" {{ ($user->en_writing == 'good') ? 'checked' : ''}}>
                                                <label class="custom-control-label "
                                                       for="en_writing_good">Good</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="en_writing" value="very_good"
                                                       id="en_writing_very_good"
                                                       class="custom-control-input"
                                                       autocomplete="off" {{ ($user->en_writing == 'very_good') ? 'checked' : ''}}>
                                                <label class="custom-control-label "
                                                       for="en_writing_very_good">Very
                                                    good</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="en_writing" value="fluent"
                                                       id="en_writing_fluent"
                                                       class="custom-control-input"
                                                       autocomplete="off" {{ ($user->en_writing == 'fluent') ? 'checked' : ''}}>
                                                <label class="custom-control-label "
                                                       for="en_writing_fluent">Fluent</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group col-8">
                                        <h4 class="mb-3 is-required">Speaking :</h4>
                                        <div id="radio-action"
                                             class="form-inline d-flex justify-content-between">
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="en_speaking" value="poor"
                                                       id="en_speaking_poor"
                                                       class="custom-control-input "
                                                       autocomplete="off" {{ ($user->en_speaking == 'poor') ? 'checked' : ''}}>
                                                <label class="custom-control-label en_speaking1"
                                                       for="en_speaking_poor">Poor</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="en_speaking" value="good"
                                                       id="en_speaking_good"
                                                       class="custom-control-input en_speaking2"
                                                       autocomplete="off" {{ ($user->en_speaking == 'good') ? 'checked' : ''}}>
                                                <label class="custom-control-label "
                                                       for="en_speaking_good">Good</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="en_speaking" value="very_good"
                                                       id="en_speaking_very_good"
                                                       class="custom-control-input en_speaking3"
                                                       autocomplete="off" {{ ($user->en_speaking == 'very_good') ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="en_speaking_very_good">Very
                                                    good</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline wizard-form-radio">
                                                <input type="radio" name="en_speaking" value="fluent"
                                                       id="en_speaking_fluent"
                                                       class="custom-control-input en_speaking4"
                                                       autocomplete="off" {{ ($user->en_speaking == 'fluent') ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="en_speaking_fluent">Fluent</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div  class="btncen d-flex justify-content-between col-12  pl-0">
                                    <button
                                        class="form-wizard-previous-btn mr-4 justify-content-rounded btn btn-secondary"
                                        type="button">Previous
                                    </button>
                                    <div class="d-flex justify-content-end">
                                        <a class="Go1 btn btn-sm-block btn-secondary mr-2 ml-2 personal_info_save1" href="{{route('client.dashboard')}}"
                                           type="submit">Go Home
                                        </a>
                                        <button
                                            class="btn btn-sm-block border form-wizard-next-btn btn personal_info_save2"
                                            type="submit">Save & Continue
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                        <fieldset class="wizard-fieldset col-lg-10 col-md-12 ml-md-5 ">
                            <form class="personal-info-step3" action="javascript:void(0)">
                                @csrf
                                <div class="col-sm-12 px-0 mb-0">
                                    <h2>Contact Information</h2>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="city" class="is-required">Current City</label>
                                        <select class="custom-select wizard-required" id="city"  required name="city" >
                                        <option value="" >
                                                        Select..
                                                    </option>
                                            <option value="amman" @if($user->city == "amman" ) selected @endif>
                                                Amman
                                            </option>
                                            <option value="irbid" @if($user->city == "irbid" ) selected @endif>
                                                Irbid
                                            </option>
                                            <option value="balqa" @if($user->city == "balqa" ) selected @endif>
                                                Balqa
                                            </option>
                                            <option value="zarka" @if($user->city == "zarka" ) selected @endif>
                                                Zarqa
                                            </option>
                                            <option value="karak" @if($user->city == "karak" ) selected @endif>
                                                Karak
                                            </option>
                                            <option value="jarash" @if($user->city == "jarash" ) selected @endif>
                                                Jarash
                                            </option>
                                            <option value="tafilah" @if($user->city == "tafilah" ) selected @endif>
                                                Tafilah
                                            </option>
                                            <option value="ajloun" @if($user->city == "ajloun" ) selected @endif>
                                                Ajloun
                                            </option>
                                            <option value="aqaba" @if($user->city == "aqaba" ) selected @endif>
                                                Aqaba
                                            </option>
                                            <option value="madaba" @if($user->city == "madaba" ) selected @endif>
                                                Madaba
                                            </option>
                                            <option value="maan" @if($user->city == "maan" ) selected @endif>
                                                Maan
                                            </option>
                                            <option value="mafraq" @if($user->city == "mafraq" ) selected @endif>
                                                Mafraq
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 ">
                                        <label for="address" class="is-required">Full Address</label>
                                        <input type="text" name="address" id="address" class="form-control wizard-required" placeholder="eg: Amman, Jubaiha, Jubran St., Building 13 "
                                               value="@if($user->address){{$user->address}}@endif" required="required">
                                        <small>eg: Amman, Jubaiha, Jubran St., Building 13</small>
                                    </div>
                                </div>
                                <div class="btncen2 d-flex justify-content-between mt-5 col-12 pl-0">
                                    <button
                                        class="form-wizard-previous-btn  mr-4 btn btn-secondary"
                                        type="button">Previous
                                    </button>
                                    <div class=" d-flex justify-content-end">
                                        <a class="Go1 btn btn-sm-block btn-secondary mr-2 ml-2 personal_info_save1" href="{{route('client.dashboard')}}"
                                           type="submit">Go Home
                                        </a>
                                        <button
                                            class="form-wizard-next-btn border btn personal_info_save3"
                                            type="submit">Save & Continue
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                        <fieldset class="wizard-fieldset col-lg-10 col-md-12 ml-md-5 ">
                            <form class="personal-info-step4" method="post"
                                  action="{{route('personal.information.step4.submit')}}">
                                @csrf

                                <div class="col-sm-12 px-0 mb-0">
                                    <h2>Relative contact information</h2>
                                </div>
                                <div class="row mt-4">
                                    <div class="form-group col-sm-12 ">
                                        <label for="address" class="is-required">First Relative Full Name</label>
                                        <input type="text" name="fullName_1" id="fullName_1" required class="form-control wizard-required"  value="@if($user->fullName_1){{$user->fullName_1}}@endif">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="PostCategoryId" class="is-required">Select Relation</label>
                                        <select name="relative_relation_1" required class="custom-select wizard-required"
                                                id="PostCategoryId"
                                                 >
                                           <option value="Select..">

                                                 Select..
                                            </option>
                                            <option value="father"
                                                    @if($user->relative_relation_1 == "father" ) selected @endif>
                                                Father
                                            </option>
                                            <option value="mother"
                                                    @if($user->relative_relation_1 == "mother" ) selected @endif>
                                                Mother
                                            </option>
                                            <option value="brother"
                                                    @if($user->relative_relation_1 == "brother" ) selected @endif>
                                                Brother
                                            </option>
                                            <option value="sister"
                                                    @if($user->relative_relation_1 == "sister" ) selected @endif>
                                                Sister
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 ">
                                        <label for="relative_mobile" class="is-required">Mobile
                                            Number</label>
                                        <input name="relative_mobile_1" type="number" class="form-control wizard-required"
                                               id="relative_mobile"
                                               required
                                               value="@if($user->relative_mobile_1){{$user->relative_mobile_1}}@endif">
                                        <small>eg: 077*******</small>
                                    </div>

<hr class="col-11">
                                    <div class="form-group col-sm-12 ">
                                        <label for="address" class="is-required">Second Relative Full Name</label>
                                        <input type="text" name="fullName_2" id="fullName_2" required class="form-control wizard-required" value="@if($user->fullName_2){{$user->fullName_2}}@endif"
                                        >
                                    </div>
                                    <div class="form-group col-sm-6 ">
                                        <label for="PostCategoryId" class="is-required">Select Relation</label>
                                        <select name="relative_relation_2"  class="custom-select wizard-required"
                                                id="PostCategoryId" required >
                                                <option value="Select..">

                                                  Select..
                                             </option>
                                            <option value="father"
                                                    @if($user->relative_relation_1 == "father" ) selected @endif>
                                                Father
                                            </option>
                                            <option value="mother"
                                                    @if($user->relative_relation_1 == "mother" ) selected @endif>
                                                Mother
                                            </option>
                                            <option value="brother"
                                                    @if($user->relative_relation_1 == "brother" ) selected @endif>
                                                Brother
                                            </option>
                                            <option value="sister"
                                                    @if($user->relative_relation_1 == "sister" ) selected @endif>
                                                Sister
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 ">
                                        <label for="relative_mobile" class="is-required">Mobile
                                            Number</label>
                                        <input name="relative_mobile_2" type="number" class="form-control wizard-required"
                                               id="relative_mobile"
                                               required
                                               value="@if($user->relative_mobile_2){{$user->relative_mobile_2}}@endif">
                                        <small>eg: 077*******</small>
                                    </div>

                                </div>
                                <hr class="col-sm-11"/>
                                <div class="form-group custom-control custom-checkbox mt-3">
                                    <input name="is_committed" type="checkbox" class="custom-control-input wizard-required"
                                           id="is_committed"
                                           required
                                           autocomplete="off"
                                           @if($user->is_committed == 1 ) checked @endif>
                                    <label class="custom-control-label"  for="is_committed">I agree that I
                                        should be
                                        full-time dedicated to the
                                        academy for 7 months, 5 days a week, from 8:45 am to 6:00
                                        pm at the selected academy locations (Amman).<span class="mandatory-txt">*</span></label>
                                </div>
                                <div class="btncen2 d-flex justify-content-between mt-5 col-12 pl-0">
                                    <button
                                        class="form-wizard-previous-btn  mr-4 btn btn-secondary"
                                        type="button">Previous
                                    </button>
                                    <div class="d-flex justify-content-end">
                                        <a class="Go1 btn btn-sm-block btn-secondary mr-2 ml-2 personal_info_save1" href="{{route('client.dashboard')}}"
                                           type="submit">Go Home
                                        </a>
                                        <button
                                            class="personal_info_save4 border form-wizard-submit btn btn-primary "
                                            type="submit"> Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('assets/js/wizard.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.educational_status').click(() => {
                if ($(this).val('')) {
                    $('.educational_status').addClass('invalid');
                }
            })
        })
        $(document).ready(function () {
            $('.educational_level').click(() => {
                if ($(this).val('')) {
                    $('.educational_level').addClass('invalid');
                }
            })
        })
        $(document).ready(function () {
            $('.educational_background').click(() => {
                if ($(this).val('')) {
                    $('.educational_status').addClass('invalid');
                }
            })
        })
        $(".personal_info_save1").on("click", function () {
            if (document.getElementsByName('educational_level') != '' && document.getElementsByName('field') != '' && document.getElementsByName('educational_status') != '' && document.getElementsByName('educational_background') != ''){
                $.ajax({
                    url: "{{route('personal.information.step1.submit')}}",
                    type: "POST",
                    data: $('.personal-info-step1').serialize(),
                    success: function (res) {
                    },
                    error: function (err) {
                    }
                })
            }
        });
        $(".personal_info_save2").on("click", function (e) {
            $.ajax({
                url: "{{route('personal.information.step2.submit')}}",
                type: "POST",
                data: $('.personal-info-step2').serialize(),
                success: function (res) {
                },
                error: function (err) {
                }
            })

        });
        $(".personal_info_save3").on("click", function (e) {
            $.ajax({
                url: "{{route('personal.information.step3.submit')}}",
                type: "POST",
                data: $('.personal-info-step3').serialize(),
                success: function (res) {
                },
                error: function (err) {
                }
            })

        });

    </script>
@endsection
