<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            font-family:'Courier New', Courier, monospace;
        }

        .container{
            width: 300px;
            height: auto;
            border: 1px solid #cccccc;
            padding: 5px;
        }
        .header{
            /* background:#cccccc; */
            display: flex;
            align-items: center;
            flex-direction: column;
            border-bottom: 2px solid #cccccc;
        }
        .header-detail{
            /* background:#cccccc; */
            display: flex;
            justify-content: space-evenly;
            border-bottom: 2px solid #cccccc;
        }
        .main{ 
            display: flex;
            gap:5px;
            flex-direction: column;
            border-bottom: 2px solid #cccccc;
        }
        
        .menu{
            /* background:#cccccc; */
            display: flex;
            justify-content: space-between;
         }
        .item{
            /* background:#cccccc; */
            display: flex;
            flex-direction: column;
         }

        .footer{
            display: flex;
            flex-direction: column;
            align-items: center;
            
        }

    </style>
</head>
<body>
    @php
        $detail = App\models\Cart::where('user_id',auth()->user()->id)->first();
    @endphp
    <div class="container">
        <div class="header">
            <span>---FnB---</span>
            <span>xxxxxxx xxx xxxx xxxxx</span>
        </div>
        <div class="header-detail">
            <span>{{ $detail->customer }}</span>
            <span> ( {{ $detail->dine_in == 1 ? 'meja '.$detail->meja : 'Take Away' }} )</span>
            <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$detail->tgl_jam)->format('d/m/Y H:i') }}</span>
        </div>
        <div class="main">
            @php
            $orders = App\models\Cart::where('user_id',auth()->user()->id)
                ->get();
            @endphp
            
            @foreach ( $orders as $order )
            <div class="menu">
                <div class="item">
                    <span>{{ $order->menu->nama }}</span>    
                    <span>{{ $order->jumlah }} x {{ $order->menu->harga }}</span>    
                </div>    
                    <span>Rp {{ $order->jumlah * $order->menu->harga }}</span>    
                </div>
            @endforeach
             
        </div>
        <div class="footer">
             
            <span> * Thanks You *</span>
        </div>
    </div>
</body>
</html>