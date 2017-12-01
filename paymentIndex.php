<?php include './sharedlayout/header.php';?>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- braintree -->
    <script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>

    <!-- setting up braintree -->
    <script>
        $.ajax({
            url: "token.php",
            type: "get",
            dataType: "json",
            success: function (data) {
                    braintree.setup(data,'dropin', { container: 'dropin-container'});
            }
        })
    </script>



    <style>
        label.heading {
            font-weight: 600;
        }
        .payment-form {
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            padding: 10px;
            border: 1px #333 solid;
        }
    </style>

</head>
<?php include './sharedlayout/body.php';?>
<body style="text-align: center; margin-top: 100px;">
    <form action="payment.php" method="post" class="payment-form">
        <label for="firstName" class="heading">First Name</label><br>
        <input type="text" name="firstName" id="firstName"><br><br>

        <label for="lastName" class="heading">Last Name</label><br>
        <input type="text" name="lastName" id="lastName"><br><br>

        <label for="amount" class="heading">Amount (USD)</label><br>
        <input type="text" name="amount" id="amount"><br><br>

        <div id="dropin-container"></div>
        <br><br>
        <button type="submit">Pay with BrainTree</button>

    </form>
<?php include './sharedlayout/footer.php';?>
</body>
</html>
