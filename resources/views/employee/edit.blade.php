<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <title>Add New Member</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js" crossorigin="anonymous"></script>

</head>

<style>
  .section {
    padding-top: 100px !important;
  }

  .error {
    color: red;
  }

  .form-section {
    padding-left: 15px;
    /* display: none; */
  }

  .form-section.current {
    display: inherit;
  }

  .btn-info,
  .btn-success {
    margin-top: 10px;
  }

  .parsley-error-list {
    margin: 2px 0 3px;
    padding: 0;
    list-style-type: none;
    color: red;
  }
</style>

<body>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-3">
          <div class="card">
            <div class="card-header text-white bg-info">
              <h5>Employee Edit Form</h5>
            </div>
            <a  style="border:1px solid red;width:400px;" href=" {{url('/list')}} " class="btn btn-primary-rgba mr-2">
            <i class="feather icon-plus mr-2"></i> {{__("Employee all List")}}
        </a>
            <div class="card-body">
              <form action="{{ route('edit') }}" method="POST" class="register-form">
              {{csrf_field()}}
        {{ method_field('PUT') }}
                <div class="form-section">
                  <label for="name">Employee Name:</label>
                  <input type="text" name="name" value="{{$employess->name}}" class="form-control" placeholder="Employee Name" />

                  <label for="gender">Gender:</label>
                  <input type="radio" id="html" name="gender" value="male">
                  <label for="male">Male</label><br>
                  <input type="radio" id="css" name="gender" value="female">
                  <label for="css">Female</label><br>





                  <label for="state">State:</label>
                  <input type="text" name="state" class="form-control" value="{{$employess->state}}"/>



                  <label for="city">City:</label>
                  <input type="text" name="city" value="{{$employess->city}}" class="form-control" />
                  <label for="city">Address:</label>
                 
          
                  <textarea name="address" id="address" cols="15" rows="5">{{ucfirst($employess->address)}}</textarea>
                  <label for="skills">Skills:</label>
                  <input type="checkbox" id="vehicle1" name="skills" value="html">
                  <label for="vehicle1"> HTML</label><br>
                  <input type="checkbox" id="vehicle2" name="skills" value="css">
                  <label for="vehicle2"> CSS</label><br>
                  <input type="checkbox" id="vehicle3" name="skills" value="js">
                  <label for="js"> JS</label><br>
                  
                </div>
                @if(count($employess->empdetail)>0)
                <label for="city">Employee Details:</label>
                <table id="emptbl">
                  <tr>
                    <th>Company Name</th>
                    <th>Salary</th>
                    <th>Year of Experience</th>
                    <th>From Year</th>
                    <th>To Year</th>

                  </tr>
               @foreach($employess->empdetail as $empdetails)
       
                  <tr>
                    <td id="col0"><input type="text" value="{{$empdetails->cmpname}}" name="cmpname[]"  /></td>
                    <td id="col1"><input type="text" value="{{$empdetails->salary}}" name="salary[]"  /></td>
                    <td id="col2">
                      <input type="text" name="exp[]" value="{{$empdetails->exp}}"  />
                    </td>
                    <td id="col3">
                      <input type="text" value="{{$empdetails->fromyear}}" name="fromyear[]"  />
                    </td>
                    <td id="col4">
                      <input type="text" value="{{$empdetails->toyear}}" name="toyear[]"  />
                    </td>
                    <td id="col5">
                      <input type="hidden" name="emp_id[]" value="1" />
                    </td>
                  </tr>
                 @endforeach
                </table>
                <table>
                  <tr>
                    <td><input type="button" value="Add Row" onclick="addRows()" /></td>
                    <td><input type="button" value="Delete Row" onclick="deleteRows()" /></td>
                    <!-- <td><input type="submit" value="Submit" /></td> -->
                  </tr>
                </table>
                @endif
                <!-- <div class="form-section">
                                    <label for="educationstatus">Educational Status:</label>
                                    <input type="text" name="eductionstatus" class="form-control" required />

                                    <label for="educationlevel">Educational Level:</label>
                                    <input type="text" name="eductionlevel" class="form-control" required />

                                    <label for="oldschool">Name of Last School Attended:</label>
                                    <input type="text" name="oldschool" class="form-control" required />

                                    <label for="addressofschool">Address of Last School</label>
                                    <input type="text" name="addressofschool" class="form-control" required />
                                </div> -->
                <div class="form-group">

                  <button id="seller_profile" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                    {{ __('Submit') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
<script type="text/javascript">
  function addRows() {
    var table = document.getElementById('emptbl');
    var rowCount = table.rows.length;
    var cellCount = table.rows[0].cells.length;
    var row = table.insertRow(rowCount);
    for (var i = 0; i <= cellCount; i++) {
      var cell = 'cell' + i;
      cell = row.insertCell(i);
      var copycel = document.getElementById('col' + i).innerHTML;
      cell.innerHTML = copycel;
      // if (i == 3) {
      //   var radioinput = document.getElementById('col3').getElementsByTagName('input');
      //   for (var j = 0; j <= radioinput.length; j++) {
      //     if (radioinput[j].type == 'radio') {
      //       var rownum = rowCount;
      //       radioinput[j].name = 'gender[' + rownum + ']';
      //     }
      //   }
      // }
    }
  }

  function deleteRows() {
    var table = document.getElementById('emptbl');
    var rowCount = table.rows.length;
    if (rowCount > '2') {
      var row = table.deleteRow(rowCount - 1);
      rowCount--;
    } else {
      alert('There should be atleast one row');
    }
  }
</script>
<script>
  $(".register-form").validate({

    ignore: [],
    rules: {
      name: {
        required: true,
      },
      gender: {
        required: true,
      },

      state: {
        required: true,

      },
      address: {
        required: true,
      },

      skill: {
        required: true,
      },

    },
    messages: {
      name: {
        required: "Employee name is required"
      },
      gender: {
        required: "Employee gender is required"
      },
      state: {
        required: "Employee state is required"

      },
      address: {
        required: "Employee address is required"
      },

      skill: {
        required: "Employee skill is required"
      },
    }
  });
</script>