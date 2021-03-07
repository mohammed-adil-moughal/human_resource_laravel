<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="address">Address:<span style="color: #f40000">*</span></label>
            <input type="text" limit-to="250" class="form-control" id="address" required="required" name="Address" ng-model="memberData.Address" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="address_2">Address 2:<small class="text-muted">(optional)</small></label>
            <input type="address_2" limit-to="250" class="form-control" id="address_2" ng-model="memberData.Address_2" name="address_2">
        </div>
    </div>
</div>
<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="city">City/Town:<span style="color: #f40000">*</span></label>
            <input list="cities" type="text" ng-change="getapi('cities', 'http://api.geonames.org/searchJSON?q='+memberData.City+'&username=demo')" class="form-control" id="city" required="required" ng-model="memberData.City" name="city">
            <datalist id="cities">
                <option ng-repeat="city in cities.geonames" ng-bind="city.name" ng-value="city.name"></option>
            </datalist>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="post_code">Post Code:<span style="color: #f40000">*</span></label>
            <input type="text" limit-to="250" class="form-control" id="post_code" required="required" ng-model="memberData.Post_Code" name="post_code">
        </div>
    </div>
</div>
<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="fax_no">Fax Number:<small class="text-muted">(optional)</small></label>
            <input type="text" limit-to="250" class="form-control" id="fax_no" ng-model="memberData.Fax_No" name="fax_no">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="mobile_no">Mobile Number:<span style="color: #f40000">*</span></label>
            <input type="text"   limit-to="12"  class="form-control" id="mobile_no" required="required" ng-model="memberData.Mobile_No" name="Mobile_No">
        </div>
    </div>
</div>
<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="website">Website:<small class="text-muted">(optional)</small></label>
            <input type="text" limit-to="250" class="form-control" id="website" name="website" ng-model="memberData.Home_Page" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" >
            <label for="contact">Contact:<small class="text-muted">(optional)</small></label>
            <input type="text" limit-to="250" class="form-control" id="contact" ng-model="memberData.Contact" name="contact">

        </div>
    </div>
</div>

<hr class="separator col-md-12">

<div class="col-md-12 padding-0">
    <div class="col-md-6">
        <div class="form-group">
            <label for="referee_name">Referee Name:<small class="text-muted">(optional)</small></label>
            <input type="text" limit-to="250" class="form-control" id="referee_name" name="referee_name" ng-model="memberData.Referee_Name" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="referee_address" >
            <label for="referee_address">Referee Address:<small class="text-muted">(optional)</small></label>
            <input type="text" limit-to="250" class="form-control" id="referee_address" ng-model="memberData.Referee_Address" name="referee_address">

        </div>
    </div>
</div>
<div class="col-md-12 padding-0">
    <div class="col-md-6">
        <div class="form-group">
            <label for="referee_telephone">Referee Telephone:<small class="text-muted">(optional)</small></label>
            <input type="text" limit-to="250" class="form-control" id="referee_telephone" name="referee_telephone" ng-model="memberData.Referee_Telephone" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" >
            <label for="referee_email">Referee Email:<small class="text-muted">(optional)</small></label>
            <input type="email" limit-to="250" class="form-control" id="referee_email" ng-model="memberData.referee_email" name="Referee_Email">

        </div>
    </div>
</div>
