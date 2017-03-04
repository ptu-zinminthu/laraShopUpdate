@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class='row' style='padding-top:25px; padding-bottom:25px;'>
        <div class='col-md-12'>
            <div id='mainContentWrapper'>
                <div class="col-md-8 col-md-offset-2">
                    <h3 style="text-align: center;">
                        Complete Your Order
                    </h3>
                    <br/>

                    <div class="shopping_cart">
                       
                            {{ Form::open(['route' => 'frontend.checkoutprocess', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-order' ]) }}
                        
                            <div class="panel panel-default">

  <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Contact
                                            and Billing Information</a>
                                    </h4>
                                </div>






                                <div>
                                    <div class="">
                                       
                                        <table class="table table-striped" style="font-weight: bold;">
                                          

                                              <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_phone">Phone:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_phone" name="phone" type="text"/>
                                                </td>
                                            </tr>
                                    		  <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_email">Email:</label></td>
                                                <td>
            <input value="{{ Auth::user()->email }}" class="form-control" id="id_email" name="email" type="text" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_1">Address:</label></td>
                                                <td colspan="3">
                                                    <input class="form-control" id="id_address_line_1"
                                                           name="address"  type="textarea"/>
                                                </td>
                                            </tr>
                                       
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_city">City:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_city" name="city"
                                                           type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_state">State:</label></td>
                                                <td>
                                                    <select class="form-control" id="id_state" name="state">
                                                        <option value="AK">Yangon</option>
                                                        <option value="AL">Mandalay</option>
                                                        <option value="AZ">Bago</option>
                                                        <option value="AR">Mgway</option>
                                                       
                                                     
                                                    </select>
                                                </td>
                                            </tr>
                                        
                                          

                                        </table>
                                    </div>
                                </div>
                            </div>
                      
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="">
                                            <b>Payment Information</b>
                                        </a>
                                    </h4>
                                </div>
                                <div>
                                    <div>
                                    
                                        <span class='payment-errors'></span>
                                        <fieldset>

<div class="form-group">
                                                <label class="col-sm-3 control-label" for="card-holder-name">Payment Method</label>


                                                <div class="col-sm-9">
                                                    <label><input type="radio"  name="payment_method" value="1">Cash on delivery</label><br>
                                                           <label><input type="radio" name="payment_method" value="2">Paypal</label>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                
                                            
                                        </fieldset>

                                        <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-success btn-small" >Pay
                                            Now
                                        </button>
                                                    </div>
                                                </div>
                                        
                                        <br/>
                                       
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                   {{ Form::close() }}
            </div>
        </div>
    </div>






@endsection
@section('secondary_content')
    

@endsection