<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>

<body> 
   <div class="container">
       <div class="row">
          <div class="col-md-12" style="margin-top:50px">
             <h4>{{$Title}} | Laravel CRUD</h4>
             
        
             
              <form action="{{route('update')}}" method="post">
               
                @csrf
                <input type="hidden" name="cid" value="{{$Info->id}}">
                 
                 <div class="form-group">
                     <label for="">Name</label>
                     <input type="text" class="form-control" name="name" placeholder="Enter your Name" value="{{$Info->name}}">
                     <span style="color:red">@error('name'){{ $message }} @enderror</span>
                 </div>
                 
				 <div class="form-group">
                     <label for="email">Email</label>
                     <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{$Info->email}}">
                     <span style="color:red">@error('email'){{ $message }} @enderror</span>
                 </div>
                  <div class="form-group">
                     <label for="">Favoraite Colour</label>
                     <input type="text" class="form-control" name="colour" placeholder="Favoraite Colour " value="{{$Info->colour}}">
                     <span style="color:red">@error('colour'){{ $message }} @enderror</span>
                 </div>
                 
				 
				 <div class="form-group">
                     <label for="">Phone Number</label>
                     <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" value="{{$Info->phone}}">
                     <span style="color:red">@error('phone'){{ $message }} @enderror</span>
                 </div>
                  
				  <div class="form-group">
                     <label for="">Address</label>
                     <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{$Info->address}}">
                     <span style="color:red">@error('address'){{ $message }} @enderror</span>
                 </div>
                  
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary btn-block">Update</button>
                 </div>
              </form>
              <hr>
              
              
          </div>
           
       </div>
   </div>
    
</body>
</html>