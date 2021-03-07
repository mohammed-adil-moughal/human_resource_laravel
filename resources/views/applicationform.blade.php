<style>
    * {
        color: #333;
        font-size: 95%;
    }

    div {
        font-family: sans-serif;
    }

    h1, h3, h4 {
        font-family: "Times New Roman", serif;
        font-size: 100%;
    }

    h3 {
        font-weight: 500;
        font-size: xx-large;
        font-family: sans-serif;
    }

    .page-break {
        page-break-inside: avoid;
    }

    ol, ul {
        padding-left: 4%;
    }

    .bold {
        font-weight: bold;
    }

    .form-table {
        width: 100%;
        border-collapse: separate;
        border: none !important;
        border-bottom: 0 !important;
        margin-bottom: 4px !important;
    }

    .form-table td {
        border: none;
    }

    .form-table td.entry {
        border-bottom: dotted 1px #333;
        text-transform: uppercase;
    }

    .form-table td.entry-lable {
        width: 1%;
        white-space: nowrap;
    }

    table {
        border-collapse: collapse;
        margin-bottom: 20px;
        width: 100%;
    }

    table, th, td {
        border: 1px solid #333;
        font-size: 80% !important;
    }

    td {
        padding: 4px;

    }

    tr > div{

        height: 100px;
    }
    hr {
        border: none;
        background-color: #909090;
        height: 1px;
        margin: 20px auto;
    }


</style>

