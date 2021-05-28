  <?php
    $total_amount = $order->payable_price * 100;
    $icon_url = url('public/assets/images/demos/demo-4/logo.png');

  ?>
  <script src="{{url('/public/')}}/assets/js/jquery.min.js"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script type="text/javascript">

        var name = "{{$order->name}}";
        var email = "{{$order->email}}";
        var phone = "{{$order->phone}}";
        var country = "{{$order->country}}";
        var state = "{{$order->state}}";
        var city = "{{$order->city}}";
        var pincode = "{{$order->pincode}}";
        var address = "{{$order->street}}";
        var order_note = "{{$order->order_note}}";
        var ordr_id = "{{$order->id}}";
        var base_url = "{{url('/')}}";

        var options = {
              key: "rzp_live_im6X5C12Ew8IR5",
              amount: "{{ $total_amount }}",
              prefill: {
                  name: '{{$order->name}}',
                  email: '{{$order->email}}',
                  contact: '{{$order->phone}}'
              },
              theme: {
               color: "#008A73"
              },
              name: 'Fresh Eat',
              description: "Your orders",
              image: "{{ $icon_url }}",
              handler: razorpay_actionhandler,
              modal: { escape: false, 
                ondismiss: function(){ 
                  window.location.href = base_url+'/checkout/{{$order->order_id}}';
              } },
          }
          window.r = new Razorpay(options);
          r.open()  


  function razorpay_actionhandler(response){
      $.ajax({
           url: "{{url('order_success')}}",
           type: 'post',
           dataType: 'json',
            data: {
            amount: "{{$total_amount}}",
            razorpay_payment_id: response.razorpay_payment_id ,
              order_id : ordr_id,
             _token: "{{@csrf_token()}}",
           }, 
           success: function (msg) {
                window.location.href = "{{url('thankyou')}}"
           }
      });
  }
  </script>
