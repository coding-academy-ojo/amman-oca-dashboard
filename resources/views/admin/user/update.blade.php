@extends('layouts.admin')
@section('title', 'Applicants Profile')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/pages/app-users.min.css') }}">
@endsection

@section('main')
    <section class="invoice-view-wrapper">
        <div class="row">
            <div class="col-xl-8 col-md-8 col-12">
                <div class="card invoice-print-area">
                    <div class="card-body pb-0 mx-25">
                        <!-- header section -->
                        <div class="card widget-user-details">
                            <div class="card-header d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h3 class="text-capitalize mb-1">{{ $user->en_first_name }} {{ $user->en_second_name }} {{ $user->en_third_name }} {{ $user->en_last_name }}</h3>
                                    <a href="/admin/users/{{ $user->id }}/destroy" class="btn btn-warning">Delete Application</a>
                                    <div class="card-subtitle pt-5">#{{ $user->id }}
                                        @php
                                            $resultBadge = [
                                                '1. Accepted – 1st Filtration – Orange' => 'success',
                                                '2. Maybe – 1st Filtration – Orange' => 'secondary',
                                                '3. Rejected – Age – Orange' => 'danger',
                                                '4. Rejected – 1st Filtration – Orange' => 'danger',
                                                '5. Accepted – Pre Final List – Simplon' => 'success',
                                                '6. Accepted – Final List – Simplon' => 'success',
                                                '7. Rejected – Test Result (Sololearn + English) - Simplon' => 'danger',
                                                '8. Rejected – Motivational Qs – Simplon' => 'danger',
                                                '9. Accepted – 50 Students After Interviews – Orange' => 'success',
                                                '10. Maybe – Final List After Interviews - Orange' => 'danger',
                                                '11. Rejected – Final List After Interviews - Orange' => 'danger'
                                            ];
                                        @endphp
                                        @if (isset($resultBadge[$user->result_1]))
                                            | <span class="badge badge-light-{{ $resultBadge[$user->result_1] }} mb-1">{{ $user->result_1 }}</span>
                                        @endif
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-danger mb-1 align-self-center" data-toggle="modal" data-target="#statusModal">Take Action</button>
                                <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="py-2 px-2 d-flex flex-column border-bottom">
                                                <h5 class="modal-title text-left" id="exampleModalLabel">Update Applicant Result</h5>
                                                <small class="text-left">#{{ $user->id }} | {{ $user->en_first_name }} {{ $user->en_last_name }}</small>
                                            </div>
                                            <form method="get" action="{{ route('users.status', ['id' => $user->id]) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="result_1" class="col-form-label">Result:</label>
                                                        <select class="form-control @error('result') is-invalid @enderror" id="result_1" name="result_1">
                                                            @foreach($resultBadge as $key => $badge)
                                                                @if ($key !== $user->result_1)
                                                                    <option value="{{ $key }}">{{ $key }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error('result')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-sunday-list" data-toggle="list" href="#list-sunday" role="tab" aria-selected="false">Personal Info</a>
                                <a class="list-group-item list-group-item-action" id="list-monday-list" data-toggle="list" href="#list-monday" role="tab" aria-selected="true">Questionnaire</a>
                                <a class="list-group-item list-group-item-action" id="list-tuesday-list" data-toggle="list" href="#list-tuesday" role="tab" aria-selected="false">English Quiz</a>
                                <a class="list-group-item list-group-item-action" id="list-wednesday-list" data-toggle="list" href="#list-wednesday" role="tab" aria-selected="false">Code Challenge</a>
                            </div>
                            <div class="tab-content text-justify">
                                <div class="tab-pane fade active show" id="list-sunday" role="tabpanel" aria-labelledby="list-sunday-list">
                                    <div class="d-flex justify-content-start align-items-center mb-2">
                                        <h4 class="mb-0">Personal Information</h4>
                                        @php
                                            $isCompleted = $user->educational_level && $user->educational_background && $user->ar_writing && $user->ar_speaking && $user->en_writing && $user->en_speaking && $user->city && $user->address && $user->relative_mobile_1 && $user->relative_relation_1 && $user->relative_mobile_2 && $user->relative_relation_2 && $user->is_committed;
                                            $isNotStarted = !$user->educational_level && !$user->educational_background && !$user->ar_writing && !$user->ar_speaking && !$user->en_writing && !$user->en_speaking && !$user->city && !$user->address && !$user->relative_mobile_1 && !$user->relative_relation_1 && !$user->relative_mobile_2 && !$user->relative_relation_2 && !$user->is_committed;
                                        @endphp
                                        @if($isCompleted)
                                            <div class="badge badge-pill badge-light-success ml-1">Completed</div>
                                        @elseif($isNotStarted)
                                            <div class="badge badge-pill badge-light-danger ml-1">Not Started</div>
                                        @else
                                            <div class="badge badge-pill badge-light-info ml-1">In Progress</div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12 mt-1">
                                            <div class="p-1 border">
                                                <h5 class="mb-2 border-bottom">Basic Information</h5>
                                                <h6 class="invoice-from">Full Name in English:</h6>
                                                <div class="mb-1">
                                                    <span class="text-capitalize">{{ $user->en_first_name }} {{ $user->en_second_name }} {{ $user->en_third_name }} {{ $user->en_last_name }}</span>
                                                </div>
                                                <h6 class="invoice-from">Full Name in Arabic:</h6>
                                                <div class="mb-1 d-flex justify-content-end">
                                                    <span>{{ $user->ar_first_name }} {{ $user->ar_second_name }} {{ $user->ar_third_name }} {{ $user->ar_last_name }}</span>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="invoice-from">Nationality:</h6>
                                                        <div class="mb-1">
                                                            @if($user->nationality == 1)
                                                                <span>Jordanian</span>
                                                            @elseif($user->nationality == 0)
                                                                <span>Not Jordanian</span>
                                                            @else
                                                                <span>_</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="invoice-from">Age:</h6>
                                                        <div class="mb-1">
                                                            {{ $age }}
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="invoice-from">Date of Birth:</h6>
                                                        <div class="mb-1">
                                                            @if($user->day)
                                                                <span>{{ $user->day }}/{{ $user->month }}/{{ $user->year }}</span>
                                                            @else
                                                                <span>_</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="invoice-from">Gender:</h6>
                                                        <div class="mb-1">
                                                            <span>Male</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 mt-2 p-1 border">
                                                <h5 class="mb-2 border-bottom">Relatives Information</h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="invoice-from">First Relation:</h6>
                                                        <div class="mb-1">
                                                            @if($user->relative_relation_1)
                                                                <span class="text-capitalize">{{ $user->relative_relation_1 }}</span>
                                                            @else
                                                                <span>_</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="invoice-from">Mobile Number:</h6>
                                                        <div class="mb-1">
                                                            @if($user->relative_mobile_1)
                                                                <span>{{ $user->relative_mobile_1 }}</span>
                                                            @else
                                                                <span>_</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="invoice-from">First Relative Name:</h6>
                                                        <div class="mb-1">
                                                            @if($user->fullName_1)
                                                                <span>{{ $user->fullName_1 }}</span>
                                                            @else
                                                                <span>_</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="invoice-from">Second Relation:</h6>
                                                        <div class="mb-1">
                                                            @if($user->relative_relation_2)
                                                                <span class="text-capitalize">{{ $user->relative_relation_2 }}</span>
                                                            @else
                                                                <span>_</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="invoice-from">Mobile Number:</h6>
                                                        <div class="mb-1">
                                                            @if($user->relative_mobile_2)
                                                                <span>{{ $user->relative_mobile_2 }}</span>
                                                            @else
                                                                <span>_</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="invoice-from">Second Relative Name:</h6>
                                                        <div class="mb-1">
                                                            @if($user->fullName_2)
                                                                <span>{{ $user->fullName_2 }}</span>
                                                            @else
                                                                <span>_</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 mt-2 p-1 border">
                                                <h5 class="mb-2 border-bottom">ID Image</h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <img class="img-fluid" src="/storage/{{ $user->id_img }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12 mt-1">
                                            <div class="p-1 border">
                                                <h5 class="mb-2 border-bottom">Educational Information</h5>
                                                <h6 class="invoice-from">Educational Background:</h6>
                                                <div class="mb-1">
                                                    @if($user->educational_background == 'non_it_background')
                                                        <span>Non IT Background</span>
                                                    @elseif($user->educational_background == 'it_background')
                                                        <span>IT Background</span>
                                                    @else
                                                        <span>_</span>
                                                    @endif
                                                </div>
                                                <h6 class="invoice-from">Educational Level:</h6>
                                                <div class="mb-1">
                                                    @php
                                                        $educationalLevels = [
                                                            'high_school' => 'High School',
                                                            'diploma' => 'Diploma',
                                                            'high_diploma' => 'High Diploma',
                                                            'bachelor' => 'Bachelor',
                                                            'master_degree' => 'Master Degree',
                                                            'ph.d.' => 'Ph.D'
                                                        ];
                                                    @endphp
                                                    <span>{{ $educationalLevels[$user->educational_level] ?? '_' }}</span>
                                                </div>
                                                <h5>University</h5>
                                                <div class="mt-1">{{ $user->university }}</div>
                                                <h5>Field</h5>
                                                <div class="mt-1">{{ $user->field }}</div>
                                            </div>
                                            <div class="mb-2 mt-2 border p-1">
                                                <h5 class="mb-2 border-bottom">Languages Information</h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="invoice-from">Arabic Speaking:</h6>
                                                        <div class="mb-1">
                                                            <span class="text-capitalize">{{ $user->ar_speaking ?? '_' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="invoice-from">Arabic Writing:</h6>
                                                        <div class="mb-1">
                                                            <span class="text-capitalize">{{ $user->ar_writing ?? '_' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="invoice-from">English Speaking:</h6>
                                                        <div class="mb-1">
                                                            <span class="text-capitalize">{{ $user->en_speaking ?? '_' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="invoice-from">English Writing:</h6>
                                                        <div class="mb-1">
                                                            <span class="text-capitalize">{{ $user->en_writing ?? '_' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 mt-2 p-1 border">
                                                <h5 class="mb-2 border-bottom">Commitment</h5>
                                                <div class="row d-flex justify-content-around">
                                                    <span class="invoice-from">Is committed:</span>
                                                    @if($user->is_committed)
                                                        <span class="invoice-from"><i class="fas fa-check text-success"></i></span>
                                                    @else
                                                        <span class="invoice-from"><i class="fas fa-times"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-2 mt-2 p-1 border">
                                                <h5 class="mb-2 border-bottom">Vaccination Certificate</h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <img class="img-fluid" src="/storage/{{ $user->vaccination_img }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-monday" role="tabpanel" aria-labelledby="list-monday-list">
                                    <div class="row">
                                        <section id="collapsible" class="col-lg-12">
                                            <div class="d-flex justify-content-start align-items-center mb-2">
                                                <h4 class="mb-0">Questionnaire</h4>
                                                <a class="btn btn-sm btn-warning" href="/admin/users/{{ $user->id }}/open-questionnaire">Open Questionnaire</a>
                                                @if($user->questionnaires->count() == App\Questionnaire::count())
                                                    <div class="badge badge-pill badge-light-success ml-1">Completed</div>
                                                @elseif($user->questionnaires->count() == 0)
                                                    <div class="badge badge-pill badge-light-danger ml-1">Not Started</div>
                                                @else
                                                    <div class="badge badge-pill badge-light-info ml-1">In Progress</div>
                                                @endif
                                            </div>
                                            <div class="collapsible">
                                                @foreach($questionnaires as $questionnaire)
                                                    <div class="card collapse-header">
                                                        <div id="headingCollapse{{ $loop->index }}" class="card-header collapsed" data-toggle="collapse" role="button" data-target="#collapse{{ $loop->index }}" aria-expanded="true" aria-controls="collapse{{ $loop->index }}">
                                                            <span class="collapse-title">{{ $questionnaire->questionnaire }}</span>
                                                        </div>
                                                        <div id="collapse{{ $loop->index }}" role="tabpanel" aria-labelledby="headingCollapse{{ $loop->index }}" class="collapse" style="">
                                                            <div class="card-body">
                                                                @if(!DB::table('questionnaire_user')->where('user_id', $user->id)->where('questionnaire_id', $questionnaire->id)->exists())
                                                                    Not Submitted Yet by Applicants
                                                                @else
                                                                    {{ DB::table('questionnaire_user')->where('user_id', $user->id)->where('questionnaire_id', $questionnaire->id)->first()->answer }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-tuesday" role="tabpanel" aria-labelledby="list-tuesday-list">
                                    <div class="d-flex justify-content-start align-items-center mb-2">
                                        <h4 class="mb-0">English Quiz</h4>
                                        <a class="btn btn-sm btn-warning" href="/admin/users/{{ $user->id }}/open-english-quiz">Open English Quiz</a>
                                        @if(App\EnglishQuiz::where('user_id', $user->id)->first() != null)
                                            <div class="badge badge-pill badge-light-success ml-1">Completed</div>
                                        @else
                                            <div class="badge badge-pill badge-light-danger ml-1">Not Submitted</div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div class="col-3">
                                                <div class="mr-1 mb-1">Score:
                                                    <span class="badge badge-pill badge-light-primary mr-1 mb-1">{{ $english_score }}</span>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="mr-1 mb-1">Account link:
                                                    @if($english_account_link == '_')
                                                        <a>{{ $english_account_link }}</a>
                                                    @else
                                                        <a href="{{ $english_account_link }}">{{ $english_account_link }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 my-2 d-flex justify-content-center">
                                            @if($english_score_image == '_')
                                                <h2>Not Submitted</h2>
                                            @else
                                                <div class="col-12 d-md-block d-none text-center align-self-center p-3">
                                                    <img class="img-fluid" src="{{ $english_score_image }}" alt="english quiz image">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-wednesday" role="tabpanel" aria-labelledby="list-wednesday-list">
                                    <div class="d-flex justify-content-start align-items-center mb-2">
                                        <h4 class="mb-0">Code Challenge</h4>
                                        <a class="btn btn-sm btn-warning" href="/admin/users/{{ $user->id }}/open-code-challenge">Open Code Challenge</a>
                                        @if(App\CodeChallenge::where('user_id', $user->id)->first() != null)
                                            <div class="badge badge-pill badge-light-success ml-1">Completed</div>
                                        @else
                                            <div class="badge badge-pill badge-light-danger ml-1">Not Submitted</div>
                                        @endif
                                    </div>
                                    <table>
                                        <tr>
                                            <td>HTML</td>
                                            <td>
                                                @if($html_certificate == ' ')
                                                    <h2>Not Submitted</h2>
                                                @else
                                                    <div class="col-md-12 d-md-block d-none text-center align-self-center p-3">
                                                        <img class="img-fluid" src="{{ $html_certificate }}" alt="code challenge image">
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CSS</td>
                                            <td>
                                                @if($css_certificate == ' ')
                                                    <h2>Not Submitted</h2>
                                                @else
                                                    <div class="col-md-12 d-md-block d-none text-center align-self-center p-3">
                                                        <img class="img-fluid" src="{{ $css_certificate }}" alt="code challenge image">
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>JS</td>
                                            <td>
                                                @if($js_certificate == ' ')
                                                    <h2>Not Submitted</h2>
                                                @else
                                                    <div class="col-md-12 d-md-block d-none text-center align-self-center p-3">
                                                        <img class="img-fluid" src="{{ $js_certificate }}" alt="code challenge image">
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="card widget-todo">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h4 class="card-title d-flex">Application Status</h4>
                        @php
                            $statusBadge = [
                                'in_progress' => 'warning',
                                'submitted' => 'info',
                                'accepted' => 'success',
                                'rejected' => 'danger',
                                '1. Accepted – 1st Filtration – Orange' => 'success',
                                '2. Maybe – 1st Filtration – Orange' => 'secondary',
                                '3. Rejected – Age – Orange' => 'danger',
                                '4. Rejected – 1st Filtration – Orange' => 'danger',
                                '5. Accepted – Pre Final List – Simplon' => 'success',
                                '6. Accepted – Final List – Simplon' => 'success',
                                '7. Rejected – Test Result (Sololearn + English) - Simplon' => 'danger',
                                '8. Rejected – Motivational Qs – Simplon' => 'danger',
                                '9. Accepted – 50 Students After Interviews – Orange' => 'success',
                                '10. Maybe – Final List After Interviews - Orange' => 'secondary',
                                '11. Rejected – Final List After Interviews - Orange' => 'danger'
                            ];
                        @endphp
                        @if (isset($statusBadge[$user->status]))
                            <span class="badge badge-light-{{ $statusBadge[$user->status] }}">{{ $user->status }}</span>
                        @endif
                    </div>
                </div>
                <div id="table-statistics-two">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h5 class="card-title">Contact Information</h5>
                            <div class="heading-elements">
                                <i class="bx bx-dots-horizontal-rounded font-medium-3 align-middle"></i>
                            </div>
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="/storage/{{ $user->personal_img }}" alt="">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover mb-0">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center text-bold-500">
                                            <i class="text-success bx bx-envelope align-middle font-medium-5 mr-50"></i>Email: &nbsp {{ $user->email }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center text-bold-500">
                                            <i class="text-danger bx bx-phone align-middle font-medium-5 mr-50"></i>Mobile: &nbsp {{ $user->mobile }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center text-bold-500 text-capitalize">
                                            <i class="text-secondary bx bx-map align-middle font-medium-5 mr-50"></i>City: @if($user->city) &nbsp {{ $user->city }} @else _ @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center text-bold-500 text-capitalize">
                                            <i class="text-warning bx bxs-traffic align-middle font-medium-5 mr-50"></i>Address: @if($user->address) &nbsp {{ $user->address }} @else _ @endif
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/js/scripts/pages/app-users.min.js') }}"></script>
@endsection