<div class="row">
    <div style="float: left">
        <img src="{{ @$logo }}" style="margin-top: -20px; width: 70px; height: 70px">
    </div>
    <div style="float: right;margin-top: -20px;margin-left:20px">

        <h2 style="text-align: center; font-size: 110%;">KENYA INSTITUTE OF SUPPLIES MANAGEMENT</h2>
        <h2 style="text-align: center; font-size: 110%">APPLICATION FOR REGISTRATION</h2>
        <h3 style="margin-bottom: 5px;">To: The Registrar, Kenya Institute of Supplies Management, P O Box
            30400-00100, Nairobi</h3>
        <i><b style="font-size: 75%;">Please complete this Form in BLOCK CAPITALS. All parts must be completed and the
                declaration at Section D
                signed.</b></i>
        <b>Section A - Personal particulars</b>
        <ol>
            <li>
                <table class="form-table">
                    <tr>
                        <td style="width: 20px">Surname:</td>
                        <td class="entry">{{ @$member['Surname'] }}</td>
                        <td style="width: 20px">Title:</td>
                        <td class="entry" style="width: 40px;">{{ @$member['Gender'] == 0? 'Mr.' : 'Ms.' }}</td>
                        <td style="width: 20px">Forenames:</td>
                        <td class="entry">{{ @$member['Other_Names'] }}</td>
                    </tr>
                </table>
            </li>
            <li>
                <table class="form-table">
                    <tr>
                        <td class="entry-lable">Postal Address:</td>
                        <td class="entry">{{ @$member['Address'] }}</td>
                    </tr>
                </table>
            </li>
            <li>
                <table class="form-table">
                    <tr>
                        <td class="entry-lable">Telephone Numbers: Office:</td>
                        <td class="entry"></td>
                        <td class="entry-lable">Cell:</td>
                        <td class="entry">{{ @$member['Mobile_No'] }}</td>
                        <td class="entry-lable">Home:</td>
                        <td class="entry">{{ @$member['Phone_Number'] }}</td>

                    </tr>
                </table>
            </li>
            <li>
                <table class="form-table">
                    <tr>
                        <td class="entry-lable">Email Address:</td>
                        <td class="entry">{{ @$member['E_mail'] }}</td>
                    </tr>
                </table>
            <li>
                <?php
                $date = date_create($member['Date_Of_Birth']);
                ?>
                <table class="form-table">
                    <tr>
                        <td class="entry-lable">Date Of Birth:</td>
                        <td class="entry">{{ date_format($date, 'Y-m-d') }}</td>
                        <td class="entry-lable">Nationality:</td>
                        <td class="entry">{{ @$member['Nationality'] }}</td>
                        <td class="entry-lable">Resident of:</td>
                        <td class="entry">{{ @$member['County'] }}</td>
                    </tr>
                </table>
            </li>
            <li>
                <table class="form-table">
                    <tr>
                        <td class="entry-lable">Previous applications for KISM membership:</td>
                        <td class="entry-lable">Date:</td>
                        <td class="entry"></td>
                        <td class="entry-lable">KISM NO:</td>
                        <td class="entry"></td>
                    </tr>
                </table>
            </li>
            <li>
                <table class="form-table">
                    <tr>
                        <td class="entry-lable">I enclose a cheque/banker cheque/cash/money order for Ksh</td>
                        <td class="entry"></td>
                        <td class="entry-lable">as my fee,which I understand is not refundable.</td>
                    </tr>
                </table>
            </li>
            <li>
                <table class="form-table">
                    <tr>
                        <td class="entry-lable">I hereby apply to have my name entered in the Register: Signed</td>
                        <td class="entry"></td>
                        <td class="entry-lable">Date:</td>
                        <td class="entry" style="width: 5%;"></td>
                        <td class="entry-lable">/</td>
                        <td class="entry" style="width: 5%;"></td>
                        <td class="entry-lable">/</td>
                        <td class="entry" style="width: 5%;"></td>
                    </tr>
                </table>
            </li>
        </ol>
        <!--      SECTION B-->
        <hr>
        <div class="page-break">
            <b>Section B - Educational particulars</b>

            <!--      FORMAL EDUCATION TABLE-->
            <p><b> 1)Formal Education</b></p>
            <table class="table table-bordered">

                    <tr>
                        <th>School/University</th>
                        <th>From</th>
                        <th>To</th>
                        <th colspan="3">
                            Examinations Passed
                        </th>
                    </tr>
                    <tr>
                        <th style="background-color: gray"></th>
                        <th style="background-color: gray"></th>
                        <th style="background-color: gray"></th>

                        <th>Name of Body</th>
                        <th>Degree/Diploma</th>
                        <th>Class/Division</th>

                    </tr>
                @foreach((@$member['academics']? @$member['academics']: array() ) as $x)
                    <tr>
                        <td>{{ @$x['Institution'] }}</td>
                        <td>{{ @$x['From_Date'] }}</td>
                        <td>{{ @$x['To_Date'] }}</td>
                        <td>{{ @$x['Institution'] }}</td>
                        <td>{{ @$x['Qualification_Description'] }}</td>
                        <td>{{ @$x['Grade_Level_Attained'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <!--        PROCUREMENT TABLE-->
        <div class="page-break">
            <p><b> 2)Professional Procurement and Supply Chain Management</b></p>
            <table class="table table-bordered">
                    <tr>
                        <th>Name of Examining Body</th>
                        <th>Registration Number</th>
                        <th>Sections/Stages/Parts Passed</th>
                        <th>Date Passed</th>
                        <th>Remarks</th>

                    </tr>
                @foreach( (@$member['prof_qualifications']? @$member['prof_qualifications']:array())  as $x)
                    <tr>
                        <td>{{ @$x['Name_of_Body'] }}</td>
                        <td>{{ @$x['Registration_No'] }}</td>
                        <td>{{ @$x['Stages_Sections_Modules'] }}</td>
                        <td>{{ @$x['Date_Passed'] }}</td>
                        <td>{{ @$x['Description'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <hr>
        <!--      For official use only-->
        <div class="page-break">
            <div><b>FOR OFFICIAL USE ONLY</b></div>
            <div>
                <table class="form-table">
                    <tr class="bold">
                        <td class="entry-lable">Application No</td>
                        <td class="entry"></td>
                        <td class="entry-lable">Date Received</td>
                        <td class="entry" style="width: 5%;"></td>
                        <td class="entry-lable">/</td>
                        <td class="entry" style="width: 5%;"></td>
                        <td class="entry-lable">/</td>
                        <td class="entry" style="width: 5%;"></td>
                        <td class="entry-lable">Date Acknowledged</td>
                        <td class="entry" style="width: 5%;"></td>
                        <td class="entry-lable">/</td>
                        <td class="entry" style="width: 5%;"></td>
                        <td class="entry-lable">/</td>
                        <td class="entry" style="width: 5%;"></td>
                    </tr>
                </table>
                <table class="form-table">
                    <tr>
                        <td class="entry-lable">Receipt No</td>
                        <td class="entry"></td>
                        <td class="entry-lable">Deferred Minutes No</td>
                        <td class="entry"></td>
                        <td class="entry-lable">Decision Minute No</td>
                        <td class="entry"></td>
                        <td class="entry-lable">Registration</td>
                        <td class="entry"></td>
                    </tr>
                </table>
                <table class="form-table">
                    <tr>
                        <td class="entry-lable">Notification sent</td>
                        <td class="entry"></td>
                        <td class="entry-lable">Certificate Dispatched</td>
                        <td class="entry" style="width: 5%;"></td>
                        <td class="entry-lable">/</td>
                        <td class="entry" style="width: 5%;"></td>
                        <td class="entry-lable">/</td>
                        <td class="entry" style="width: 5%;"></td>
                    </tr>
                </table>

            </div>
        </div>
        <hr>

        <!--    Section C -->
        <div class="page-break">
            <br><b>Section C - Employment related particulars</b>

            <!--   Trainning and continuous proffessional developments-->
            <p><b> 1)Training and Continuous Professional Development</b></p>
            <table class="table table-bordered">
                    <tr>
                        <th>Name and Address of Organisation</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Title of Training</th>

                    </tr>
                @foreach((@$member['training']? @$member['training'] : array() ) as $x)
                    <tr>
                        <td>{{ @$x['Organization_Company'] }}</td>
                        <td>{{ @$x['From'] }}</td>
                        <td>{{ @$x['To'] }}</td>
                        <td>{{ @$x['Name'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!--    Professional Experience and Employment-->

        <div class="page-break">
            <p><b>2)Professional Experience and Employment History</b></p>
            <table class="table table-bordered">
                    <tr>
                        <th>Name and Address of Organisation</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Position Held</th>
                        <th>Tasks Performed</th>
                    </tr>
                @foreach((@$member['experience']? @$member['experience'] : array()) as $x)
                    <tr>
                        <td>{{ @$x['Name_of_Firm'] }}</td>
                        <td>{{ @$x['From_Date'] }}</td>
                        <td>{{ @$x['To_Date'] }}</td>
                        <td>{{ @$x['Position_Held'] }}</td>
                        <td>{{ @$x['Tasks_Performed'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!--  Honours and Distinctions Received/Recent Relevant publications Authored/Seminars Present-->
        <div class="page-break">
            <div><b> 3)Honours and Distinctions Received/Recent Relevant publications Authored/Seminars Present</b>
            </div>
            <hr>
            <hr>
            <hr>
            <hr>
            <hr>
        </div>
        <!--    Section D -->
        <br>
        <div class="page-break"><b>Section D - Declaration: </b>I hereby declare that the foregoing statements are true
            in every respect
            and that none of the disqualifications listed in Sections 16(4) of the Supplies Procurement Management Act
            2007 apply to me.I acknowledge that any statement contained anywhere in this form which is known by me to be
            false shall invalidate this application and any decision reached thereon by he Registration Commitee.I have
            read the Supplies Practitioners Management Act 2007.I am Aware of the penalties stipulated in The Act and I
            understand that,if Registered,I shall bre bound thereby and by any amendments thereto and to the regulations
            made under the Act so long as my name appears in the Register.I attach details of my criminal convict,if
            any,and subsequent penalties on a separate sheet
        </div>
        <div class="page-break">
            <table class="form-table">
                <tr>
                    <td class="entry-lable">Date</td>
                    <td class="entry" style="width: 5%;"></td>
                    <td class="entry-lable">/</td>
                    <td class="entry" style="width: 5%;"></td>
                    <td class="entry-lable">/</td>
                    <td class="entry" style="width: 5%;"></td>
                    <td></td>
                    <td class="entry-lable">Applicants Signature</td>
                    <td class="entry"></td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="page-break">
            <table class="form-table">
                <tr>
                    <td class="entry-lable">Signed by ChairPerson of Registration Committee:</td>
                    <td class="entry"></td>
                    <td></td>
                    <td class="entry-lable">Signed By Registrar:</td>
                    <td class="entry"></td>
                </tr>
            </table>
            <table class="form-table">
                <tr>
                    <td class="entry-lable">Date:</td>
                    <td class="entry" style="width: 5%;"></td>
                    <td class="entry-lable">/</td>
                    <td class="entry" style="width: 5%;"></td>
                    <td class="entry-lable">/</td>
                    <td class="entry" style="width: 5%;"></td>
                    <td></td>
                    <td class="entry-lable">Date:</td>
                    <td class="entry" style="width: 5%;"></td>
                    <td class="entry-lable">/</td>
                    <td class="entry" style="width: 5%;"></td>
                    <td class="entry-lable">/</td>
                    <td class="entry" style="width: 5%;"></td>
                </tr>
            </table>
        </div>
    </div>
</div>
