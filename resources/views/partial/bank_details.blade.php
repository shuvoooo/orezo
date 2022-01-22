<div class="card">
    <div class="card-header">
        Bank Details
    </div>
    <div class="card-body">


        <div class="control-group">
            <label for="cname" class="control-label">Bank Account Number:</label>
            <div class="controls">
            <!-- <input class="span12 "  name="account_number" type="text" value="{{$bank_detail->account_number??''}}" required /> -->
                {{$bank_detail->account_number??''}}
            </div>
        </div>

        <div class="control-group ">
            <label for="cemail" class="control-label">Bank Name :</label>
            <div class="controls">
            <!-- <input class="span12"  type="text" name="name" value="{{$bank_detail->name??''}}" required /> -->
                {{$bank_detail->name??''}}
            </div>
        </div>

        <div class="control-group ">
            <label for="curl" class="control-label">Account Holder Name :</label>
            <div class="controls">
                {{$bank_detail->account_holder_name??''}}
            </div>
        </div>

        <div class="control-group ">
            <label for="ccomment" class="control-label">Routing number:</label>
            <div class="controls">
                {{$bank_detail->routing_number??''}}
            </div>
        </div>

        <div class="control-group ">
            <label for="ccomment" class="control-label">Account Type:</label>
            <div class="controls">
                {{$bank_detail->account_type??''}}
            </div>
        </div>

    </div>
</div>
