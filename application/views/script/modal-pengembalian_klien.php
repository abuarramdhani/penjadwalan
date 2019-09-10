<!--Modal Gaji-->
<script>
$('#modal-pengembalian_klien').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var a = button.data('1') // Extract info from data-* attributes
var b = button.data('2') // Extract info from data-* attributes
var c = button.data('3') // Extract info from data-* attributes
var d = button.data('4') // Extract info from data-* attributes
var e = button.data('5') // Extract info from data-* attributes
var f = button.data('6') // Extract info from data-* attributes
var g = button.data('7') // Extract info from data-* attributes
var h = button.data('8') // Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('#1').text(a)
modal.find('#2').text(b)
modal.find('#3').text(c)
modal.find('#4').text(d)
modal.find('#5').text(e)
modal.find('#6').text(f)
modal.find('#7').text(g)
modal.find('#8').text(h)
})
</script>
