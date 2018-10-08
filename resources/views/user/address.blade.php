@extends('user.layouts.app')
@section('content')

<section class="content container-fluid dashboard">

                <!-- page content starts here -->

                <div class="content-header">
                    <h1>Add new address</h1>
                </div>

                <div class="common-background manageAdress">
                    <div class="commonBox">
                        <form class="newAddress-form" action="{{route('user.save_address')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">

                            <input type="hidden" name="id" value="{{Auth::guard('user')->user()->indvCustId}}">
                                <div class="form-group col-md-6">
                                    <label>Line1</label>
                                    <input type="text" name="line1" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Line2</label>
                                    <input type="text" name="line2" class="form-control">
                                </div>


                                <div class="form-group col-md-6">
                                    <label>State</label>
                                    <input type="text" name="state" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Pincode</label>
                                    <input type="number" name="pincode" class="form-control">
                                </div>
                               
                            

                                <div class="form-group col-md-12 selectCountry">
                                    <label>Country Name</label>
                                    <select class="form-control" name="countyName">
                                        <option value="">Select Country Name</option>
                                        <option value="india">India</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Building Name</label>
                                    <input type="text" name="buildingName" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Building Floor</label>
                                    <input type="number" name="buildingFloor" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Flat Number or House Number</label>
                                    <input type="test" name="buildingNumber" class="form-control">
                                </div>
                                <div class="form-group col-md-12 selectCountry">
                                    <label>Building Type</label>
                                    <select class="form-control" name="buildingType">
                                        <option value=""></option>
                                        <option value="flat">Flat</option>
                                        <option value="villa">Villa</option>
                                        <option value="tower">Tower</option>
                                    </select>
                                </div>
                                 <div class="form-group col-md-12 selectCountry">
                                    <label>Lift</label>
                                    <select class="form-control" name="isLift">
                                        <option value=""></option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="col-md-12 extra-dtls">
                                    <h4>Additional Address Details</h4>
                                    <p>Preferences are used to plan your delivery. However, shipments can sometimes arrive early or later than planned.</p>
                                </div>

                                <div class="form-group col-md-12 type-addAddress">
                                    <label>Select an Address Type</label>
                                    <div class="schedule-box">
                                            <div class="s-input s-input--rounded">
                                                <input type="radio" name="addressType" value="home" id="home" >
                                                <label for="home">
                                                    <i class="aria-hidden">&nbsp;</i> Home
                                                </label>
                                            </div>

                                            <div class="s-input s-input--rounded">
                                                <input type="radio" name="addressType" value="office" id="office">
                                                <label for="office">
                                                    <i class="aria-hidden">&nbsp;</i> Office
                                                </label>
                                            </div>

                                            <div class="s-input s-input--rounded">
                                                <input type="radio" name="addressType" value="other" id="other">
                                                <label for="other">
                                                    <i class="aria-hidden">&nbsp;</i> Other
                                                </label>
                                            </div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="add-address btn-default">Add Address</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- commonBox -->

                </div>

                <!-- page content ends here -->

            </section>
@endsection
