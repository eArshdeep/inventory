$('#btnDeleteCollection').on('click',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "Are you sure?",
        text: "Think before you act. This action cannot be undone!",
        icon: "warning",
        buttons: ["Nevermind", "Confirm!"],
    }).then((confirmation)=>{
      if(confirmation){
        form.submit();
      } else {
        swal('Your collection is safe!');
      }
    });
});