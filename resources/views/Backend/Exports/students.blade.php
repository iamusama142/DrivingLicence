<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Records</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <style media="all">
        @page {
            margin: 0;
            padding: 0;
        }

        body {
            font-size: 0.875rem;
            font-family: 'Hind Siliguri', 'sans-serif';
            font-weight: normal;

            text-align: left;
            padding: 0;
            margin: 0;
        }

        .gry-color *,
        .gry-color {
            color: #000;
        }

        table {
            width: 100%;
        }

        table th {
            font-weight: normal;
        }

        table.padding th {
            padding: .25rem .7rem;
        }

        table.padding td {
            padding: .25rem .7rem;
        }

        table.sm-padding td {
            padding: .1rem .7rem;
        }

        .border-bottom td,
        .border-bottom th {
            border-bottom: 1px solid #eceff4;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div>


        <div style="background: #eceff4;padding: 1rem;">
            <table>
                <tr>
                    <td>

                        <img src="{{ asset('logo.png') }}" height="30" style="display:inline-block;">

                    </td>
                    <td style="font-size: 1.5rem;" class="text-right strong">Student Records</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td style="font-size: 1rem;" class="strong">BayPassdrivingSchool</td>
                    <td class="text-right"></td>
                </tr>
                <tr>
                    <td class="gry-color small">315 Montgomery Street, Floor 9, RM# 939, San Francisco, CA 9410</td>
                    <td class="text-right"></td>
                </tr>
                <tr>
                    <td class="gry-color small">Email: info@baypassdrivingschool.com</td>

                </tr>
                <tr>
                    <td class="gry-color small">Phone: +1 (510) 246-8939 | +1(925) 359-3250</td>
                    <td class="text-right small"><span class="gry-color small">Date:</span>
                        <span class=" strong">{{ now()->format('d M, Y') }}</span>
                    </td>
                </tr>
            </table>

        </div>



        <div style="padding: 1rem;">
            <table class="padding text-left small border-bottom">
                <thead>
                    <tr class="gry-color" style="background: #eceff4;">
                        <th width="35%" class="text-left">Student #</th>
                        <th width="15%" class="text-left">Name</th>
                        <th width="10%" class="text-left">Email</th>
                        <th width="15%" class="text-left">Contact</th>
                        <th width="10%" class="text-left">Address</th>
                        <th width="15%" class="text-right">Register At</th>
                    </tr>
                </thead>
                <tbody class="strong">
                    @foreach ($data as $orderDetail)
                        <tr class="">
                            <td>{{ $orderDetail->student_id }}
                            </td>
                            <td class="">{{ $orderDetail->name }}</td>
                            <td class="">{{ $orderDetail->email }}</td>
                            <td class="">{{ $orderDetail->phone }}</td>
                            <td class="">{{ $orderDetail->address ?? '' }}</td>
                            <td class="">{{ formatDate($orderDetail->created_at) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </div>
</body>

</html>
