<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="https://sandbox.vnpayment.vn/tryitnow/Content/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="https://sandbox.vnpayment.vn/tryitnow/Styles/jumbotron-narrow.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/tryitnow/Styles/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://sandbox.vnpayment.vn/tryitnow/Styles/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
     <script src="https://sandbox.vnpayment.vn/tryitnow/Scripts/jquery-3.3.1.min.js"></script>
</head>
<body>
<div class="container">
    <div class="header clearfix">

        <h3 class="text-muted">VNPAY DEMO</h3>
    </div>
        
<div class="table-responsive">
<form action="create_pay" id="frmCreateOrder" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
            <label for="language">Loại hàng hóa </label>
            <select disabled name="ordertype" id="ordertype" class="form-control">
                <option value="billpayment">Thanh toán đặt phòng khách sạn</option>
            </select>
        </div>        
        <div class="form-group">
            <label for="Amount">Số tiền</label>
            <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="Amount" max="10000000000" min="1" disabled type="number" value="{{ $price }}" />
{{--             <input type="hidden" name="price" value="{{ $price }}"> --}}
        </div>
        <div class="form-group">
            <label for="OrderDescription">Nội dung thanh toán</label>
            <textarea class="form-control" cols="20" id="OrderDescription" name="OrderDescription" rows="2">Thanh toán đặt phòng online hotel</textarea>
        </div>
    <button style="background-color: aquamarine;" type="submit" class="btn btn-default">Thanh toán</button>
<input name="__RequestVerificationToken" type="hidden" value="-6B9jKxOQ5S2s97DRIPGquK0UhcXziAuvkuXI_dJzBYDqxgjR2SGamiG5L0RnGURAFSCiaN_LOApevNNyFTYrl9Zvx2LAOYIeuFf4YTLyDA1" /></form>
</div>
<p>
    &nbsp;
</p>

        <footer class="footer">
            <p>VNPAY 2019</p>
        </footer>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://sandbox.vnpayment.vn/tryitnow/Styles/js/ie10-viewport-bug-workaround.js"></script>
    
<link href="https://pay.vnpay.vn/lib/vnpay/vnpay.css" rel="stylesheet" />
<script src="https://pay.vnpay.vn/lib/vnpay/vnpay.js"></script>  
    <script type="text/javascript">
        $("#btnPopup").click(function () {
            var postData = $("#frmCreateOrder").serialize();
            var submitUrl = $("#frmCreateOrder").attr("action");
            $.ajax({
                type: "POST",
                url: submitUrl,
                data: postData,
                dataType: 'JSON',
                success: function (x) {
                    if (x.code === '00') {                      
                        if (window.vnpay)
                        {
                            vnpay.open({ width: 768, height: 600, url: x.data });
                        }
                        else
                        {
                            window.location = x.data;
                        }
                        return false;
                    } else {
                        alert("Error:" + x.Message);
                    }
                }
            });
            return false;
        });
    </script>
     
</body>
</html>
