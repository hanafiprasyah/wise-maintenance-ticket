<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>WISE Ticket App</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .footer {
            margin-top: 12px
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                {{-- <img src="{{ asset('favicon.ico') }}" style="width: 86px; max-width: 86px" /> --}}
                            </td>

                            <td>
                                Problem Ticket #: {{ $record->maintenance->ticket }}<br />
                                Created:
                                {{ \Carbon\Carbon::parse($record->maintenance->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ss') }}<br />
                                Status: Approved
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                To<br />
                                Engineer Onsite / Support<br />
                            </td>

                            <td>
                                From<br />
                                {{ $record->editor }}<br />
                                Helpdesk
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Trip Facilities</td>

                <td>#</td>
            </tr>

            <tr class="details">
                <td>Transport + Accomodation + Consumption</td>
                <td>{{ Number::currency($record->transport, 'IDR', 'id') }}</td>
            </tr>

            <tr class="heading">
                <td>Products / Items</td>

                <td>Price</td>
            </tr>

            @foreach ($record->item as $data)
                <tr class="item">
                    <td>{{ $data->name }} / {{ Number::currency($data->price_int, 'IDR', 'id') }}
                        ({{ $data->pivot->quantity }} {{ $data->unit }})
                    </td>

                    <td>{{ Number::currency($data->pivot->quantity * $data->price_int, 'IDR', 'id') }}</td>
                </tr>
            @endforeach

            <tr class="total">
                <td></td>

                <td>Total: {{ Number::currency($record->value, 'IDR', 'id') }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <div>Thank you,</div>
        <div>&copy; WISE Ticket App</div>
    </div>
</body>

</html>
