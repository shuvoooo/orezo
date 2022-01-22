<div class="card">
    <div class="card-header">
        Spouse Details
    </div>
    <div class="card-body">

        <div class="control-group">
            <table id="ctl00_ContentPlaceHolder1_tblYesNo" width="100%">
                <tbody>
                <tr>
                    <td style="padding-left:4px; width:250px">Are you Married? :</td>
                    <td>
                        {{$spouse_information->marital_status ?? ''}}
                    </td>
                </tr>

                </tbody>
            </table>

        </div>
        @if($user->spouse==1)
            <div class="control-group">
                <label for="cname" class="control-label">First Name :</label>
                <div class="controls">
                    {{$spouse_information->fname ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="cemail" class="control-label">Middle Name :</label>
                <div class="controls">
                    {{$spouse_information->mname ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="curl" class="control-label">Last Name :</label>
                <div class="controls">
                    {{$spouse_information->lname ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">Date Of Birth :</label>
                <div class="controls">
                    {{$spouse_information->date_of_birth ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">SSN/ITIN:</label>
                <div class="controls">
                    {{$spouse_information->ssn ?? ''}}
                </div>
            </div>


            <div class="control-group ">
                <label for="ccomment" class="control-label">Occupation :</label>
                <div class="controls">
                    {{$spouse_information->occupation ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">Street No.:</label>
                <div class="controls">
                    {{$spouse_information->street_no ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">Apartment No.:</label>
                <div class="controls">
                    {{$spouse_information->apartment_no ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">Zip Code:</label>
                <div class="controls">
                    {{$spouse_information->zip_code ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">City :</label>
                <div class="controls">
                    {{$spouse_information->city ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">State:</label>
                <div class="controls">
                    {{$spouse_information->state ?? ''}}

                </div>
            </div>
            <div class="control-group ">
                <label for="ccomment" class="control-label">Country:</label>
                <div class="controls">
                    {{$spouse_information->country ?? ''}}

                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">Mobile Number:</label>
                <div class="controls">
                    {{$spouse_information->mobile ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">Work Number:</label>
                <div class="controls">
                    {{$spouse_information->work ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">Email Id:</label>
                <div class="controls">
                    {{$spouse_information->email ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">Visa Status:</label>
                <div class="controls">
                    {{$spouse_information->visa_status ?? ''}}
                </div>
            </div>

            <div class="control-group ">
                <label for="ccomment" class="control-label">Date Of Entry in US :</label>
                <div class="controls">
                    {{$spouse_information->date_of_entry_in_us ?? ''}}
                </div>
            </div>

        @endif
    </div>
</div>
