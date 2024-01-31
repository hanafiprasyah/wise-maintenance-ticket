<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>WISE Ticket App</title>
    <style>
        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            max-width: 2480px;
            max-height: 3508px;
            width: 21cm;
            height: 29.7cm;
            margin: auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 1.6em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            width: auto;
            overflow: hidden;
            word-wrap: break-word;
            padding: 10px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {}

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 1.3em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ public_path('wiselogo.png') }}" alt="WISE Logo">
        </div>
        <div id="company">
            <h2 class="name">Wibawa Solusi Elektrik</h2>
            <div>Jalan Raya Jatiasih No. 350, Jatiasih, Kota Bekasi</div>
            <div>(021) 8550-1990</div>
            <div><a href="mailto:info@wise.co.id">info@wise.co.id</a></div>
        </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">FORM TO:</div>
                <h2 class="name">Engineer Onsite / Support</h2>
                {{-- <div class="address">796 Silver Harbour, TX 79273, US</div> --}}
                {{-- <div class="email"><a href="mailto:john@example.com">john@example.com</a></div> --}}
            </div>
            <div id="invoice">
                <h1>#{{ $record->maintenance->ticket }}</h1>
                <div class="date">Date of approval:
                    {{ \Carbon\Carbon::parse($record->maintenance->updated_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ss') }}
                </div>
                <div class="date">Due Date: As soon as possible</div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="desc">SITE NAME</th>
                    <th class="total">SERVICE FEE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="desc">
                        <h3>{{ $record->maintenance->site->name }}</h3>
                    </td>
                    <td class="total">
                        {{ Number::currency($record->transport, 'IDR', 'id') }}</td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc">SPAREPART</th>
                    <th class="unit">UNIT PRICE</th>
                    <th class="qty">QUANTITY</th>
                    <th class="total">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                {{ $no = 1 }}
                @foreach ($record->item as $data)
                    <tr>
                        <td class="no">{{ $no++ }}</td>
                        <td class="desc">
                            <h3>{{ $data->name }}</h3>
                        </td>
                        <td class="unit">{{ Number::currency($data->price_int, 'IDR', 'id') }}</td>
                        <td class="qty">{{ $data->pivot->quantity }}&nbsp;{{ $data->unit }}</td>
                        <td class="total">
                            {{ Number::currency($data->pivot->quantity * $data->price_int, 'IDR', 'id') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">SPAREPART SUBTOTAL</td>
                    <td>{{ Number::currency($record->item_subtotal, 'IDR', 'id') }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">TAX</td>
                    <td>{{ $record->taxes }}%</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">GRAND TOTAL</td>
                    <td>{{ Number::currency($record->value, 'IDR', 'id') }}</td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">Regards, <br>WISE Ticket App</div>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">This Budget can change at any time.</div>
        </div>
    </main>
    <footer>
        File was created by system and is valid without the signature and seal.
    </footer>
</body>

</html>
