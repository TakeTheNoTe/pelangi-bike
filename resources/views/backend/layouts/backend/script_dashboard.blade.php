<script src="{{ asset('backend-assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/jquery-circle-progress/js/circle-progress.min.js') }}"></script>
<script src="{{ asset('backend-assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('backend-assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('backend-assets/js/misc.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="https://cdn.tiny.cloud/1/1riobu2jkux567x3y645edre4l1jde3qh2q74jnotemh9qt4/tinymce/6/tinymce.min.js"
    referrerpolicy="1riobu2jkux567x3y645edre4l1jde3qh2q74jnotemh9qt4"></script>
<script type="text/javascript" charset="utf8" src="https:/cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    < script src = "/path/to/tinymce.min.js" >
</script>

</script>
<script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            search: {
                return: true,
            },
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'Semua'],
            ],
        });
    });
</script>
<script>
    function display_ct() {
        var x = new Date()
        var ampm = x.getHours() >= 12 ? ' PM' : ' AM';

        var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
        x1 = x1 + " - " + x.getHours() + ":" + x.getMinutes() + ":" + x.getSeconds() + ampm;
        document.getElementById('ct').innerHTML = x1;
        display_c5();
    }

    function display_c5() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct()', refresh)
    }
    display_c5()
</script>
<script>
    $("input[data-type='currency']").on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() {
            formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {

        var input_val = input.val();

        if (input_val === "") {
            return;
        }

        var original_len = input_val.length;

        var caret_pos = input.prop("selectionStart");

        if (input_val.indexOf(".") >= 0) {

            var decimal_pos = input_val.indexOf(".");

            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            left_side = formatNumber(left_side);

            right_side = formatNumber(right_side);

            if (blur === "blur") {
                right_side += "00";
            }

            right_side = right_side.substring(0, 2);

            input_val = "Rp " + left_side + "." + right_side;

        } else {
            input_val = formatNumber(input_val);
            input_val = "Rp " + input_val;

            if (blur === "blur") {
                input_val += ".00";
            }
        }

        input.val(input_val);

        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>
<script>
    $("#upfile").click(function() {
        $("#image").trigger('click');
    });
</script>
<script>
    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            prvwimg.src = URL.createObjectURL(file)
        }
    }
</script>
<script>
    tinymce.init({
        selector: 'textarea#description', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>
<script>
    tinymce.init({
        selector: 'textarea#content', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>
