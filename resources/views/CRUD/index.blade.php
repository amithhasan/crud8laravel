<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body> 
   <div class="container">
       <div class="row">
          <div class="col-md-12" style="margin-top:50px">
             <h4>Add New Record</h4>
             
             @if(Session::get('success'))
             <div class="alert alert-success alert-dismissible ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                 {{Session::get('success')}}
             </div>
             @endif
             
             @if(Session::get('fail'))
             <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
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
                     <label for="email">Email</label>
                     <input type="text" class="form-control" name="email" placeholder="Enter Email">
                     <span style="color:red">@error('email'){{ $message }} @enderror</span>
                 </div>
				 
                  <div class="form-group">
                     <label for="">Favoraite Colour</label>
                     <input type="text" class="form-control" name="colour" placeholder="Favoraite Colour ">
                     <span style="color:red">@error('colour'){{ $message }} @enderror</span>
                 </div>
                 
                 <div class="form-group">
                     <label for="">Phone Number</label>
                     <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number ">
                     <span style="color:red">@error('phone'){{ $message }} @enderror</span>
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
              <hr>
              
              <table class="table table-hover">
                  <thead>
                      <th>Name</th>
					  <th>Email</th>
                      <th>Colour</th>             
                      <th>Phone </th>
                      <th>Address</th>
                      <th>Action</th>
                  </thead>
                  <tbody>
                     @foreach ($list as $item)
                      <tr>
                          <td>{{$item->name}}</td>
						  <td>{{$item->email}}</td>
                          <td>{{$item->colour}}</td>
                          <td>{{$item->phone}}</td>
                          <td>{{$item->address}}</td>

                          <td>
                              <div class="btn-group">
                              <a href="delete/{{$item->id}}" class="btn btn-danger btn-xs">Delete</a>
                              <a href="edit/{{$item->id}}" class="btn btn-primary btn-xs">Edit</a>
                              </div>
                              
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              <span> {{$list->links()}}  </span><br>
              <style>
                  .w-5{
                      display: none;
                  }
              </style>
              
          </div>
           
       </div>
   </div>
    
</body>
</html>