$(document).ready(function() {
        $('.cek-pompa').change(function () {
        let target = $(this).data('target');
        let table  = $('#' + target);

        if (this.checked) {
            table.slideDown(200);
        } else {
            table.slideUp(200);
            table.find('input[type="number"]').val('');
        }
    });
})