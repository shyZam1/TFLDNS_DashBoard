@extends('theme.default')



@section('content')

<div class="jumbotron">
        <div  class="container">
            <h1 style="text-align:center;">User Support</h1>
        </br> 
    </br>   
                <div align="center"class="row">
                    <div class="col-lg-4">
                        <table>
                            <tr>
                                <td align="center">
                                    <div><img src="{{URL::to('/images/phone.png')}}" alt="Telephone Logo" style="width:20%;"></img></br></br><p style="font-size:1vw;">Call: 3333333 ext. 1111</p></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <table>
                            <tr>
                                <td  align="center">
                                    <div><img src="{{URL::to('/images/email-icon.png')}}" alt="Email Logo" style="width:20%;"></img></br></br><p style="font-size:1vw;">Email: itsupport@tfl.com.fj</p></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <table>
                            <tr>
                                <td  align="center">
                                        <div><img src="{{URL::to('/images/24-7-icon.png')}}" alt="24/7 Logo" style="width:20%;"></img></br></br><p style="font-size:1vw;">IT Support is online 24/7</p></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
        </div> 

@endsection