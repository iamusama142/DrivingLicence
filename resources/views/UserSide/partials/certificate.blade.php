<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../" />
    <title>Exam Pass Driving Certificate - Baypassdrivingschool</title>
    <meta charset="utf-8" />
    <meta name="description" content="Certificate" />
    <meta name="keywords" content="certificate" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('Certificate/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Certificate/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank">
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Body-->
            <div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true"
                data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav"
                data-kt-scroll-offset="5px" data-kt-scroll-save-state="true"
                style="background-color:#D5D9E2; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
                <!--begin::Email template-->
                <style>
                    html,
                    body {
                        padding: 0;
                        margin: 0;
                        font-family: Inter, Helvetica, "sans-serif";
                    }

                    a:hover {
                        color: #009ef7;
                    }
                </style>
                <div id="#kt_app_body_content"
                    style="background-color:#D5D9E2; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
                    <div
                        style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                            height="auto" style="border-collapse:collapse">
                            <tbody>
                                <tr>
                                    <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                                        <!--begin:Email content-->
                                        <div style="text-align:center; margin:0 60px 34px 60px">
                                            <!--begin:Logo-->
                                            <div style="margin-bottom: 10px">
                                                <a href="https://keenthemes.com" rel="noopener" target="_blank">
                                                    <img alt="Logo" src="{{ asset('logo.png') }}"
                                                        style="height: 35px" />
                                                </a>
                                            </div>
                                            <!--end:Logo-->

                                            <!--begin:Text-->
                                            <div
                                                style="font-size: 14px; font-weight: 500; margin-bottom: 42px; font-family:Arial,Helvetica,sans-serif">
                                                <p
                                                    style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">
                                                    @if ($result->status == 'Fail')
                                                        Unfortunality!
                                                    @else
                                                        Congratulations!
                                                    @endif
                                                </p>

                                                @if ($result->status == 'Pass')
                                                    <p style="margin-bottom:2px; color:#7E8299">Official Driving Test
                                                        Success</p>
                                                    <p style="margin-bottom:2px; color:#7E8299">Congratulations on
                                                        Passing Your Test and Obtaining Your Certificate!</p>
                                                @else
                                                    <p style="margin-bottom:2px; color:#7E8299">Official Driving Test
                                                        Result</p>
                                                    <p style="margin-bottom:2px; color:#7E8299">Unfortunately, you did
                                                        not pass the test this time.</p>
                                                    <p style="margin-bottom:2px; color:#7E8299">Please retake the exam
                                                        to achieve success.</p>
                                                @endif

                                            </div>
                                            <!--end:Text-->
                                            <!--begin:Order-->
                                            <div style="margin-bottom: 15px">
                                                <!--begin:Title-->
                                                <h3
                                                    style="text-align:left; color:#181C32; font-size: 18px; font-weight:600; margin-bottom: 22px">
                                                    Certificate summary</h3>
                                                <!--end:Title-->
                                                <!--begin:Items-->
                                                <div style="padding-bottom:9px">
                                                    <div
                                                        style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500; margin-bottom:8px">
                                                        <!--begin:Description-->
                                                        <div style="font-family:Arial,Helvetica,sans-serif">Course Name
                                                        </div>
                                                        <!--end:Description-->
                                                        <!--begin:Total-->
                                                        <div style="font-family:Arial,Helvetica,sans-serif">
                                                            {{ $result->title }}
                                                        </div>
                                                        <!--end:Total-->
                                                    </div>
                                                    <div style="padding-bottom:9px">
                                                        <div
                                                            style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500; margin-bottom:8px">
                                                            <!--begin:Description-->
                                                            <div style="font-family:Arial,Helvetica,sans-serif">
                                                                Participent Id
                                                            </div>
                                                            <!--end:Description-->
                                                            <!--begin:Total-->
                                                            <div style="font-family:Arial,Helvetica,sans-serif">
                                                                {{ $result->participate_id }}
                                                            </div>
                                                            <!--end:Total-->
                                                        </div>
                                                        <!--begin:Item-->
                                                        <div
                                                            style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500; margin-bottom:8px">
                                                            <!--begin:Description-->
                                                            <div style="font-family:Arial,Helvetica,sans-serif">Total
                                                                Marks
                                                            </div>
                                                            <!--end:Description-->
                                                            <!--begin:Total-->
                                                            <div style="font-family:Arial,Helvetica,sans-serif">
                                                                {{ number_format($result->total_marks) }}
                                                            </div>
                                                            <!--end:Total-->
                                                        </div>
                                                        <!--end:Item-->
                                                        <!--begin:Item-->
                                                        <div
                                                            style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500;">
                                                            <!--begin:Description-->
                                                            <div style="font-family:Arial,Helvetica,sans-serif">Obtained
                                                                Marks
                                                            </div>
                                                            <!--end:Description-->
                                                            <!--begin:Total-->
                                                            <div style="font-family:Arial,Helvetica,sans-serif">
                                                                {{ number_format($result->get_marks) }}
                                                            </div>
                                                            <!--end:Total-->
                                                        </div>
                                                        <!--end:Item-->
                                                        <!--begin::Separator-->
                                                        <div class="separator separator-dashed" style="margin:15px 0">
                                                        </div>
                                                        <!--end::Separator-->
                                                        <!--begin:Item-->
                                                        <div
                                                            style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500">
                                                            <!--begin:Description-->
                                                            <div style="font-family:Arial,Helvetica,sans-serif">Total
                                                                Percentage You Get
                                                            </div>
                                                            <!--end:Description-->
                                                            <!--begin:Total-->
                                                            <?php
                                                            $total_marks = $result->total_marks;
                                                            $obtained_marks = $result->get_marks;
                                                            $percentage = ($obtained_marks / $total_marks) * 100;
                                                            ?>
                                                            <div
                                                                style="color:#50cd89; font-weight:700; font-family:Arial,Helvetica,sans-serif">
                                                                {{ number_format($percentage) }}%</div>
                                                            <!--end:Total-->
                                                        </div>
                                                        <div
                                                            style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500">
                                                            <!--begin:Description-->
                                                            <div style="font-family:Arial,Helvetica,sans-serif">Result
                                                                Status

                                                            </div>
                                                            <!--end:Description-->

                                                            <div
                                                                @if ($result->status == 'Fail') style="color:#980201; font-weight:700; font-family:Arial,Helvetica,sans-serif"
                                                            @else
                                                            style="color:#50cd89; font-weight:700; font-family:Arial,Helvetica,sans-serif" @endif>
                                                                {{ $result->status }}</div>
                                                            <!--end:Total-->
                                                        </div>

                                                        <!--end:Item-->
                                                    </div>
                                                    <!--end:Items-->
                                                </div>
                                                <!--end:Order-->
                                                <!--begin:Action-->
                                                <button type="button"
                                                    style="background-color:#50cd89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;"
                                                    class="btn" onclick="downloadInvoice()">Download
                                                    Certificate</button>

                                                <a href="{{ route('student.dashboard') }}"
                                                    class="btn btn-primary">Return To Dashboard</a>

                                                <!--begin:Action-->
                                            </div>
                                            <!--end:Email content-->
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="center"
                                        style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
                                        <p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">
                                            It’s all about Training!</p>
                                        <p style="margin-bottom:2px">Call our customer care number: +1 (510) 246-8939
                                        </p>
                                        <p style="margin-bottom:4px">You may reach us at
                                            <a href="mailto:info@baypassdrivingschool.com" rel="noopener" target="_blank"
                                                style="font-weight: 600">info@baypassdrivingschool.com</a>.
                                        </p>
                                        <p>We serve Mon-Fri, 9AM-18AM</p>
                                    </td>
                                </tr>
                              

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Email template-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('Certificate/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('Certificate/assets/js/scripts.bundle.js') }}"></script>
    <script>
        function downloadInvoice() {
            window.print();
        }
    </script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
