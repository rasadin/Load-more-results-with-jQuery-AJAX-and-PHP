        $(document).on('click', '#loadBtn', function () {
        // alert();
        var row = Number($('#row').val());
        var count = Number($('#postCount').val());
        var limit = 3;
        row = row + limit;
        $('#row').val(row);
        $("#loadBtn").val('Loading...');

        $.ajax({
          type: 'POST',
          url: '/easy-fashion/wp-content/themes/webalive/loadmore-data.php',
          data: 'row=' + row,
          success: function (data) {
            console.log("data"+data);

            var rowCount = row + limit;
            $('.postList').append(data);
            if (rowCount >= count) {
              $('#loadBtn').css("display", "none");
            } else {
              $("#loadBtn").val('Load More');
            }
          }
        });
      });
