<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Live MySQL Database Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/search.css">
</head>

<body>
    <?php
    session_start();
    include "./sidebar.php" ?>
    <div class="content">
        <div class="d-flex justify-content-center h-100">
            <div class="searchbar">
                <input class="search_input" type="text" name="" placeholder="Search...">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            </div>
        </div>
        <div class="tbl" style="margin-left: 300px;">
            <table class="table sortable" style="width: 500px; margin-top: 50px;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Gmail</th>
                </tr>
                <tbody class="danhsach">
                </tbody>
            </table>
            <div id="search_results" style="padding:5px;"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        // $('.search_icon').click(function() {
        //     var txt = $('.search_input').val();
        //     $.post('./search_action.php', {
        //         data: txt,
        //         function(data) {
        //             $('.search_input').val('');
        //             alert(data);
        //             $('.danhsach').html(data);
        //         }
        //     })
        // })
        //Add a click listener to our search_button.
        $('.search_icon').click(function() {
            var txt = $('.search_input').val().trim();
            $.ajax({
                url: "./search_action.php",
                method: "POST",
                data: {
                    data: txt
                },
                success: function(returnData) {
                    $('.search_input').val('');
                    $('.danhsach').html(returnData);
                }
            });
        });
    </script>
</body>

</html>