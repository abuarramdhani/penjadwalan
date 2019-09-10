<!--Modal Pegawai-->
<script>
$('#modal-pegawai').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var a = button.data('1') // Extract info from data-* attributes
var b = button.data('2') // Extract info from data-* attributes
var c = button.data('3') // Extract info from data-* attributes
var d = button.data('4') // Extract info from data-* attributes
var e = button.data('5') // Extract info from data-* attributes
var f = button.data('6') // Extract info from data-* attributes
var g = button.data('7') // Extract info from data-* attributes
var h = button.data('8') // Extract info from data-* attributes
var i = button.data('9') // Extract info from data-* attributes
var j = button.data('10') // Extract info from data-* attributes
var k = button.data('11') // Extract info from data-* attributes
var l = button.data('12') // Extract info from data-* attributes
var m = button.data('13') // Extract info from data-* attributes
var n = button.data('14') // Extract info from data-* attributes
var o = button.data('15') // Extract info from data-* attributes
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
modal.find('#9').text(i)
modal.find('#10').text(j)
modal.find('#11').text(k)
modal.find('#12').text(l)
modal.find('#13').text(m)
modal.find('#14').text(n)
modal.find('#15').text(o)
})
</script>
