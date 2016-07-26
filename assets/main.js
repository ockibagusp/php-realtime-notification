var notif = $('#notif_container');
var notif_count = notif.find('#notif_count');
var notif_ul = notif.find('#notif_ul');

var last_notif_id = 0;
// memastikan mengirim AJAX hanya jika ada notif baru ketika menekan dropdown button notifikasi
var is_new_notif = false;

function notificationStream(id) {
	$.ajax({
		url: "/notif/notification",
		dataType: 'json',
		data: {'user_id': id}
    }).done(function (data) {
    	if (0 == notif_ul.children().length) {
    		if (0 != data.length) {
    			is_new_notif = true;
				last_notif_id = data[0].id;
		    	append_li(data);
    		}
    	} else {
    		// ada notifikasi baru
    		if (0 != data.length && last_notif_id < data[0].id) {
    			is_new_notif = true;
    			last_notif_id = data[0].id;
    			append_li(data);
    		}
    	}
	});    	
}

// menambahkan li notif baru dengan mengiterasi variabel data
function append_li(data) {
	if (1 < data.length)
		notif_ul.empty();

	var new_nodes = '';
	$.each(data, function(index, obj) {
		new_nodes += '' +
		'<li data-notif-id="' + obj.id + '">' +
			'<a>' +
				obj.message +
			'</a>' +
		'</li>';
	});

	notif_ul.prepend(new_nodes);
	notif_count.text(data.length);
	
	// notif dropdown hanya memuat maks 8
	if (8 < notif_ul.children().length) {
		// hitung selisih
		var deleted_elements = notif_ul.children().length - 8;
		// hapus selisih
		for (var i = 0; i < deleted_elements; i++) {
			notif_ul.children().last().remove();
		}
	}
}

// perbarui last_notif di tabel user ketika menekan notifikasi
$('#notif_anchor').click(function(event) {
	// ubah jumlah notifikasi menjadi 0
	notif_count.text(0);
	if (is_new_notif) {
		$.ajax({
			url: "/notif/user/update_last_notif",
			dataType: 'json',
			data: {'notif_id': notif_ul.children()[0].dataset['notifId']}
	    });
		is_new_notif = false;
	}

});