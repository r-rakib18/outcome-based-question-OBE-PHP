
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2020</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
<script>
    $(function () {
        $('.q_generate').on('click', function () {
            var course_id = $('.course_id').val();
            var exam_id = $('.exam_id').val();
            $.ajax({
                url: "partial.php",
                type: "post",
                data: {'course_id': course_id, 'exam_id': exam_id},
                success: function (response) {
                    $('.question_append').removeClass('d-none');
                    $('.question_append').html(response)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

        $('body').on('click', '.add', function () {
            var clone_row = $(this).parents('tr').clone();
            clone_row.find('.remove').removeClass('d-none');
            $(this).parents('tr').after(clone_row);
        });
        $('body').on('click', '.remove', function () {
            $(this).parents('tr').remove();
        });

    });
</script>

</body>
</html>
