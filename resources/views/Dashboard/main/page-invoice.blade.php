@extends('Dashboard.main.master')

@section('content')
<div class="content-body">

    <div class="container">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>Hello, <span>Welcome here</span></h4>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Page</a>
                    </li>
                    <li class="breadcrumb-item active">Invoice</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="invoice" class="effect2">
                    <div id="invoice-top">
                        <div class="invoice-logo"></div>
                        <div class="invoice-info">
                            <h2>john doe</h2>
                            <p>hello@example.com Admin.com
                                <br>+8801629599859</p>
                        </div>
                        <!--End Info-->
                        <div class="title">
                            <h4>Invoice #1069</h4>
                            <p>Issued: February 15, 2018
                                <br>Payment Due: February 27, 2018</p>
                        </div>
                        <!--End Title-->
                    </div>
                    <!--End InvoiceTop-->
                    <div id="invoice-mid">
                        <div class="clientlogo"></div>
                        <div class="invoice-info">
                            <h2>Client Name</h2>
                            <p>mariam@example.com
                                <br>555-555-5555
                                <br>
                            </p>
                        </div>
                        <div id="project">
                            <h2>Project Description</h2>
                            <p>Proin cursus, dui non tincidunt elementum, tortor ex feugiat enim, at elementum enim quam vel purus. Curabitur semper malesuada urna ut suscipit.</p>
                        </div>
                    </div>
                    <!--End Invoice Mid-->
                    <div id="invoice-bot">
                        <div id="invoice-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr class="tabletitle">
                                        <td class="table-item">
                                            <h2>Item Description</h2>
                                        </td>
                                        <td class="Hours">
                                            <h2>Hours</h2>
                                        </td>
                                        <td class="Rate">
                                            <h2>Rate</h2>
                                        </td>
                                        <td class="subtotal">
                                            <h2>Sub-total</h2>
                                        </td>
                                    </tr>
                                    <tr class="service">
                                        <td class="tableitem">
                                            <p class="itemtext">Communication</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">5</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">$75</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">$375.00</p>
                                        </td>
                                    </tr>
                                    <tr class="service">
                                        <td class="tableitem">
                                            <p class="itemtext">Asset Gathering</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">3</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">$75</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">$225.00</p>
                                        </td>
                                    </tr>
                                    <tr class="service">
                                        <td class="tableitem">
                                            <p class="itemtext">Design Development</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">5</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">$75</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">$375.00</p>
                                        </td>
                                    </tr>
                                    <tr class="service">
                                        <td class="tableitem">
                                            <p class="itemtext">Animation</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">20</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">$75</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">$1,500.00</p>
                                        </td>
                                    </tr>
                                    <tr class="service">
                                        <td class="tableitem">
                                            <p class="itemtext">Animation Revisions</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">10</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">$75</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">$750.00</p>
                                        </td>
                                    </tr>
                                    <tr class="service">
                                        <td class="tableitem">
                                            <p class="itemtext"></p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">HST</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">13%</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">$419.25</p>
                                        </td>
                                    </tr>
                                    <tr class="tabletitle">
                                        <td></td>
                                        <td></td>
                                        <td class="Rate">
                                            <h2>Total</h2>
                                        </td>
                                        <td class="payment">
                                            <h2>$3,644.25</h2>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!--End Table-->
                        <form action="#" method="post" target="_top" class="m-t-15">
                            <input type="image" src="../../assets/images/paypal.png" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        </form>
                        <div id="legalcopy">
                            <p class="legal"><strong>Thank you for your business!</strong> Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.</p>
                        </div>
                    </div>
                    <!--End InvoiceBot-->
                </div>
                <!--End Invoice-->
            </div>
        </div>
    </div>
               
</div>
@endsection