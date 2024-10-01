@extends('website.template.master')

@section('content')
    <!-- Page Header -->
    
<div class="site-blocks-cover overlay" style="background-image: url(website/images/10.jpg);" data-aos="fade" id="home-section">
</div>
   

    <h2 style="color: #2e3192; text-align: center;" class="section-title mb-3 pt-3" data-aos="fade-up" data-aos-delay="">
{{trans('app.Send Complaint')}}</h2>
   <hr style="background-color:#ffde01!important; text-align: center; height:5px; width:130px;">
</div>
    <!-- Main Content -->
    <div class="section-headline text-center">
              <br><br>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session('message')}}
                    </div>
                @endif
        
            </div>
      <div class="container">
      <form method="POST" action="/complaintaction" class="rtl">


        {{ csrf_field() }}

       <div>
         <div class="form-group floating-label-form-group controls">
          <div class="row">

            <!-- Start Google Map -->

          
            <div class="col-md-12">
             

                   <div class="control-group">
                <div class="form-group ">
                        <label style="color: #2e3192; font-weight: bold; ">{{trans('app.Name')}}</label>
                        <input type="text" name="name" class="form-control" placeholder="{{trans('app.Name')}}" id="name" required
                               data-validation-required-message="Please enter your name.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
           
          
                    <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                         <label style="color: #2e3192; font-weight: bold;">{{trans('app.email')}}</label>
                        <input type="email" name="email" class="form-control" placeholder="{{trans('app.email')}}" id="email" required
                               data-validation-required-message="Please enter your email address.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                     <div class="control-group">
                     <div class="form-group ">
                         <label style="color: #2e3192; font-weight: bold;">{{trans('app.Phone')}}</label>
                        <input type="text" name="phone" class="form-control" placeholder="{{trans('app.Phone')}}" id="phone" required
                               data-validation-required-message="Please enter your mobile phone.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
               
                 <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                         <label style="color: #2e3192; font-weight: bold;">{{trans('app.message')}}</label>
                        <textarea rows="2" name="message" class="form-control" placeholder="{{trans('app.message')}}" id="message" required
                               data-validation-required-message="Please enter your message address."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

    </div>
  </div>
</div>
</div>

             
     <div class="text-center" ><button style="color:#2e3192!important" class="text" type="submit" >{{trans('app.Send Complaint')}}</button></div>
         <br>  
</form>
            
    </div>

<style>
 


  input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #0085a1;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #0085a1;
}
 
.text{
    background: #ffde01!important;
    border: 0;
    border-radius: 50px;
    padding: 10px 24px;
    color: #fff;
   text-align: center;
   font-weight: bold!important;
   font-size: 20px!important;
    
  }
  

</style>             
@endsection
