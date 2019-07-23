<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Dynamic Dropdown</title>
    </head>
    <body>
        <div class="container">
            <h1>Dynamic Dropdown</h1>

            <select class="form-control" name="Province" id="province">
                <option value="">เลือกจังหวัด</option>
                @foreach($list as $temp)
                <option value="{{$temp->id}}">{{$temp->name_in_thai}}</option>
                @endforeach
            </select><br>

            <select class="form-control" name="District" id="district">
                <option value="">เลือกอำเภอ</option>
            </select><br>

            <select class="form-control" name="Subdistrict" id="subdistrict">
                <option value="">เลือกตำบล</option>
            </select>

            {{csrf_field()}}
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

        <script type="text/javascript">
            $("#province").change(function(){
                if ($(this).val() != "") {
                    var province_id = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('query_district')}}",
                        method:"POST",
                        data:{provinceID:province_id, _token:_token},
                        success:function(result){
                            $("#district").html(result);
                            $("#subdistrict").html("<option value=''>เลือกตำบล</option>");
                        }
                    });
                }else {
                    $("#district").html("<option value=''>เลือกอำเภอ</option>");
                    $("#subdistrict").html("<option value=''>เลือกตำบล</option>");
                }
            });

            $("#district").change(function(){
                if ($("#district").val() != '') {
                    var district_id = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('query_subdistrict')}}",
                        method:"POST",
                        data:{districtID:district_id, _token:_token},
                        success:function(result){
                            $("#subdistrict").html(result);
                        }
                    });
                }else {
                    $("#subdistrict").html("<option value=''>เลือกตำบล</option>");
                }
            });
        </script>
    </body>
</html>
