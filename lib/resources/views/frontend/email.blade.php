<link rel="stylesheet" href="css/email.css">
<font face="Arial">
    <div id="wrap-inner">
        <div id="customer">
            <h3>Customer Information</h3>
            <p>
                <span class="info">Customer: </span>
                {{ $info['name'] }}
            </p>
            <p>
                <span class="info">Email: </span>
                {{ $info['email'] }}
            </p>
            <p>
                <span class="info">Phone: </span>
                {{ $info['phone'] }}
            </p>
            <p>
                <span class="info">Address: </span>
                {{ $info['add'] }}
            </p>
        </div>
        <div id="invoice">
            <h3>Invoice</h3>
            <table class="table-bordered table-responsive">
                <tr class="bold">
                    <td width="30%">Product Name</td>
                    <td width="25%">Price</td>
                    <td width="20%">Quantity</td>
                    <td width="15%">Total</td>
                </tr>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td class="price">{{ number_format($item->price,0,',','.' ) }} VND</td>
                        <td>{{ $item->qty }}</td>
                        <td class="price">{{ number_format($item->qty * $item->price,0,',','.' ) }} VND</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Total:</td>
                    <td class="total-price">{{ $total }} VND</td>
                </tr>
            </table>
        </div>
        <div id="confirmation">
            <br>
            <p align="justify">
                <b>Your order has been successfully placed!</b><br />
                • Your product will be delivered to the address provided in the Customer Information section within 2 to 3 days from now.<br />
                • Our delivery staff will contact you via phone 24 hours before delivery.<br />
                <b><br />Thank you for using our company's products!</b>
            </p>
        </div>
    </div>
</font>
