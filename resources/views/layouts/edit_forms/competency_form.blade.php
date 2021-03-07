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
                @if(isset($data['member_bio_data']))
                   $(document).ready(function () {
                        @foreach($data['member_bio_data']->MemberCompetencies as $x)
                        @if($x->Competency->custom)
                        $("#other_competencies").append($('<option>', {value: '{{ $x->Competency->description }}', selected: true, text: '{{ $x->Competency->description }}'}));
                        @endif
                        @endforeach
                        custom_competencies = $("#other_competencies").val();
                });
                @endif

                $("#other_competencies").on("select2:select", function(e) {
                    changeCompetencies();
                }).on("select2:unselect", function (e) {
                    changeCompetencies();
                });

                function changeCompetencies(){
                    var scope = angular.element("#other_competencies").scope();
                    var $this = $("#other_competencies");
                    custom_competencies.forEach(function (element) {
                        var index = scope.competencies.indexOf(element);
                        if(index >= 0)
                            scope.competencies.splice(index, 1);
                    });
                    $this.val().forEach(function(element) {
                        var index = scope.competencies.indexOf(element);
                        if(index < 0)
                            scope.competencies.push(element);
                    });
                }
            </script>
        <script>
            var custom_sectors = [];
            @if(isset($data['member_bio_data']))
            $(document).ready(function () {
                @foreach($data['member_bio_data']->MemberIndustrySectors as $x)
                @if($x->IndustrySector->custom)
                $("#other_sectors").append($('<option>', {value: '{{ $x->IndustrySector->description }}', selected: true, text: '{{ $x->IndustrySector->description }}'}));
                @endif
                        @endforeach
                        custom_sectors = $("#other_sectors").val();
            });

            @endif
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
                    var index = scope.sectors.indexOf(element);
                    if(index >= 0)
                        scope.sectors.splice(index, 1);
                });
                $this.val().forEach(function(element) {
                    var index = scope.sectors.indexOf(element);
                    if(index < 0)
                        scope.sectors.push(element);
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
                        @if(isset($data['member_bio_data']))
                   $(document).ready(function () {
                    @foreach($data['member_bio_data']->MemberIndustrySectors as $x)
                    @if($x->IndustrySector->custom)
                    $("#other_sectors").append($('<option>', {value: '{{ $x->IndustrySector->description }}', selected: true, text: '{{ $x->IndustrySector->description }}'}));
                    @endif
                    @endforeach
                            custom_sectors = $("#other_sectors").val();
                });

                @endif
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
                        var index = scope.sectors.indexOf(element);
                        if(index >= 0)
                            scope.sectors.splice(index, 1);
                    });
                    $this.val().forEach(function(element) {
                        var index = scope.sectors.indexOf(element);
                        if(index < 0)
                            scope.sectors.push(element);
                    });
                }
            </script>
        </div>
    </div>
</div>
