@extends('layouts.signup_forms')

@section('steps')
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Basic')"><span class="badge  badge-success">1</span>Basic Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Contact')"><span class="badge badge-success">2</span>Contact Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Academic')"><span class="badge badge-success">3</span>Academic Information<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete" style="z-index: auto"><a href="#" class="complete" ng-click="getView('ProfQualifications')"><span class="badge badge-success">4</span>Professional Qualifications<span style="z-index: 999" class="chevron"></span></a></li>
    </ul>
    <ul class="col-xs-6 no-margin">
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Training')"><span class="badge badge-success">5</span>Training<span class="chevron"></span></a></li>
        <li class="col-xs-3 complete"><a href="#" class="complete" ng-click="getView('Experience')"><span class="badge badge-success">6</span>Experience<span class="chevron"></span></a></li>
        <li class="col-xs-3 active"><span class="badge badge-info">7</span>Competency<span class="chevron"></span></li>
        <li class="col-xs-3"><span class="badge">8</span>Payment</li>
    </ul>
@stop
@section('form-header') Competencies @stop
@section('signup_form')
    <script type="text/javascript">
        $(".js-example-tokenizer").select2({
            tags: true,
            tokenSeparators: [','],
            width: '50%',
        });
    </script>
    <form class="signup-form-container" ng-submit="getView('Payment')">
        <link rel="stylesheet" href="{{ asset('/vendor/css/select2/select2.min.css') }}"/>
        <script>
            String.prototype.toTitleCase =  function (str)
            {
                return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
            }
        </script>
        <div class="col-md-12">
            <script type="text/javascript">
                $(".js-example-tokenizer").select2({
                    tags: true,
                    tokenSeparators: [','],
                    width: "50%"
                });
            </script>
            <h4 class="row">Tick all the skills you are competent in:</h4>
            <div class="row" ng-init="getData('competency_areas', 'competencies')">
                <div class="col-lg-4"  ng-repeat="competency_area in competency_areas">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" value="<% competency_area.code  %>"  ng-checked="checked( competency_area.code , 'competencies')" ng-click="changeCheckbox(competency_area.code , 'competencies')" class="form-check-input">
                            <span ng-bind="competency_area.description.toTitleCase()" ></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <label class="form-check-label">Other Competencies<small class="text-muted">{!! '&nbsp;' !!}(separated by commas)</small> :</label>
                <select class="js-example-tokenizer form-control"  ng-model="custom_competencies" id="other_competencies" multiple="" tabindex="-1" aria-hidden="true">
                </select>
                <script>
                    var custom_competencies = [];

                    $("#other_competencies").on("select2:select", function(e) {
                        changeCompetencies();
                    }).on("select2:unselect", function (e) {
                        changeCompetencies();
                    });

                    function changeCompetencies(){
                        var scope = angular.element("#other_competencies").scope();
                        var $this = $("#other_competencies");
                        custom_competencies.forEach(function (element) {
                            var index = scope.memberData.competencies.indexOf(element);
                            if(index >= 0)
                                scope.memberData.competencies.splice(index, 1);
                        });
                        $this.val().forEach(function(element) {
                            var index = scope.memberData.competencies.indexOf(element);
                            if(index < 0)
                                scope.memberData.competencies.push(element);
                        });
                    }
                </script>
            </div>
        </div>
        <hr class="col-md-12 separator "/>
        <div class="col-md-12">
            <h4 class="row ">Tick all the sectors you have worked in:</h4>
            <div class="row" ng-init="getData('industry_sectors', 'industry_sectors')">
                <div ng-repeat="industry_sector in industry_sectors" ng-show="industry_sector.description !== null" class="col-lg-4">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" ng-checked="checked(industry_sector.code, 'sectors')"  value="<%industry_sector.code %>" ng-click="changeCheckbox(industry_sector.code,'sectors')" class="form-check-input">
                            <span ng-bind="industry_sector.description.toString().toTitleCase()"/>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <div>Other Sectors<small class="text-muted">{!! '&nbsp;' !!}(separated by commas)</small> :</div>
                <div>
                    <select class="js-example-tokenizer form-control " id="other_sectors" multiple="" tabindex="-1"  aria-hidden="true">
                    </select>
                    <script>
                        var custom_sectors = [];
                        $("#other_sectors").on("change", function() {
                            changeSectors();
                        }).on("select2:unselect", function (event) {
                            changeSectors();
                        });

                        function changeSectors() {
                            var scope = angular.element("#other_sectors").scope();
                            var $this =   $("#other_sectors");
                            console.log($this.val());
                            console.log(custom_sectors);
                            custom_sectors.forEach(function (element) {
                                var index = scope.memberData.sectors.indexOf(element);
                                if(index >= 0)
                                    scope.memberData.sectors.splice(index, 1);
                            });
                            $this.val().forEach(function(element) {
                                var index = scope.memberData.sectors.indexOf(element);
                                if(index < 0)
                                    scope.memberData.sectors.push(element);
                            });
                        }
                    </script>
                </div>
            </div>
        </div>

        <hr class="col-md-12 separator "/>
        <div class="col-xs-12">
            <div class="col-xs-6 padding-0"><a href="#" ng-click="getView('Experience')" class="btn btn-proceed"><< Back</a></div>
            <div class="text-right col-xs-6 padding-0"><button type="submit" class="btn btn-proceed"> Proceed >></button></div>
        </div>
    </form>
@stop