<!--begin::Javascript-->
<script>
    var hostUrl = "{{route($currentUrl)}}"; </script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
<script>

 $(document).ready(function () {
    $('.delete_form').on('submit', function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Are you sure?',
        text: "You Want To Delete This!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var link = $(this).attr('action');
            $.ajax({
                    url: link,
                    type: 'DELETE',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.status == true)
                        {
                            Swal.fire('Deleted!', response.msg, 'success');
                            window.location.reload();
                        }
                        else{
                            Swal.fire('Error!', response.msg, 'error');
                        }
                    },
                    error: function(xhr) {
                        // console.log(xhr.responseJSON);
                        Swal.fire('Error!', xhr.responseJSON.message, 'error');
                        // Perform any additional error handling
                    }
                });

        }
        })
    })
});
</script>
