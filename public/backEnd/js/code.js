// ================ sweetalerat delete data ============== //
    $(function(){
      $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

      Swal.fire({
      title: 'Are you sure?',
      text: "Delete This Data!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })

      });
    });

//==================== sweetalerat trash data ================ //
    $(function(){
      $(document).on('click','#trash',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

      Swal.fire({
      title: 'Are you sure Trash Data?',
      text: "Trash This Data!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })

      });
    });


// ================ sweetalerat Confirm data ============== //  
$(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
          title: 'Are you sure to Confirm?',
          text: "Once Confirm, You will not be able to pending again",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Confirm!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Confirm!',
              'Confirm Changes',
              'success'
            )
          }
        }) 


    });

  });


// ================ sweetalerat processing data ============== // 
$(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
          title: 'Are you sure to Processing?',
          text: "Once Processing, You will not be able to pending again",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Processing!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Processing!',
              'Processing Changes',
              'success'
            )
          }
        }) 


    });

  });


// ================ sweetalerat delivered data ============== // 
$(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
          title: 'Are you sure to delivered?',
          text: "Once delivered, You will not be able to pending again",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delivered!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'delivered!',
              'delivered Changes',
              'success'
            )
          }
        }) 


    });

  });