<style>

table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #D5F5E3;
}
#t01 tr:nth-child(odd) {
 background-color: #AEB6BF;
}
#t01 th {
  background-color: black;
  color: white;
}
.watermark {
  opacity: 0.2;
  font-size: 52px;
  color: 'black';
  background: '#ccc';
  position: absolute;
  cursor: default;
  user-select: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  right: 5px;
  bottom: 5px;
}
</style>

@foreach($payment_info as $row2)
   <center><h1><b> <font color="Red"> Bangladesh Railway E-Ticket </font> </b> </h1></center>
   <div class="watermark">
                    
    </div>

    <?php

        $user=DB::table('users_tbl')->where('id',$row2->user_id)
        ->first();

        $train=DB::table('trains_tbl')->where('train_number',$row2->train_number)
        ->first();


    ?>
    
    <img src="data:image/png;base64, {!! $qrcode !!}" align="right">

    
    <br><br>
    <font size="3">
    <b>Name : </b> {{  $user->name }} <br> 
    <b>Contact : </b> {{  $user->contact }} <br> 
    <b>Email : </b> {{  $user->email }} <br> <br> <br>

    </font>

   <table id="t01">
    <tr>
    <td> Train Number :</td>
    <td> {{ $row2->train_number }} </td>
    </tr>

    <tr>
    <td> Train Name :</td>
    <td> {{ $row2->train_name }} </td>
    </tr>

    <tr>
    <td> Ticketing Date & Time :</td>
    <td> {{ $row2->ticketing_date}} , {{ $row2->ticketing_time }} </td>
    </tr>

    <tr>
    <td> Journey Date & Time :</td>
    <td> {{ $row2->date }} , {{ $train->arrival_time }}</td>
    </tr>

    <tr>
    <td> From :</td>
    <td> {{ $row2->form }} </td>
    </tr>

    <tr>
    <td> To :</td>
    <td> {{ $row2->to }} </td>
    </tr>

    <tr>
    <td> Class :</td>
    <td> {{ $row2->class }} </td>
    </tr>

    

    <tr>
    <td> Seat Number :</td>
    <td>
   
    @foreach($payment_info as $row3)

    
    {{ $row3->seat_number }} ,

    

    @endforeach
    
    
    </td>
    </tr>
    
    <tr>
    <td> Tnx Number :</td>
    <td> {{ $row2->tnx_id }} </td>
    </tr>
    
    
   </table>
  

        @if(1)
        

            @break;

        @endif


   
   @endforeach
    <br><br><br> <br><br><br>
   <h3>Authority</h3>

  <i> <h4>Sajeeb Chakraborty</h4> </i>
