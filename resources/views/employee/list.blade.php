<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <a style="border:1px solid red;width:400px;" href=" {{url('/')}} " class="btn btn-primary-rgba mr-2">
    <i class="feather icon-plus mr-2"></i> {{__("Employee Register form")}}
  </a>
  <div class="container">
    <h2>Employess List</h2>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Employee name</th>
          <th>Gender</th>
          <th>City</th>
          <th>state</th>
          <th>Skill</th>
          <th>Address</th>
          
          <th>Experience Details</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($employess as $key => $employes)
      
        <tr>
          <td>{{$employes['name']}}</td>
          <td>{{$employes['gender']}}</td>
          <td>{{$employes['city']}}</td>
          <td>{{$employes['state']}}</td>
          <td>{{$employes['skills']}}</td>
          <td>{{$employes['address']}}</td>
        
            <td>
            @if($employes['empdetail'])
           <table>
            <thead>
              <tr>
                <th>Company Name</th>
                <th>Salary</th>
                <th>Year of Experience</th>
                <th>From Year</th>
                <th>To Year</th>
              </tr>
            </thead>
            <tbody>
            @foreach($employes['empdetail'] as $empexp)
              <tr>
             
              <td>{{$empexp['cmpname']}}</td>
              <td>{{$empexp['salary']}}</td>
              <td>{{$empexp['exp']}}</td>
              <td>{{$empexp['fromyear']}}</td>
              <td>{{$empexp['toyear']}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
           @endif
            </td>
            <td> <a class="dropdown-item" href="{{url('employee/'.$employes['id'].'/edit')}}"><i class="feather icon-edit mr-2"></i>Edit</a></td>
          <td><a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete{{ $employes['id'] }}">
              <i class="feather icon-delete mr-2"></i>{{ __("Delete") }}</a>
            </a></td>
         
        </tr>
        <div class="modal fade bd-example-modal-sm" id="delete{{$employes['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleSmallModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4>{{ __('Are You Sure ?')}}</h4>
                <p>{{ __('Do you really want to delete')}}? {{ __('This process cannot be undone.')}}</p>
              </div>
              <div class="modal-footer">
                <form method="post" action="{{url('employee/delete/'.$employes['id'])}}" class="pull-right">
                  {{csrf_field()}}
                  {{method_field("DELETE")}}
                  <button type="reset" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <button type="submit" class="btn btn-primary">Yes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>

</body>

</html>