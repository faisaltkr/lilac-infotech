<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-secondary-subtle">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form role="search" style="margin-left: 30px !important;margin-right: 30px !important;margin-top: 30px !important;">
  
              <label class="h5" for="Search"><b>Search</b></label>
              <input class="form-control p-3" type="search" placeholder="Search name/designation/department"
                  aria-label="Search" name="search" id="search">
          </form>
      </div>
      </div>
        <div class="p-4 row" id="data">
            @foreach ($users as $user)
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="bg-white p-4 m-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>

                            <p class="card-text">{{ $user->designation->name }}</p>
                            <p class="card-text">{{ $user->department->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                  var html=``;
                  $.each(data, function( key, user ) {
                 
                    html += `<div class="col-sm-12 col-md-4 col-lg-4">
                      <div class="bg-white p-4 m-2">
                          <div class="card-body">
                              <h5 class="card-title">`+user.name+`</h5>

                              <p class="card-text">`+user.designation+`</p>
                              <p class="card-text">`+user.department+`</p>
                          </div>
                      </div>
                  </div>`;
                });
                $('#data').html(html);
                }
            });
        })
    </script>


</body>

</html>
