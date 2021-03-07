<html>
    <head></head>
    <body>
        <style>
            * {
                color: #333;
                font-size: 95%;
            }

            .all-small, .all-small *{
                font-size: 0.95em;
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

            .table, .table  th, .table  td {
                border: 1px solid #333;
                font-size: 80% !important;
            }

            .table  td {
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
        <div>
            <div>
                <br><i>Cambrian Building|Moi Avenue|P.O.Box 30400-00100 NBI,kenya e-mail:admin@kism.or.ke</i>
                <i>Tel:+254(20)2213908/9/10;(020)3505992 Fax:2213911;Mobile:0721-244828</i>
            </div>
            <hr>
            <div>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                SERIAL NO.
                            </td>
                            <td>
                                V.A.T NO:0126071V
                            </td>
                            <td>
                                PIN NO:P05114741N
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <b><i> PROFORMA INVOICE</i></b>
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <b><i> DATE:<?php echo date('Y-m-d'); ?></i></b>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            </div>
            <div>
                <p><b> TO: {{$delegates-> Company_Name }}</b></p>
                <table>
                    <tbody>
                        <tr>
                            <td>Name:{{$delegates->Contact_Person}}</td>
                            <td>KRA-PIN: {{ $delegates->PIN_Registration_No }}</td>

                        </tr>
                        <tr>
                            <td>Tel:{{$delegates-> Office_Line}}</td>
                            <td>Email: {{ $delegates->Contact_Email }}</td>
                        </tr>
                    </tbody>  
                </table>
            </div>  
            <div>Subject:{{$delegates->Event->Event_Name}}</div>
            <div>
                <div >WORKSHOP  FEES  FOR THE FOLLOWING;</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Names</th>
                            <th>Member_No</th>
                            <th>Mobile</th>
                            <th>Cost ( {{$currency}} )</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($delegates->Delegates as $x)
                        <tr><td>{{$x->Names}}</td>
                            <td>{{$x->Member_No or "--"}}</td>
                            <td>{{$x->Mobile}}</td>
                            <td><?php echo number_format($x->Cost, 2); ?></td>
                        </tr>
                        @endforeach
                        <tr>
                            <th>Gross Total ( {{$currency}} )</th>
                            <th></th>
                            <th></th>
                            <th><?php echo number_format($delegates->Gross_total, 2); ?></th>
                        </tr>
                        <tr>
                            <th>Vat @ 16%</th>
                            <th></th>
                            <th></th>
                            <th><?php
                                $net = $total * (16 / 100);
                                echo number_format($net, 2);
                                ?></th>
                        </tr>
                        <tr>
                            <th>Net Total( {{$currency}} )</th>
                            <th></th>
                            <th></th>
                            <th><?php echo number_format($delegates->Net_total, 2); ?></th>
                        </tr>
                    </tbody>
                </table>

                <div>
                    <p><i><b>NB:the above rates apply to early bird payments only</b></i></p>
                    <p><i>Amount Chargable (in words) {{$amount_in_words}}  {{$currency}} only</i></p>
                    <p><i>Declaration:We declare that this invoice gives the actual amount of services described therein and all particulars are true and correct</i></p>
                    <img id="wafula">
                    <h4>Nicholas Wafula</h4>

                    <h4>KISM Accountant</h4>
                </div>
                <div></div>
                <div>
                    <b>NB:</b>
                    <ol>
                        <li><b><i>Kindly note that the above rates apply to early bird payments received on or before {{ date_format($earlybird, ' jS F Y') }}</i></b></li>
                        <li><b>Amount payable by cheque or electronic transfer through the following account details</b>

                            <div class="all-small">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Kenya Institute of Supplies Managment       </td>
                                            <td>Bank Account Name</td>
                                        </tr>
                                        <tr>
                                            <td>Ksh-0102096929100|USD-9702096929100</td>
                                            <td>Bank Account Number</td>
                                        </tr>
                                        <tr>
                                            <td>Standard Chartered</td>
                                            <td>Bank Name</td>
                                        </tr>
                                        <tr>
                                            <td>Westlands</td>
                                            <td>Bank Branch</td>
                                        </tr>
                                        <tr>
                                            <td>02015</td>
                                            <td>Branch Code</td>
                                        </tr>
                                        <tr>
                                            <td>SCBLKENXXX</td>
                                            <td>Swift Code</td>
                                        </tr>
                                        <tr>
                                            <td>NITA/TRN/613</td>
                                            <td>NITA No.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </body>
</html>

