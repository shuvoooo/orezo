@extends("layouts.admin-base")

@section("title", "Client Details")


@section('content')
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Personal Details
                </div>
                <div class="card-body">
                    @if($personal_information)
                        <input type="hidden" name="id" value="{{$personal_information->id}}">
                    @endif

                    <div class="control-group">
                        <label for="cname" class="control-label text-dark">First Name :</label>
                        <div class="controls">
                            {{$personal_information->fname ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="cemail" class="control-label text-dark">Middle Name :</label>
                        <div class="controls">
                            {{$personal_information->mname ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="curl" class="control-label text-dark">Last Name :</label>
                        <div class="controls">
                            {{$personal_information->lname ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="curl" class="control-label text-dark">Are you insurance covered?</label>
                        <div class="controls">
                            {{$personal_information->insurance_covered ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Date Of Birth :</label>
                        <div class="controls">
                            {{$personal_information->date_of_birth ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">SSN:</label>
                        <div class="controls">
                            {{$personal_information->ssn ?? ''}}
                        </div>
                    </div>
                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Marital Status :</label>
                        <div class="controls">
                            {{$personal_information->marital_status ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Occupation :</label>
                        <div class="controls">
                            {{$personal_information->occupation ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Street No.:</label>
                        <div class="controls">
                            {{$personal_information->street_no ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Apartment No.:</label>
                        <div class="controls">
                            {{$personal_information->apartment_no ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Zip Code:</label>
                        <div class="controls">
                            {{$personal_information->zip_code ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">City :</label>
                        <div class="controls">
                            {{$personal_information->city ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">State:</label>
                        <div class="controls">
                            {{$personal_information->state ?? ''}}


                        </div>
                    </div>
                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Country:</label>
                        <div class="controls">
                            {{$personal_information->country ?? ''}}

                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Mobile Number:</label>
                        <div class="controls">
                            {{$personal_information->mobile ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Work Number:</label>
                        <div class="controls">
                            {{$personal_information->work ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Email Id:</label>
                        <div class="controls">
                            {{$personal_information->email ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Visa Status:</label>
                        <div class="controls">
                            {{$personal_information->visa_status ?? ''}}
                        </div>
                    </div>

                    <div class="control-group ">
                        <label for="ccomment" class="control-label text-dark">Date Of Entry in US :</label>
                        <div class="controls">
                            {{$personal_information->date_of_entry_in_us ?? ''}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Personal Details
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
