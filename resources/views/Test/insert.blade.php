<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Data File</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
   
 <div class="container">
          <div class="class="col-md-6 style="margin-top:50px">
             <h4>Add New Record</h4>
             <hr>
             
             @if(Session::get('success'))
             <div class="alert alert-success"> 
                 {{Session::get('success')}}
             </div>
             @endif
             
             @if(Session::get('fail'))
             <div class="alert alert-success"> 
                 {{Session::get('fail')}}
             </div>
             @endif
             
             
           <form action="add" method="post">
                @csrf
                 
                 <div class="form-group">
                     <label for="">Name</label>
                     <input type="text" class="form-control" name="name" placeholder="Enter your Name">
                     <span style="color:red">@error('name'){{ $message }} @enderror</span>
                 </div>
                 
                  <div class="form-group">
                     <label for="">Email</label>
                     <input type="text" class="form-control" name="email" placeholder="Enter Gender ">
                     <span style="color:red">@error('email'){{ $message }} @enderror</span>
                 </div>
                 
                  <div class="form-group">
                     <label for="">Gender</label>        
                      <select class="form-control" name="gender" id="sel1">
                       <option >Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>      
                      </select>    
                     <span style="color:red">@error('gender'){{ $message }} @enderror</span>
                 </div>
                 
                 <div class="form-group">
                     <label for="">Address</label>
                     <input type="text" class="form-control" name="address" placeholder="Enter Address ">
                     <span style="color:red">@error('address'){{ $message }} @enderror</span>
                 </div>
                 
                  
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary btn-block">Save</button>
                 </div>
              </form>
          
          </div>
  
         
     </div>
    
</body>
</html>